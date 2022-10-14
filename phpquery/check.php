<?php
        // Initialize the session
         session_start();

         include "dbconnection.php";
         date_default_timezone_set('Asia/Colombo');

         if (isset($_POST['email'])) {
            

          $cur_date = date('Y-m-d H:i:s', time());
          $cur_date = strtotime($cur_date);
          $cur_date = date('Y-m-d H:i:s', $cur_date); 

            $email =$_POST['email'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name= $_POST['last_name'];
            $gender = $_POST['gender'];
            $dob= $_POST['dob'];
            $prefix= $_POST['prefix'];


            $otp= rand(100000,999999);

            $expiry="1";

            $stmt1 = $con->prepare("INSERT INTO patient_verification (email,activation_code,expire,created) VALUES ( ?, ?, ?, ?)");
            $stmt1->bind_param("ssss",$email,$otp,$expiry,$cur_date);
            $status=$stmt1->execute();

            if($status === true){

            $to      = $email;
            $subject = 'Account Verification';
            $message = '<p> Dear '.$first_name.' '. $last_name.', <br> <br> The account verification code is '.$otp.'. <br><br>Thank You. <br><br> Best Regards from </br> <br><b> <i>  SEUS Hospitals </i></b> </br>';
            
           $headers = 'From: seus@gmail.com' . "\r\n" ;
           $headers .= 'Reply-To: seus@gmail.com' . "\r\n" ;
           $headers .= "MIME-Version: 1.0\r\n";
           $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
          $send= mail($to, $subject, $message, $headers);

            // echo $_SESSION['pids'];
            // header("Location:../patient_verification.php?email=$email&password=$password&first_name=$first_name&last_name=$last_name&gender=$gender&dob=$dob&prefix=$prefix"); 

            echo 'Success';


          }else{

            echo 'send fail';

          }




        }else{

            echo 'Something went wrong';

        }


        




        ?>
