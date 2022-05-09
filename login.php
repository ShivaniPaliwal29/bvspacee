<?php

require_once "config.php";

session_start();

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
  if($result){
    
    if (mysqli_num_rows($result) == 1) { //if the data matches with someone
      $result_fetch = mysqli_fetch_assoc($result);
      if($result_fetch['is_verified']==1){
        if((password_verify($_POST['password'],$result_fetch['password']))){
          //if password matched
          $_SESSION['logged_in']=true;
          $_SESSION['email']=$result_fetch['email'];
          $_SESSION['id'] =$result_fetch['id'];
          $_SESSION['username']=$result_fetch['username'];
          echo "<script>
               alert('Welcome to bvspace.');
              </script>";
  
          header("location: index.php");
          
        }else{
          //password doesnt match
          echo "<script>
               alert('OOPS! Incorrect password.');
               window.location.href='login.php';
              </script>";
  
        }
      }else{
        echo "<script>
               alert('EMAIL NOT VERIFIED.');
               window.location.href='login.php';
              </script>";

      }
     
    }else{
      echo "<script>
             alert('OOPS! Email not registered.');
             window.location.href='register.php';
            </script>";
    }
  }else{
    echo "<script>
             alert('Cannot run query.');
             window.location.href='index.php';
            </script>";
  }
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
    
    <title>Login BVSpace</title>
    <style>
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
  </head>
  <body>
  <?php include('header.php');?>
  

<div class="container" style="margin-top: 7%;height: 100%;width: 100%; ">
  
    <form action="login.php" method="post" style=" margin-left:15%; margin-right:15%;width:68%">
    <h3>Please Login Here:</h3>
    <hr>

    <div class="form-group">
      <label for="exampleInputEmail1"></label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email*" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1"></label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password*" required>
    </div>
   
    <button type="submit" class="registerbtn" name="login">Login</button>
    
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
