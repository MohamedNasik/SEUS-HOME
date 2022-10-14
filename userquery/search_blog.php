<?php

session_start();

// Include config file
require_once "../phpquery/dbconnection.php";

if (isset($_POST['search_text'])) {


$search_text = "%{$_POST['search_text']}%";


$output='';    

$stmt = $con->prepare("SELECT * FROM blog WHERE status='Active' AND (title LIKE ? OR sub_title LIKE ?) ");
$stmt->bind_param( 'ss',$search_text,$search_text);

  $stmt->execute();
   $result = $stmt->get_result();
   if(mysqli_num_rows($result)>0){
   while($row = $result->fetch_assoc()) {

    $filepath="../../adminpanel/assets/img/blog_images/";
    $image=$row['image'];
    $sub_title=$row['sub_title'];
    $title=$row['title'];
    $published=$row['published'];
    $blog_id=$row['blog_id'];
    $username=$row['publisher'];

    $title= substr($title,0,30);

    $date=   date('dS F Y', strtotime($published));

    // $sql='select `image`,`title`,`sub_title`,`username`,`blog_id`,`body`,`published` from `blog` WHERE status=`Active` AND (title LIKE ? OR sub_title LIKE ?) ';
    // $stmt=$con->prepare( $sql );
    // $stmt->bind_param( 'ss',$search_text,$search_text);


    // $res=$stmt->execute();
    // if( $res ){
    //     $stmt->store_result();
    //     $stmt->bind_result($image,$title,$sub_title, $username, $blog_id,$body,$published);

    //     while( $stmt->fetch() ){
    //         /* 
    //             You store the filename ( possibly path too ) 
    //             so you need to read the file to find it's
    //             raw data which you will use a simage source
    //         */
    //         $filepath="../../adminpanel/assets/img/blog_images/";

    //         $title= substr($title,0,30);
    //          $body= substr($body,0,500);
             
    //          $date=   date('dS F Y', strtotime($published));

             
$output .=  '

<div class="col-lg-6">
<div class="ed-rese-grid ed-rese-grid-mar-bot-30">
<div class="ed-rsear-img ed-faci-full-top">';
$output .=  '<img class="img-fluid" src="data:image/png;base64, '.base64_encode(file_get_contents($filepath.$image) ).'" alt="" />'; 

$output .=  '

</div>
<div class="ed-rsear-dec ed-faci-full-bot">
    <h4><a href="facilities-detail.html"> '. $title  .' </a></h4>
    <p>The Design and Technology Suite is an ensemble of various specialist areas and rooms which offer students the potential to explore a variety of design </p>
    <hr>
    <div> <a href="#"><i class="fa fa-user">  Author :
    <span> '.$username.' </span> </i></a>  <br> 
    <a href="#"><i class="fa fa-calendar">  Published :
    <span> '. $date .'</span> </i></a></div>
    <a href="course-details.php?id='. $blog_id .' " class="read-line-btn">Read more</a>
    
</div>
</div></div>';



}

echo $output;


$stmt->free_result();
$stmt->close();
$con->close();

}else{

    
echo '<center> Ooops !!! No any blogs found </center> ';  


}

}



?>