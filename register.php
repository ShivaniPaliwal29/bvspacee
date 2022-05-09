<?php
require_once "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){
  require ("PHPMailer/PHPMailer.php");
  require ("PHPMailer/Exception.php");
  require ("PHPMailer/SMTP.php");

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

    try {
      //Server settings
                         
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'bvspace9@gmail.com';                     //SMTP username
      $mail->Password   = 'qwaszx@9';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('bvspace9@gmail.com', 'bvspace');
      $mail->addAddress($email);     //Add a recipient
      

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email Verification from bvspace';
      $mail->Body    = "Thanks for registration to bvspace! 
                        Click the link below to verify the email address
                        <a href='http://localhost/bvspace/verify.php?email=$email&v_code=$v_code'>Verify</a>";
      
      $mail->send();
      return true;
      // echo 'Message has been sent';
    } catch (Exception $e) {
         return false;
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
}

if(isset($_POST['register'])){
    $Branch=$_POST['Branch'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    //$cpassword="";
    $email=$_POST['email'];
    $startYear = date('Y-m-d', strtotime($_POST['startYear']));
    $endYear = date('Y-m-d', strtotime($_POST['endYear']));
    $linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_SPECIAL_CHARS);  //$_POST['linkedin'];
    $summerIntern = $_POST['summerIntern'];
    $UIL= $_POST['UIL'];
    $placement  = $_POST['placement'];
    $v_code=bin2hex(random_bytes(16));
   


    if ($_POST['password'] ==  $_POST['cpassword']) {
      $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
     
      $result = mysqli_query($conn, $sql);
      if($result){
        if(mysqli_num_rows($result)>0){  //when username matches //username already exist
          $result_fetch=mysqli_fetch_assoc($result);
          if($result_fetch['username']==$_POST['username']){
            echo "<script>
                alert('$result_fetch[username] , Username already exist');
                window.location.href='index.php';
              </script>";
          }else{    //email already exist
            echo "<script>
                 alert('$result_fetch[email] - email already exist');
                 window.location.href='index.php';
                </script>";
          }
        }else{  //executed when no one has taken that username or email
          $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
          $insert = "INSERT INTO users (username, password, email,startYear, endYear,Branch, linkedin, summerIntern, UIL, placement,verification_code, is_verified) VALUES ('$username' , '$password' ,'$email' , 
                     '$startYear', '$endYear','$Branch','$linkedin' , '$summerIntern' , '$UIL' , '$placement' , '$v_code','0')";

          if(mysqli_query($conn,$insert) && sendMail($email,$v_code)){  //if data inserted successfully
            echo "<script>
             alert('Welcome! Registration successful.Now,verify your account.');
             window.location.href='login.php';
              </script>";

          }else{  //if data can not be inserted
            echo "<script>
             alert('Cannot run query.');
             window.location.href='register.php';
              </script>";

          }

        }

      }else{
        echo "<script>
            alert('Cannot run query.');
             window.location.href='index.php';
              </script>";
      }
    }else{
      echo "<script>
            alert('Password does not match');
             window.location.href='index.php';
              </script>";

    }  
    
  

//close the database connection
mysqli_close($conn);
}


?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Set a style for the submit button */
      body{
        /* background-color:#c6dc93; */
        background-image:url('https://t4.ftcdn.net/jpg/01/32/59/83/360_F_132598320_FQT5TvzHWP2x42CsdAoEPgQG47YyzPZ5.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        color:white;
      }
      .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

       
        .registerbtn:hover {
        opacity: 1;
        }

        /* Add a blue text color to links */
        a {
        color: dodgerblue;
        }
    </style>
    <title>Register BVSpace</title>
  </head>
  <body>
    <?php include('header.php');?>

      <div class="container" style="margin-top: 7%;height: 100%;width: 100%; ">
        
          <!-- <h3>Please Register Here:</h3>
          <hr> -->
          <form action="" method="post" style=" margin-left:15%; margin-right:15%;width:68%">
            <!-- <div class="form-row"> -->
            <h3>Please Register Here:</h3>
            <hr>
          
              <div class="form-group " >
                <label for="inputUsername"></label>
                <input type="text" class="form-control" name="username" id="inputtext4" placeholder="Username*" required>
              </div>
              <div class="form-group ">
                <label for="inputPassword4"></label>
                <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password*" required>
              </div>
            <!-- </div> -->
            <div class="form-group ">
                <label for="inputPassword4"></label>
                <input type="password" class="form-control" name ="cpassword" id="inputPassword" placeholder="Confirm Password*" required>
              </div>
              <div class="form-group ">
                <label for="inputEmail4"></label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email*" required>
              </div>
            <div class="form-group " >
              <label for="inputstartyear">Start Year of BTech*:</label>
              <input type="date" class="form-control" name="startYear" id="inputstartyear" placeholder="Start Year of BTech" style="display:inline;width: 24%; margin-left: 10%;" required>
            </div>
            <div class="form-group ">
              <label for="inputendyear">End Year of BTech*:</label>
              <input type="date" class="form-control" name="endYear" id="inputendyear" placeholder="Start Year of BTech" style="display:inline;width: 24%; margin-left: 11%;"  required>
            </div>
            <div class="form-group dropdown">
                <label for="Branch" >Choose your branch*:</label>
                    <select style="margin-left: 80px;padding:9px" name="Branch" required>
                        <option value="CS">CS</option>
                        <option value="IT">IT</option>
                        <option value="ECE">ECE</option>
                        <option value="EE">EE</option>
                    </select>

            </div>  
            <div class="form-group ">
                <label for="inputlinkedin"></label>
                <input type="text" class="form-control" name ="linkedin" id="linkedin" placeholder="Linkedin*" required>
              </div>
              <div class="form-group ">
                <label for="inputSummerIntern"></label>
                <input type="text" class="form-control" name ="summerIntern" id="summerIntern" placeholder="Summer Internship">
              </div>
              <div class="form-group ">
                <label for="inputUIL"></label>
                <input type="text" class="form-control" name ="UIL" id="UIL" placeholder="UIL">
              </div>
              <div class="form-group ">
                <label for="inputPlacement"></label>
                <input type="text" class="form-control" name ="placement" id="placement" placeholder="Placement Company">
              </div>
            
              <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                

                <button type="submit" class="registerbtn" name="register">Register</button>
            <div class="container signin">
                <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            </div>
          </form>
      
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
  </body>
  <div style="background-color: #221f1f;

  max-width: 121%;
  width: 100%;
  bottom: 0;
  height: 37vh;
  margin-top: 7%;
  margin-left: 0%;>
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-2 col-12">
                    <img src="https://i.ibb.co/cgMV93W/BVSpace-logos-white.png" style="margin-right: 5%; width:100%;height:100%">
                </div>
                <div class="col-md-2 col-12" style="width:25em;text-align:center;">
                    <b>
                        <p style="color:white; padding-top:10%; margin-top:25px;margin-right: -20%;">Contact US: 000-111-0001
                    </b>&nbsp


                    <a href="#" style="text-decoration:none"><i class="fa fa-facebook-official" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                    <a href="#" style="text-decoration:none"><i class="fa fa-instagram" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp</a>
                    <a href="#" style="text-decoration:none"><i class="fa fa-twitter" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i></a>
                    </p>
                </div>
            </div>
        <!-- </div> -->

        <h4 style="
                color: white;
    font-family: 'Francois One', sans-serif;
    font-weight: 500;
    letter-spacing: 2.5px;
    margin-top: -3%;
    font-size: 1em;
    margin-left: 23%;

              ">Copyright 2022 Easy WebContent, Inc. All rights reserved. Proudly made in India.</h4>

    </div>
</html>
