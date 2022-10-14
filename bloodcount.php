<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

            $conn = mysqli_connect("localhost", "root", "", "hmsproject");

            function fill_select_box($conn,$testing_report_id)
            { 
                $output = '';
                $stmt = $conn->prepare("SELECT * FROM testing_report as tr INNER JOIN testing_schedule as ts ON tr.test_id=ts.test_id AND tr.pres_id=ts.pres_id AND ts.p_id='".$_SESSION['p_id']."' AND tr.test_id='1' AND ts.payment_status='2' GROUP BY ts.pres_id ORDER BY tr.testing_report_id DESC");

                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows === 0);
             foreach($result as $row)
             {
                $output .= '<option value="'.$row["testing_report_id"].'">'.$row["testing_report_id"].'             ('.$row["date"].') </option>';
            }
             return $output;
            }
            
        ?>
        <link rel="stylesheet" type="text/css" href="ajax/table/datatables.bootstrap.min.css"/>


<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="index-2.html" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <!-- <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form> -->
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <!-- <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div> -->
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/users.jpg" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="admin-panel-setting.php" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="phpquery/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php    include ('adminheader.php');  ?>


            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Blood Count</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                           
      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="n-form-com admiss-form">
                    <div class="col s12">
                         
                   
                            <div class="form-group">
                                <label class="control-label col-sm-3">Select Report ID:</label>
                                <div class="col-sm-6">
       
                                  
                                  
                         <select name="test_list" id="test_list">
								<option>-- Select --</option>
                                <?php echo fill_select_box($conn, "0");  ?>
							  </select>
                              
                                </div>
                            </div>
                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style="">   <input type="button" value="OPEN" name="search" id="search" class="waves-button-input"></i>
                                </div>
                            </div>
                    </div>
                </div>
            </div>  
                             
                            </div>
                        </div>
             <br>        <br>        <br>             <br>        <br>        <br>        <br>        <br> 
         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="n-form-com admiss-form">
                    <div class="col s12">
                     

                    <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
									<h4>Blood Count Results</h4>
                                    <p>All about students like name, student id, phone, email, country, city and more</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive " id="test_info" style="display:none">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center"><strong>No. </strong></th>
                                                    <th class="center"><strong>Modules</strong></th>
                                                    <th class="center"><strong>Results</strong></th>
                                                    <th class="center"><strong>Unit</strong></th>
                                                    <th class="center"><strong>Ref.Range</strong></th>

                                                </tr>
                                            </thead>
                                            <tbody>                                        
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="center">WBC</td>
                                                    <td class="center"><span id="1"> </span></td>
                                                    <td class="center">10^9/L</td>
                                                    <td class="center">4.0 - 10.0</td>
                                                </tr>

                                                <tr>
                                                    <td class="center">2</td>
                                                    <td class="center">Lymph#	</td>
                                                    <td class="center"><span id="2"> </span></td>
                                                    <td class="center">10^9/L</td>
                                                    <td class="center">0.8 - 4.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3</td>
                                                    <td class="center">Mid#	</td>
                                                    <td class="center"><span id="3"> </span></td>
                                                    <td class="center">10^9/L</td>
                                                    <td class="center">0.1 - 1.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4</td>
                                                    <td class="center">Gran#	</td>
                                                    <td class="center"><span id="4"> </span></td>
                                                    <td class="center">10^9/L</td>
                                                    <td class="center">2.0 - 7.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">5</td>
                                                    <td class="center">Limph%	</td>
                                                    <td class="center"><span id="5"> </span></td>
                                                    <td class="center">%</td>
                                                    <td class="center">20.0 - 40.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">6</td>
                                                    <td class="center">Mid%	</td>
                                                    <td class="center"><span id="6"> </span></td>
                                                    <td class="center">%</td>
                                                    <td class="center">3.0 - 15.0</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td class="center">7</td>
                                                    <td class="center">Gran%</td>
                                                    <td class="center"><span id="8"> </span></td>
                                                    <td class="center">%</td>
                                                    <td class="center">50.0 - 70.0</td>
                                                </tr> -->
                                                <tr>
                                                    <td class="center">7</td>
                                                    <td class="center">RBC	</td>
                                                    <td class="center"><span id="7"> </span></td>
                                                    <td class="center">10^12/L	</td>
                                                    <td class="center">3.50 - 5.50</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">8</td>
                                                    <td class="center">HGB	</td>
                                                    <td class="center"><span id="8"> </span></td>
                                                    <td class="center">g/dL	</td>
                                                    <td class="center">11.0 - 16.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">9</td>
                                                    <td class="center">HTC</td>
                                                    <td class="center"><span id="9"> </span></td>
                                                    <td class="center">%</td>
                                                    <td class="center">37.0 - 54.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">10</td>
                                                    <td class="center">MCV</td>
                                                    <td class="center"><span id="10"> </span></td>
                                                    <td class="center">fL</td>
                                                    <td class="center">MCV</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">11</td>
                                                    <td class="center">MCH</td>
                                                    <td class="center"><span id="11"> </span></td>
                                                    <td class="center">pg</td>
                                                    <td class="center">27.0 - 34.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">12</td>
                                                    <td class="center">MCHC</td>
                                                    <td class="center"><span id="12"> </span></td>
                                                    <td class="center">g/dL	</td>
                                                    <td class="center">32.0 - 36.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">13</td>
                                                    <td class="center">RDW-CV	</td>
                                                    <td class="center"><span id="13"> </span></td>
                                                    <td class="center">%	</td>
                                                    <td class="center">11.0 - 16.0</td>
                                                </tr>

                                                <tr>
                                                    <td class="center"></td>
                                                    <td class="center">	</td>
                                                    <td class="center"></td>
                                                    <td class="center">	</td>
                                                    <td class="center"></td>
                                                </tr>

                                                <tr>
                                                    <td class="center" colspan="5"> <h5><strong>Remark</strong></h5></td>
                                                
                                                </tr>
                                                
                                     
                                                <tr>
                                                    <td class="center" colspan="5"> <h4><strong><span id="14"> </span></strong></h4></td>
                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br><br>
                 



                </div>
            </div>

        </div>
    </div>



                    </div>
                </div>
            </div>  



                    </div>
                 
                </div>
           
                <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>
            </div>

        </div>
    </div>

    <!--Import jQuery librar.js-->

    <script src="ajax/datatables/js/dataTables.bootstrap.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="ajax/datatables/js/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <?php   include ('headers/headfoot.php');?>
  

<script>
$(document).ready(function(){
    $('select').material_select();
   

    $('#search').click( function () {
  var id= $('#test_list').val();
  if (id !=''){

   $.ajax({
  
    url: "test_query/fetch_count.php", // Url to which the request is send
    method: "POST",             // Type of request to be send, called as method
    data:{id: id},
    dataType:"JSON",
    success:function(data)
    {
        $('#success_mes').fadeIn().html(data);


    $('#test_info').css("display","block");
    
    $('#1').text(data.WBC);
    $('#2').text(data.lymph);
    $('#3').text(data.Mid);

    $('#4').text(data.Gran);
    $('#5').text(data.Limp);
    $('#6').text(data.Mids);

   // $('#7').text(data.Grans);
    $('#7').text(data.RBCB);
    $('#8').text(data.HGB);

    $('#9').text(data.HCT);
    $('#10').text(data.MCV);
    $('#11').text(data.MCH);

    $('#12').text(data.MCHC);
    $('#13').text(data.RDW);
    $('#14').text(data.remark);

          console.log(data);

}


});




}else{
    alert('sdsd');
    $('#test_info').css("display","none");

}




    } );

} );



</script>





</body>

</html>