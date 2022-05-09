<?php //    CODE FOR DISPLAYING MULTIPLE ANSWERS OF A QUESTION   //?>


<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<?php
session_start();
if(isset($_SESSION['id']))
{
?>
<html>
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- delete icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- thumbsup icon -->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- calender -->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- pen -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- disabled delete -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap"
            rel="stylesheet"/>
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <!-- <link rel="stylesheet" href="tablecss.css"> -->
            <!-- footer -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
                * {
                    padding: 0;
                    margin: 0;
                    box-sizing: border-box;
                    /* color:white; */
                    /* font-family: 'Patrick Hand', cursive; */
                    font-family: Verdana, sans-serif;
                    /* color: rgb(238, 236, 236); */
                }
                table, tr, td,th{
                border:none;
                }
                .h4, h4 {
                    text-align: center;
                    font-size: calc(1.275rem + .3vw);
                }
                
                .nested_table td,th,tr
                {
                    background-color: none;
                }

                body {
                    /* width: 100%;
                    height: 100vh; */
                    background-image:url('https://media.istockphoto.com/vectors/damask-wallpaper-pattern-vector-id165794203?k=20&m=165794203&s=612x612&w=0&h=IVSStAR2uRfrdCY_YTa5gUi7mUZI8lZkKISItuRc414=');
                    /* background-color:#E8E8E8; */
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                    flex-direction: column; 
                }

                #table{
                    text-align: center;
                    border-collapse: collapse;
                }

                .table-rows {
                    transition: all 0.3s ease;
                    cursor: pointer;
                }

                .items {
                    /* padding: 15px 35px;
                    font-size: 15px; */
                    /* border-bottom: 0px solid rgba(255, 255, 255, 0.7); */
                }

                .icons {
                    width: 15px;
                    height: 15px;
                    display: inline-block;
                }

                .dec {
                    fill: rgba(239, 49, 49, 0.56);
                    opacity: 0;
                    transition: all 0.5s ease;
                }

                .inc {
                    fill: rgba(110, 227, 89, 0.56);
                    opacity: 0;
                    transition: all 0.5s ease;
                }

                .table-rows:nth-child(even) {
                    background-color: #FBF6EA;
                    color:black;
                }

                .table-rows:nth-child(odd) {
                    background-color: #efe7dd;
                    color:black;
                }
                .registerbtn {
                    background-color: #04AA6D;
                    color: white;
                    padding: 4px 0px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 10%;
                    opacity: 0.9;
                }

       
                .registerbtn:hover {
                opacity: 10;
                }

                .header-row {
                    background-color: white !important;
                    color:black;
                }

                .table-rows:hover {
                    background-color: #dab897;
                    transform: scale(1.1);
                }

                .table-rows:hover svg {
                    opacity: 1;
                    transform: scale(1.2);
                }
            </style>
    </head>
    <body>
    <div>
    <?php include('header.php');
        $value= $_GET['value'];
        $con = mysqli_connect("localhost", "root", "", "bvspace");
    ?>
        <div class="container" style="margin-top:4%;padding:0%">
        <!-- <img
              src="https://twistedsifter.com/wp-content/uploads/2011/10/steve-jobs-foucs-quote.jpg" alt="BVSpace-logos-black" alt="BVSpace-logos-white"
              style="max-width: 115%;margin-left: -8%;width: 115%;margin-top:0%; height: 13%; border-right: 2px solid #ccc"
            /> -->
                <div class="row" style="width: 100%;border-collapse: collapse;padding:0%">
                    <div class="col-md-12">
                        <div class="card mt-4" style="border-collapse: collapse;padding:0%">
                            <!-- <div class="card-header">
                            <h1>Q & A</h1>  
                            </div> -->
                            <div class="card-body" style="padding:0%">
                                <div class="row">
                                    <div class="col-md-7" style="width:100.333%">
                                        <table class="table table-bordered" style="border-collapse: collapse" style="width: 100%" >
                                            <!-- <thead>
                                                <tr class="header-row" style="color: #d10f6a;border-width: 0px 0px">
                                                    <th class="header-item items">Question</th>
                                                </tr>
                                            </thead> -->
                                            <tbody style="background-color: #dab897">
                                                <tr style="border-width: 0px 0px">
                                                    <th class="items" style="padding:20px;border-width: 0px 0px;text-transform: uppercase">
                                                        <?php   
                                                            $selectquery5= "SELECT * FROM question WHERE ques_id=$value";
                                                            $query5= mysqli_query($con, $selectquery5);
                                                            while($res5=mysqli_fetch_assoc($query5))
                                                            {
                                                                echo $res5["ques"];
                                                            }
                                                        ?> 
                                                    </th> 
                                                </tr>
                                                <tr style="border-width: 0px 0px;padding:0%">
                                                    <td class="items" style="padding-bottom:20px;padding-left:23px;padding-right:23px;padding-top:0px;border-width: 0px 0px;">                    
                                                        <form action="answer.php" method="post">
                                                        <textarea name="answer" id="answer" cols="30" rows="10" class="form-control" placeholder="Type your answer here..." size="40%" style="background-color: #f5f5f8;height: 96px;font-size: 13px" required></textarea>
                                                        <?php $qId= $_GET['value'];    echo '<input type="hidden" value="'.$qId.'" id="questionID" name="questionID"/>' ?>
                                                        <input type="submit" value="POST" onclick = "click();" name="post" class="registerbtn" style="background-color: black;"/>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body" style="padding:0%">
                        <table class="table table-bordered" style="border-width: 0 0px">
                            <!-- <thead class="header-row" style="border-width: 0 0px">
                                <tr class="header-row" style="color: #d10f6a;border-width: 0 0px">
                                    <th class="header-item items" style="border-width: 0 0px">Answer</th>
                                </tr>
                            </thead> -->
                            <tbody>
        <h3><?php
                    $value= $_GET['value'];
                    $con = mysqli_connect("localhost", "root", "", "bvspace");
                    $selectquery3= "SELECT * FROM question WHERE ques_id=$value";
                    $query3= mysqli_query($con, $selectquery3);
                    while($res3=mysqli_fetch_assoc($query3))
                    {
                        $view_times=$res3["view_times_no"]+1;
                        $sql3="update question set view_times_no=$view_times where ques_id=$value";
                        //echo $sql3;
                        if($con->query($sql3) == true){
                            //echo "Successfully inserted";

                        }
                        else{
                            echo "ERROR:$sql <br> $conn->error";
                        }
                    }
                            
                    $selectquery= "SELECT * FROM answer WHERE ques_id=$value ORDER BY upvote DESC ";
                    $query= mysqli_query($con, $selectquery);
                    while($res=mysqli_fetch_assoc($query))
                    {
                        session_start();
                        $email= $_SESSION['emailId'];
                        ?>
                        
                        <tr class="table-rows" style="padding:0px;border-width: 0 0px">
                            <td class="items" style="padding:0px;border-width: 0 0px">
                                <table class="table table-bordered" style="border-width: 0 0px;border-collapse:collapse;border:none">
                                    <thead style="border-width: 0 0px">
                                        <tr class="items" style="border-width: 0 0px">
                                            <th class="items" style="padding:30px;border-width: 0 0px"> <?php  echo $res["ans"] ?></th>
                                        </tr>
                                        <tr class="items" style="padding:0px;border-width: 0 0px">
                                            <!-- <th> <?php  echo $res["ques_id"] ?></th> -->
                                            <th class="items" style="padding:0px;border-width: 0 0px">
                                                <table class="table table-bordered" style="border-collapse: collapse;border-width: 0 0px">
                                                    <tbody style="border-width: 0px 0px;color:#7b2f0e">
                                                        <tr class="items" style="color: #7b2f0e" style="font-size: 10px;boder:None;border-width: 0px 0px" >
                                                            <td class="items" style="padding:0px;border-width: 0 0px">&nbsp &nbsp &nbsp<i class='far fa-calendar-alt'> </i><?php  echo " ".$res["date_posted"];?></td>
                                                            <td class="items" style="padding:0px;border-width: 0 0px">
                                                            <i class='fas fa-pen-square'></i>
                                                            <?php
                                                                $i=$res["id"];
                                                                $selectquery4= "SELECT * FROM users WHERE id=$i";
                                                                $query4= mysqli_query($con, $selectquery4);
                                                                while($res4=mysqli_fetch_assoc($query4))
                                                                {
                                                                    echo $res4["username"];
                                                                }
                                                            ?>
                                                            </td>
                                                            <?php $upvote=$res["upvote"]?>
                                                            <td class="items" style="padding:0px;border-width: 0 0px">
                                                                <?php
                                                                    $ansid=$res['ans_id'];
                                                                    $selectquery7= "SELECT * FROM liketable WHERE ans_id=$ansid AND id=$email";
                                                                    $query7= mysqli_query($con, $selectquery7);
                                                                    if(mysqli_fetch_assoc($query7))
                                                                    {
                                                                ?>
                                                                        <a href="unlike.php?answerID=<?php echo $res['ans_id']; ?>&quesID=<?php echo $res['ques_id']; ?>&up=<?php echo $upvote; ?>" data-toggle="tooltip" data-placement="bottom" title="Unlike"><i class='fas fa-thumbs-up' style="color:#7b2f0e"></i></a>   
                                                                    <?php
                                                                    }
                                                                    else
                                                                    {?>
                                                                        <a href="upvote.php?answerID=<?php echo $res['ans_id']; ?>&quesID=<?php echo $res['ques_id']; ?>&up=<?php echo $upvote; ?>" data-toggle="tooltip" data-placement="bottom" title="Like"><i class='fas fa-thumbs-up' style="color:grey"></i></a>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                <?php  echo $res["upvote"];?>
                                                            </td>
                                                            <td class="items" style="padding:0px;border-width: 0 0px"><?php 
                                                            if($res["id"]==$email)
                                                                {?>
                                                                    <a href="deleteans.php?answerID=<?php echo $res['ans_id']; ?>&quesID=<?php echo $res['ques_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="material-icons" style="color:#7b2f0e" >delete_forever</i></a>

                                                                    <?php
                                                                } 
                                                            else
                                                            { ?>
                                                            <i class="material-icons" style="color:grey" title="You can't delete other's posted answers">delete_forever</i>
                                                            <?php 
                                                            } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </td>
                        </tr>
                        <?php
                    }
                    ?><?php
                    $selectquery1= "SELECT * FROM question WHERE ques_id=$value";
                    $query1= mysqli_query($con, $selectquery1);
                    $res1=mysqli_fetch_assoc($query1);
                    //echo $res1["view_times_no"];
                    $res1["view_times_no"]=1+$res1["view_times_no"];
                    //echo $res1["view_times_no"];
                    ?>
             </h3>
                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    <div style="background-color: #221f1f;

max-width: 130%;
width: 121%;
bottom: 0;
height: 39vh;
margin-top: 7%;
margin-left: -9%;>
      <!-- <div class="container"> -->
          <div class="row">
              <div class="col-md-2 col-12">
                  <img src="https://i.ibb.co/cgMV93W/BVSpace-logos-white.png" style="margin-right: 5%; width:100%;height:100%">
              </div>
              <div class="col-md-2 col-12" style="width:25em;text-align:center;">
                  <b>
                      <p style="color:white; padding-top:10%; margin-top:25px;margin-right: -100%;font-size: 1.8em">Contact US: 000-111-0001
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
  font-size: 1.8em;
  margin-left: 23%;

            ">Copyright 2022 Easy WebContent, Inc. All rights reserved. Proudly made in India.</h4>

  </div>
</html>
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>        
