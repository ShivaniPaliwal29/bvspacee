<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
      href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap"
      rel="stylesheet"
    />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome</title>
    <style>
      html,
      body {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden;
      }
      div ul h6 {
        display: inline-block;
        list-style: none;
        font-size: 13px;
        font-family: sans-serif;
        color: #333333;
        background-color: #fff;
        font-weight: 800;
        padding-left: 5%;
        letter-spacing: 4px;
      }
      .pink img {
        position: absolute !important;
        width: 50%;
        height: 200%;
        margin-left: 40%;
        margin-top: 5%;
        z-index: 1;
      }
      h6:hover {
        color: gray;
        cursor: pointer;
      }
      #myVideo {
        min-width: 100%;
        height: 93%;
        border: none;
        object-fit: cover;
        position: relative;
      }
      .fa-circle {
        color: #cea478;
        font-size: 10px;
        padding-right: 5px;
      }
      .page {
        background-image: url(https://img.freepik.com/free-vector/vintage-ornamental-flowers-background_52683-28040.jpg?size=626&ext=jpg);
        padding-top: 10%;
        padding-bottom: 8%;
        z-index: 1;
        /* position: relative; */
      }
      .munch {
        background-color: #fff;
        margin-top: -1%;
        border: 2px solid #ccc;
        margin-left: 10%;
        margin-right: 10%;
      }
      .blue {
        display: flex;
        background-color: #fff;
        margin-top: 3%;
        margin-left: 10%;
        margin-right: 10%;
      }
      .flex-container {
        display: flex;
        background-image: url(https://img.freepik.com/free-vector/vintage-ornamental-flowers-background_52683-28040.jpg?size=626&ext=jpg);
        background-color: #fff;
      }

      .flex-container > div {
        width: 25%;
        background-color: #fff;
        text-align: center;
        margin-right: 2%;
        padding-top: 5%;
        padding-left: 2%;
        padding-right: 2%;
        border: 2px solid #ccc;
        padding-bottom: 6%;
      }
      .flex-container a {
        text-align: center;
        font-family: "Bitter", serif;
        color: #c77171;
        font-weight: 600;
        letter-spacing: 2px;
        margin-bottom: 10%;
      }
      .flex-container a:hover {
        text-align: center;
        font-family: "Bitter", serif;
        color: #c77171;
        font-weight: 600;
        letter-spacing: 2px;
        text-decoration: none;
        padding-bottom: 4px;
        border-bottom: 2px solid #c77171;
        margin-bottom: 10%;
        transition: 0.2s ease;
      }
      .details {
        position: relative;
      }
      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
      }
      .overlay a {
        color: #ccc;
      }
      .overlay a:hover {
        color: #fff;
        text-decoration: none;
      }
      .dets {
        position: relative;
      }
      .overlay-img {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
      }

      @media screen and (min-device-width: 1200px) and (max-device-width: 1600px) and (-webkit-min-device-pixel-ratio: 1) {
        \ .red {
          width: 100%;
        }
        .blue {
          width: 100%;
        }
      }
    </style>
</head>
<body>

<div class="page">
<?php include('header.php');?>
      <div class="munch">
        <div class="row">
          <div class="col-lg-4 col-sm-12 col-12">
            <img
              src="https://i.ibb.co/ng8ZvV0/BVSpace-logos-black.png" alt="BVSpace-logos-black" alt="BVSpace-logos-white"
              style="width: 70%; height: 100%; border-right: 2px solid #ccc"
            />
          </div>
          <div class="col-lg-8 col-sm-12 col-12" style="padding-left: 5%">
            <h4
              style="
                font-family: 'Francois One', sans-serif;
                font-weight: 700;
                letter-spacing: 2px;
                font-size: 40px;
                padding-top: 1%;
              "
            >
              BV SPACE
            </h4>
            <p
              style="
                padding-bottom: 5%;
                font-family: 'Merriweather', serif;
                border-bottom: 2px solid #ccc;
              "
            >
            BVSpace, a Socio-Academic Portal of banasthali Vidyapith is here. We aim to make the life of every Banasthalite simpler & turn these four years into a smoother ride!


            </p>
        <div class="container" >
		    <div class="row">
			    <div class="col-md-4 col-12" >
                    <h5
                    style="
                        padding-bottom: 1%;
                        font-family: 'Bitter', serif;
                        font-weight: 600;
                        width:100%;
                    "
                    >
                    COME JOIN US!
                    </h5>
                    
			    </div>
          
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo "<h3>Welcome to BVSpace - $_SESSION[username] !</h3>";
            }
            else
            {?>

            
                <div class="col-md-2 col-12">
                <button type="button" class="btn btn-dark" style="padding-left:2em; padding-right:2em"><a href="login.php" style="text-decoration:none; color:white"> Login</a></button>
                </div>
                <div class="col-md-2 col-12" >
                <button type="button" class="btn btn-dark" style="margin-left:2em; margin-right:2em; width: 153px;"><a href="register.php" style="text-decoration:none; color:white">Sign Up</a></button>
                </div>
            <?php
            }?>
		    </div>
		</div>
            
          </div>
        </div>
      </div>

      <div class="blue">
        <div class="flex-container">
          <div class="flex-column flex-sm-row">
            <h4
              style="
                font-family: 'Francois One', sans-serif;
                font-weight: 900;
                letter-spacing: 3px;
                font-size: 2.5em;
                padding-top: 1%;
              "
            >WHO ARE WE?</h4>
            <p style="padding-left: 3%; padding-top: 10%; padding-bottom: 30%">
            A bunch of curious, enthusisatic and motivated college students, who work together to build solutions to problems that we face every day.
We build & manage products!
            </p>
            <!-- <a href="#">SEE MENU</a> -->
          </div>
          <div class="flex-column flex-sm-row">
          <h4
              style="
                font-family: 'Francois One', sans-serif;
                font-weight: 900;
                letter-spacing: 2.5px;
                font-size: 2.5em;
                padding-top: 1%;
              "
            >WHAT HAVE WE BEEN UP TO?</h4>
            <p style="padding-left: 3%; padding-top: 10%; padding-bottom: 30%">
            BVSpace will be the one-stop solution for students to access study materials, contact seniors and search for answers!
            </p>
            <!-- <a href="#">SEE LOCATION</a> -->
          </div>
          <div class="flex-column flex-sm-row">
          <h4
              style="
                font-family: 'Francois One', sans-serif;
                font-weight: 900;
                letter-spacing: 2.5px;
                font-size: 2.5em;
                padding-top: 1%;
              "
            >WHOM WILL YOU MEET AT BVSpace?</h4>
            <p style="padding-left: 3%; padding-top: 10%; padding-bottom: 30%">
            Students who are leveraging experiential learning for leading bright careers! Tech, Product Management, Data Science
Everyone contributing in their own way!
            </p>
            <!-- <a href="#">ABOUT US</a> -->
          </div>
        </div>
      </div>
    </div>

    <div style="background-color: #221f1f;

  max-width: 121%;
  width: 100%;
  bottom: 0;
  height: 37vh;
  margin-top: 0%;
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
    
</body>
</html>