<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
         
         require_once 'phpquery/dbconnection.php';


        ?>
<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<style> 
input[name=searched] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid rgba(255, 206, 86, 1);
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[name=searched]:focus {
  width: 100%;
}
</style>



<body>


    <body>



        <!-- blue_header -->
        <?php include ('headers/blue_header.php');  ?>

        <!--SECTION START-->
        <section>
            <div class="container com-sp pad-bot-70 pg-inn">
                <div class="row">
                    <div class="cor">

     <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Blog <span> Posts</span></h2>
                            <p>Post regarding to the Hospitals , Viral Deceases and much more </p>
                        </div>
                     
                    </div>


                        <div class="col-lg-9">
                            <div class="cor-mid-img">
                                <div class="cor about-sp"  id="lists">
                                  
 <?php

$sql='select `image`,`sub_title`,`title`,`publisher`,`blog_id`,`body`,`published` 
from `blog` ORDER BY blog_id DESC ';
$stmt=$con->prepare( $sql );

 $res=$stmt->execute();
 if( $res ){
 $stmt->store_result();
 $stmt->bind_result($image,$sub_title,$title,$publisher, $blog_id,$body,$published);

 while( $stmt->fetch() ){

 $filepath="../adminpanel/assets/img/blog_images/";
 $published_date=   date('dS F Y', strtotime($published));

 $title= substr($title,0,30);

?>
                            <div class="col-lg-6">
                                <div class="ed-rese-grid ed-rese-grid-mar-bot-30">
								<div class="ed-rsear-img ed-faci-full-top">
                                <?php  
                                   printf(
                    '<img   class="img-fluid" src="data:image/png;base64, %s" alt="" />',
                         base64_encode(file_get_contents($filepath.$image ) ) );  ?>
                         
                        </div>

								<div class="ed-rsear-dec ed-faci-full-bot">
									<h4><a href="facilities-detail.html"><?php echo $title  ?></a></h4>
									<!-- <p>The Design and Technology Suite is an ensemble of various specialist areas and rooms which offer students the potential to explore a variety of design </p> -->
                                    <hr>
                                    <div> <a href="#"><i class="fa fa-user">  Author :
                                    <span><?php echo $publisher ?></span> </i></a>  <br> 
                                    <a href="#"><i class="fa fa-calendar">  Published :
                                    <span><?php echo $published_date ?></span> </i></a></div>
									<a href="course-details.php?id=<?php echo $blog_id  ?>" class="read-line-btn">Read more</a>
                                    
								</div>
							</div></div>

                            <?php               
         
        }
    }else{

echo 'No Blogs Found';


    }


        $stmt->free_result();
        $stmt->close();
      

    
?>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="cor-side-com">

    <!-- search box -->
  <form>
  <input style="width:190pt;" type="text" id="searched" name="searched" placeholder="Search.." 
  onblur="blog();" onkeyup="blog();" onchange="blog();">
</form>
                             
                            </div>


                            <div class="ho-ev-latest in-ev-latest-bg-1">                            
                            <a href="#">
                        <div class="ho-lat-ev">
                            <h4>Recent Posts</h4>
                        </div>
                    </div>

                       <div class="ho-event ho-event-mob-bot-sp">
                        <ul>

 <?php
//   search blogs
  $stmt1 = $con->prepare("SELECT * FROM blog WHERE status='Active' ORDER BY blog_id DESC LIMIT 5");

  $stmt1->execute();
   $result = $stmt1->get_result();
   if(mysqli_num_rows($result)>0){
   while($row = $result->fetch_assoc()) {

    $filepath="../adminpanel/assets/img/blog_images/";
    $image=$row['image'];
    $sub_title=$row['sub_title'];
    $title=$row['title'];
    $published=$row['published'];
    $blog_id=$row['blog_id'];

    $date=   date('dS F Y', strtotime($published));
   
 ?> 

                            <li>
                                <div class="ho-ev-img">
                                
                                <?php     printf(
                    '<img style="height:45px;"  class="img-fluid" src="data:image/png;base64, %s" alt=""  />',
                         base64_encode(file_get_contents($filepath.$image ) ) );  ?>

                                </div>
                                <div class="ho-ev-link">
                                    <a href="course-details.php?id=<?php echo $blog_id  ?>">
                                        <h4><?php echo $title  ?></h4>
                                    </a>
                                    <p><?php echo $sub_title  ?></p>
                                    <span><?php echo $date  ?></span>
                                </div>
                            </li>
                                    <?php               }
            $stmt1->free_result();
            $stmt1->close();
            $con->close();
        }
   
?>   
                         </ul>
                         </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--SECTION END-->







        <!-- FOOTER COURSE BOOKING -->
        <?php  include ('headers/footer.php');  ?>

        <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
        <?php   include ('headers/logreg.php');?>

        <!--Import jQuery before materialize.js-->
        <?php   include ('headers/headfoot.php');?>


        <script>

function blog() {

    var search_text = document.getElementById("searched").value;

    if (searched) {

        $.ajax({
            type: 'post',
            url: "userquery/search_blog.php", // Url to which the request is send
            data: {
                search_text: search_text,
            },

            success: function (response) {

                $('#lists').html(response);

            }
        });
    }
    else {
        //   $( '#email_status' ).html("");
        return true;

    }
}

</script>

        <!-- Ajax queries -->
        <?php   include ('headers/query.php');?>

    </body>


</html>