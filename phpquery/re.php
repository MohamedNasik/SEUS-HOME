<html>
  <head>
    <meta charset="utf-8">
    <title>


</title>


        <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/spin.css">

        <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">


  </head>
  <body>

<div class="container">
<div class="row">
<div class="col-lg-12">

 <button type="button"  class="btn btn-success insert" data-toggle="modal"> add data</button>

    <table class="table table-bordered " id="">

        <thead>
          <tr>

<th>ID</th>
              <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>address</th>

            <td> update</td>
            <td> delete</td>

          </tr>
        </thead>
        <tbody>
<?php

include("db.php");
ORM::configure('return_result_sets', true);
$results = ORM::for_table('reg')->find_many();                      //$sql = "SELECT * FROM reg";

if ($results) {

foreach($results as $post) {
  //  echo $post->fname;
    // $results->save();

//idecho "$name";
//$results = mysqli_query($dbconnect,$sql)or die(mysqli_error());





// if(mysqli_num_rows($results) > 0)
// {
//
//
//
//   while($row = mysqli_fetch_array($results)) {
// $a=$row['id'];
// $b=$row['email'];
// $c=$row['fname'];
// $d=$row['lname'];
// $e=$row['address'];

 ?>
    <tr>
            <td><?php echo " $post->id" ?></td>
            <td><?php echo "$post->email" ?></td>
            <td><?php echo "$post->fname" ?></td>
            <td><?php echo "$post->lname" ?></td>
            <td><?php echo "$post->address" ?></td>
<td> <button type="button" name="edit" id="edit" class="btn btn-info edit" data-href="#" eid=<?php echo "$post->id" ?> eemail=<?php echo "$post->email"?>  efn=<?php echo "$post->fname" ?> eln=<?php echo "$post->lname" ?>
 eadd=<?php echo "$post->address" ?> >update</button>  </td>
<td> <button type="button" name="del" id="del" class="btn btn-danger delete" data-href="#" did=<?php echo "$post->id" ?>> delete</button>  </td>


           </tr>

<?php
}

         }else {
?>

<tr>
       <td colspan="7">   data not found    </td>
</tr>

<?php
           }


            ?>

        </tbody>
      </table>
    </div>

    </div>

    </div>



    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
     <script src="assets/datatables/js/dataTables.bootstrap.js"></script>

       <script type="text/javascript" src="assets/js/vendor.js"></script>
       <script type="text/javascript" src="assets/js/app.js"></script>
       <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/js/dataTables.bootstrap.js"></script>
 </body>
</html>



<?php

require_once 'idiorm.php';

error_reporting(E_ALL & ~E_NOTICE);
session_start();
include("db.php");

if (isset($_POST['email'])) {

include("db.php");
$em=$_POST["email"];
$fn=$_POST["fname"];
$ln=$_POST["lname"];
$add=$_POST["address"];

//echo "$em";


$reg = ORM::for_table('reg')->create();

    $reg->email = $em;
    $reg->fname = $fn;
    $reg->lname = $ln;
    $reg->address= $add;
    $reg->save();



}


 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>

    </title>



        <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/spin.css">

        <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">



  </head>
  <body>


<?php   ?>

<table id="tableview" class="table table-striped">


</table>

<div class="modal fade" id="insert-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
           <font color="#f0ad4"> <h2>!Insert Data Here</h2></font>
         </div>

         <div class="modal-body">

               <div class="form-group">
                       <input type="email" class="form-control" name="em" id="em" placeholder="Enter email" required>
                     </div>


               <div class="form-group">
           <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name" required>
         </div>
         <div class="form-group">
           <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" required>
         </div>
       <div class="form-group">
           <input type="text" class="form-control" id="add" name="add" placeholder="add" required>
         </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             <a class="btn btn-warning btn-ok" id="submit" data-dismiss="modal">submit</a>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <font color="#5bc0de"> <h2>!Info You Are Going To Update Data</h2></font>
            </div>
            <div class="modal-body">



		   <div class="form-group" id="editfrm">
			   <input type="email" class="form-control" name="eemail" id="eemail" placeholder="email" value="" required>
			 </div>

                <div class="form-group">
				      <input type="text" class="form-control" name="efn" id="efn" placeholder="Enter first Name" value="" required>
				    </div>
				    <div class="form-group">
				      <input type="text" class="form-control" name="eln" id="eln" placeholder="Enter Last Name" required>
				    </div>
					<div class="form-group">
				      <input type="text" class="form-control" id="eadd" name="eadd" placeholder="Enter address" required>
				    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info btn-edit" id="">Update</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
     <div class="modal-header">
       <font color="#f0ad4"> <h2>!Warning</h2></font>
     </div>
     <div class="modal-body">
         <font face="Arial" color="#f0ad4">Do You Really Want To Delete??.</font>
     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         <a class="btn btn-danger btn-del" id="" data-dismiss="modal">Delete</a>
     </div>
 </div>
</div>
</div>


<div class="data">

</div>




<script src="assets/jquery/jquery-3.1.0.min.js"></script>
 <script src="assets/bootstrap/js/bootstrap.min.js"></script>

   <script type="text/javascript" src="assets/js/vendor.js"></script>
   <script type="text/javascript" src="assets/js/app.js"></script>
   <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap.js"></script>

    <!-- <script src="assets/bootstrap/js/a.js"></script>
<script src="assets/bootstrap/js/b.js"></script>
<script src="assets/bootstrap/js/c.js"></script> -->






<script type="text/javascript">

$(document).ready(function(){

 /** -------------VIEW THE ALL DATA ------------------*/
         viewData();
     function viewData(){
       $.ajax({
         type:"GET",
         url:"update.php",
         success: function (data){
           $('#tableview').html(data);

           //$('#result').DataTable();
         }
         }).
           always(function(jqXHR, textStatus) {
               $('.data').DataTable();
       });
     }

     /**-------------INSERT A ROW ----------------*/
      		$(document).on('click','.insert', function(e) {
        			 $("#insert-data").modal({show:'true'});
     		});


         $("#submit").click(function(){

     var em = $('#em').val();
     	var firstname = $('#firstname').val();
      			var lastname = $('#lastname').val();
      			var add = $('#add').val();

      			var data={"em":em,"firstname":firstname,"lastname":lastname,"add":add};
       $.ajax({
              data: data,
              type: "post",
              url: "form1.php",
               success: function(data)
          {
       $('#em').val('');
             $('#firstname').val('');
             $('#lastname').val('');
            $('#add').val('');

             $("#insert-data").modal('hide');
             viewData();

           }
     		});
         });

         /**---------EDIT A ROW ----------------*/
       	$(document).on('click','.edit', function(e) {

            		$(".btn-edit").attr('id', $(this).attr('eid'));
          			$("#eemail").val($(this).attr('eemail'));
          			$("#efn").val($(this).attr('efn'));
       	   		$("#eln").val($(this).attr('eln'));
       	   		$("#eadd").val($(this).attr('eadd'));

       	   		$("#confirm-edit").modal({show:'true'});

       		});

       			 $( ".btn-edit").click( function () {

       	   			 var eid = $(".btn-edit").attr('id');
       					 var eemail = $('#eemail').val();

       	   			 var efn = $('#efn').val();
       	 		 var eln = $('#eln').val();
       	 			 var eadd = $('#eadd').val();

       	 			var result={"eid":eid, "eemail":eemail,"efn":efn,"eln":eln,"eadd":eadd};

       				 $.ajax({
       				   data:result,
       				   type: "POST",
       				   url: "form1.php",
       				   success: function(data){
       				   	$("#confirm-edit").modal('hide');
       				   	viewData();

       				   }
       				});
       		});


          /**-----------------DELTE A ROW------------------- */
        			$(document).on('click','.delete', function(e) {
           			 $(".btn-del").attr('id', $(this).attr('did'));
           		 $("#confirm-delete").modal({show:'true'});
        		});
        			 $( ".btn-del").click( function () {
        	   			 var did = $(".btn-del").attr('id');
        				 $.ajax({
        				   data: {did:did},
        				   type: "POST",
        				   url: "form1.php",
        				   success: function(result){
        				   	$("#confirm-delete").modal('hide');
        				   	viewData();
        				   }
        				});
        			});

              // $( document ).ready(function() {
              //     $('#tableview').DataTable({
              //          "bProcessing": true,
              //          "serverSide": true,
              //          "ajax":{
              //             url :"view.php", // json datasource
              //             type: "post",  // type of method  , by default would be get
              //             error: function(){  // error handling code
              //               $("#employee_grid_processing").css("display","none");
              //             }
              //           }
              //         });
              // });






});
</script>







  </body>
</html>


<a href="" id="rep" data-toggle="modal" data-target="#edit1" class="ad-st-view" 
data_id=<?php echo  $row['apt_id'];?> cancel=<?php echo  $row['patient_status'];?>>Cancel</a>

<div id="edit1" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					
                    <div class="modal-body text-center">
						<!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
						<h3>Are you sure want to delete this Patient?</h3>
						<input type="hidden" id="can">
                        <div class="m-t-20" > 
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<input type="button" id="repl" class="btn btn-danger" value="del">
						</div>

					</div>
                    
				</div>
			</div>
			
		</div>



<script>
    $(document).on('click','#rep', function() {
$("#repl").attr('apt_id', $(this).attr('data_id'));
$("#can").val($(this).attr('cancel'));
  $("#edit1").modal({show:'true'});
});
$('#repl').click(function(){
    var data_id = $("#repl").attr('apt_id');   
    $.ajax({
        data: {'data_id': data_id },
      type: "POST",
      url: "admin.php",
      success: function(data){
        $('#success_mes').html(data);
         $("#edit1").modal('hide');
      }
   });
});

</script>















