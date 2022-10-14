<?php
        // Initialize the session
         session_start();

         include "dbconnection.php";
         mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

         if (isset($_POST['passcode'])) {

  $cur_date =date("Y-m-d");

  $GLOBALS['first_name'] =$_POST["first_name"]; 
  $GLOBALS['last_name'] =$_POST["last_name"]; 
  $GLOBALS['address'] = "";
  $GLOBALS['gender'] =$_POST["gender"]; 
  $GLOBALS['contact'] = "";
  $GLOBALS['state'] = "";
  $GLOBALS['nic'] = "";
  $GLOBALS['prefix'] =$_POST["prefix"]; 
  $passcode =$_POST["passcode"]; 
  $GLOBALS['dob'] =$_POST["dob"]; 
  $GLOBALS['email'] =$_POST["email"]; 
  $passwordnormal =$_POST["password"]; 
  $GLOBALS['password']  = md5($passwordnormal);


function add($a){
    global $con;

// insert query
$sql= "INSERT INTO patients (p_id,prefix,p_fname,p_lname,p_address,p_gender,dob,p_contact,p_state,email,password,nic) 
VALUES ('". $GLOBALS['a']."','". $GLOBALS['prefix'] ."','".  $GLOBALS['first_name']."','".  $GLOBALS['last_name']."','". $GLOBALS['address']."', '". $GLOBALS['gender']."','". $GLOBALS['dob']."','". $GLOBALS['contact']."', '". $GLOBALS['state']."','".$GLOBALS['email']."', '". $GLOBALS['password']."' ,'". $GLOBALS['nic']."')  ";

if(mysqli_query($con,$sql) ){
  
  $stmt = $con->prepare("SELECT * FROM patients WHERE email=? ");
  $stmt->bind_param("s",$GLOBALS['email']);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows === 0) exit('No Patient');
  while($row = $result->fetch_assoc()) {
  
    $patient_id = $row['p_id'];
    $p_fname = $row['p_fname'];
    $p_lname = $row['p_lname'];

   $username = $p_fname. ' ' .$p_lname;

   
     $_SESSION['p_id']=$patient_id;

     $_SESSION['username']=$username ;

  }

  echo'Successfully Saved';

}
else {
 echo mysqli_error($con);
}  


  } // end function
   
// seach verification code
 $stmt = $con->prepare("SELECT * FROM patient_verification WHERE activation_code=? AND email=? AND DATE_FORMAT(created,'%Y-%m-%d')  = ? AND expire='1' AND opt_id=(SELECT MAX(opt_id) FROM patient_verification)");
 $stmt->bind_param("sss",$passcode,$email,$cur_date);
 $stmt->execute();
 $result = $stmt->get_result();
 if(mysqli_num_rows($result)>0){
 while($row = $result->fetch_assoc()) {
 $active_code=$row["activation_code"];
 $opt_id=$row["opt_id"];
 $expiry="0";


if($passcode  == $active_code){
    

//  update
$stmt3 = mysqli_prepare($con,"UPDATE patient_verification SET expire =? WHERE opt_id =?");

/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
  $stmt3->bind_param('ss', $expiry,$opt_id);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */

/* Execute the prepared Statement */
  $status3 = $stmt3->execute();

 
  //  search patient wherether they available
  $query = "SELECT * FROM patients ORDER BY p_id DESC LIMIT 1";
  if($result = mysqli_query($con,$query));
   if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)){

    $lastid=$row['p_id'];
  }

  $search = 'PAT-' ;


   $trimmed = str_replace($search,'',$lastid) ;


  $srting_trimmed = (string)$trimmed;
   $id= str_pad(intval($srting_trimmed) + 1, strlen($srting_trimmed), '0', STR_PAD_LEFT); // 000010

   $var='PAT-';

     $new_id=$var.''.$id;
     $GLOBALS['a'] =  $new_id;

add(12);

  
  }else{
    
    $var='PAT-';
    $num= '0001';

  $new_id=$var.''.$num;
  $GLOBALS['a'] =  $new_id;

 add(12);


  }

}else {
    echo 'Wrong Activation code';
    }


              }



            }else{

                echo 'Wrong Activation code';

            }

        }else{

            echo 'Something went wrong';

        }

        mysqli_stmt_close($stmt);

        




        ?>