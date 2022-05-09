<?php session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
        <title>Submit Material</title>
    </head>
    <style>
        /* Search Bar */


        /* Entire body */
        html {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            /* background: linear-gradient(#141e30, #243b55);
             */
            background-image: url('https://image.shutterstock.com/image-illustration/abstract-blue-white-gray-polygon-260nw-1451847182.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-box {
            position: absolute;
            top: 60%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background:
                linear-gradient(#141e30, #243b55);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box form a {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px
        }

        .login-box a:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
        }

        .login-box a span {
            position: absolute;
            display: block;
        }

        .login-box a span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        .login-box a span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        .login-box a span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        .login-box a span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }

        .custom-file-input::-webkit-file-upload-button {
            animation: btn-anim1 1s linear infinite;
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'SELECT FILE';
            display: inline-block;
            color: #03e9f4;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
        }

        label {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        select {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .firstDiv {
            margin-top: 70px;
            text-align: center;
        }

        @font-face {
            font-family: neon;
            src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/707108/neon.ttf);
        }

        .neon-orange {
            font-family: neon;
            color: #fb4264;
            font-size: 45px;
            text-shadow: 0 0 3vw #f40a35;
            animation: neon-orange 1s ease infinite;
            -moz-animation: neon-orange 1s ease infinite;
            -webkit-animation: neon-orange 1s ease infinite;
        }

        .neon-blue {
            font-family: neon;
            color: #426dfb;
            font-size: 45px;
            text-shadow: 0 0 3vw #2356ff;
            animation: neon-blue 2s linear infinite;
            -moz-animation: neon-blue 2s linear infinite;
            -webkit-animation: neon-blue 2s linear infinite;
            -o-animation: neon-blue 2s linear infinite;
        }

        @keyframes neon-orange {

            0%,
            100% {
                text-shadow: 0 0 1vw #fa1c16, 0 0 3vw #fa1c16, 0 0 10vw #fa1c16,
                    0 0 10vw #fa1c16, 0 0 0.4vw #fed128, 0.5vw 0.5vw 0.1vw #806914;
                color: #fed128;
            }

            50% {
                text-shadow: 0 0 0.5vw #800e0b, 0 0 1.5vw #800e0b, 0 0 5vw #800e0b,
                    0 0 5vw #800e0b, 0 0 0.2vw #800e0b, 0.5vw 0.5vw 0.1vw #40340a;
                color: #806914;
            }
        }

        @keyframes neon-blue {

            0%,
            100% {
                text-shadow: 0 0 1vw #1041ff, 0 0 3vw #1041ff, 0 0 10vw #1041ff,
                    0 0 10vw #1041ff, 0 0 0.4vw #8bfdfe, 0.5vw 0.5vw 0.1vw #147280;
                color: #28d7fe;
            }

            50% {
                text-shadow: 0 0 0.5vw #082180, 0 0 1.5vw #082180, 0 0 5vw #082180,
                    0 0 5vw #082180, 0 0 0.2vw #082180, 0.5vw 0.5vw 0.1vw #0a3940;
                color: #146c80;
            }
        }
    </style>

    <body>
        <?php include('header.php'); ?>

        <div class="container">
            <div class="firstDiv">
                <span class='neon-orange'>SUBMIT YOUR </span>
                <span class='neon-blue'>STUDY MATERIAL</span>
                <span class='neon-orange'>HERE</span>
            </div>
            <div class="login-box">
                <h2>Your File Here</h2>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="user-box">
                        <label for="Branch" style="color: #03e9f4;">Choose your branch:</label>
                        <select name="Branch" style="margin-left: 170px;padding:9px;">
                            <option value="CS">CS</option>
                            <option value="IT">IT</option>
                            <option value="ECE">ECE</option>
                            <option value="EE">EE</option>
                        </select>
                    </div>

                    <div class="user-box">
                        <input type="text" name="subject" placeholder="" type="text" required></input>
                        <label style="color: #03e9f4;">Subject</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="title" placeholder="" class="input" type="text" required></input>
                        <label style="color: #03e9f4;">Title</label>
                    </div>
                    <input type="file" name="file" class="custom-file-input" type="text" placeholder="" required>

                    <a href="#" style="margin-left:100px; margin-right: 100px; padding-left:30px; padding-right:30px">
                        <input type="submit" name="submit" style="color: #03e9f4;padding: 0;border: none;background: none;text-decoration: none;text-transform: uppercase;overflow: hidden;transition: .5s;letter-spacing: 4px"></input>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </form>
            </div>
        </div>

        <div style="text-align: right;
    max-height: 100px;
    margin-top: 453px;
    padding-right: 2%;color:linear-gradient(#141e30, #243b55);">
            <a href="branchWisePreview.php" class="displayDocs" style="color:#141e30 !important;font-weight:600;border: none;text-decoration: none;overflow: hidden;transition: .5s;letter-spacing: 8px;">
                View Uploaded Documents
            </a>
            <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#753BBD" />
            </svg>
        </div>
        <!-- Footer -->
        <div style="background-color: #221f1f;
    width: 100%;
    width: 100%;
    bottom: 0;
    height: 29vh;
    margin-top: 7%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-12">
                        <img src="https://i.ibb.co/cgMV93W/BVSpace-logos-white.png" style="margin-right: 5%; width:100%;height:100%">
                    </div>
                    <div class="col-md-2 col-12" style="width:25em;text-align:center;">
                        <b>
                            <p style="color:white; padding-top:10%; margin-top:25px; padding-right:-10%">Contact US: 000-111-0001
                        </b>&nbsp&nbsp&nbsp&nbsp&nbsp


                        <a href="#" style="text-decoration:none"><i class="fa fa-facebook-official" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                        <a href="#" style="text-decoration:none"><i class="fa fa-instagram" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                        <a href="#" style="text-decoration:none"><i class="fa fa-twitter" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i></a>
                        </p>
                    </div>
                </div>
            </div>

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
<?php
} else {
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>