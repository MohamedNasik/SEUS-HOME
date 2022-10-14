<!DOCTYPE html>
<html lang="en">

<?php
require_once 'phpquery/dbconnection.php';
   // Initialize the session
   session_start();
   if(!isset($_SESSION['p_id'])){
    header('location:index.php');
    }
                ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>
<link type="text/css" rel="stylesheet" href="path_to/simplePagination.css"/>

<script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>


<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
              <a href="#" class="logo"><img src="images/logo12.png" alt="" />
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
                <div class="top-not-cen">
                    <!-- <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> -->
                </div>
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
                        <li class="active-bre"><a href="#"> Doctor Recommendations</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>

      
    

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">





 <?php
  include ('phpquery/dbconnection.php');

   $stmt = mysqli_prepare($con,"SELECT * FROM doctor_recommend as dr INNER JOIN doctor_specialist AS d ON dr.user_id=d.user_id INNER JOIN users as u ON u.user_id=dr.user_id AND dr.p_id='".$_SESSION['p_id']."' ");
   //    $stmt->bind_param("s", $_GET['id']);
   $stmt->execute();
   $result = $stmt->get_result();
   if(mysqli_num_rows($result)>0){
   while($row = $result->fetch_assoc()) {

    $filepath="../adminpanel/profile/blog/";
$image=$row['image'];
   
 ?>           
            <div class="col-md-4">
                <div class="card">
                
    <div class="card-image waves-effect waves-block waves-light">
    <?php
                                
         printf('<img class="inline-block" style="width:302px;height:300px;" src="data:image/png;base64, %s" alt="user" />',
        base64_encode(file_get_contents($filepath.$image ) ) );  ?>
    </div>

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"> Dr. <?php echo $row['doctor_name']   ?><i class="right fa fa-plus"></i></span>
      <p><a href="#">[ <?php echo $row['specilization']   ?> ]</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Recommendation<i class="right fa fa-close"></i></span> <br>
      <p><?php  echo $row['description']    ?>  </p>   <br><br>

      <p><a href="#"><i class="fa fa-user-md"></i>  Dr.<?php echo $row['recommended_by']   ?> </a></p>

    </div>
  </div>
  </div>

<?php  } }else{

echo "No doctor has found";

}

?>

 </div>
                    
                </div>
            </div>

        </div>
    </div>

      <!--Import jQuery librar.js-->
      <?php   include ('headers/headfoot.php');?>

<script>

$(function() {
    $(selector).pagination({
        items: 100,
        itemsOnPage: 10,
        cssStyle: 'light-theme'
    });

    $(selector).pagination('selectPage', pageNumber);
    $(selector).pagination('prevPage');

});

</script>

</body>


</html>