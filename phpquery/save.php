<?php
// include('colour.css');
include('dbconnection.php');

if (isset($_POST['username'])) {

	$first_name="";
	$last_name="";
	$address="";
	$gender="";
	$dob="";
	$contact="";
	$state="";
	$image="";
	$note="";
  
	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	


    //check if email exist
    if(isset($_POST["email"])){
        //$conn represent your new mysqli_connect('localhost', 'user', 'password', 'database');
        $sql = "SELECT COUNT(*) FROM patients WHERE email LIKE ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s",$_POST["email"]);
        $stmt->execute();
        if(($stmt->rowCount()) > 0){
            $stmt->close();
            //Your INSERT CODE
            
// insert patient
			$sql= "INSERT INTO patients (p_fname,p_lname,p_address,p_gender,dob,p_contact,p_state,username,email,password,image,note) 
			VALUES ('". $first_name."','". $last_name."','". $address."', '". $gender."','". $dob."','". $contact."', '". $state."','". $username."','". $email."', '". $password."' , '". $image."', '". $note."')  ";
			
			if(mysqli_query($con,$sql) ){
			  echo'Successfully saved';
			
			}
			else {
			 echo mysqli_error($con);
			}
			
			}



            
            //on success
            if(mysqli_query($con,$sql) ){
                 return json_encode(array(
                     'status' => 0,
                     'message' => 'Patient added.'
                 ));
            }
        } else {
            $stmt->close();
            return json_encode(array(
                 'status' => 1,
                 'message' => 'Email already exist'
            ));
        }

    }
}
?>