<?php //	CODE FOR DISPLAYING MULTIPLE ANSWERS OF A QUESTION	//?> 2

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
	<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.c  ss" rel="stylesheet">
	<link
href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&disp lay=swap" rel="stylesheet">
	<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome. min.css">
	<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.c  ss" rel="stylesheet">
	<link
href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@30 0&family=Pathway+Gothic+One&display=swap"
	rel="stylesheet"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link
href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800& display=swap" rel="stylesheet">
	<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awes ome.min.css">
	<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.m in.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.m in.css" rel="stylesheet">
	<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.c ss" rel="stylesheet">
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
                    padding: 15px 35px;
                    font-size: 19px;
                    border-bottom: 0px solid rgba(255, 255, 255, 0.7);
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
	<div class="card-body">
	<table class="table table-bordered">
	<thead>
	<tr class="header-row">
	<th class="header-item items">Answer</th>
	</tr>
	</thead>
	<tbody>
	<h3><?php
	$value= $_GET['value'];
	$con = mysqli_connect("localhost", "root", "", "bvspace");
	$selectquery3= "SELECT * FROM question WHERE ques_id=$value";
	$query3= mysqli_query($con, $selectquery3);
	while($res3=mysqli_fetch_assoc($query3))
	{
	$view_times=$res3["view_times_no"]+1;
	$sql3="update question set
view_times_no=$view_times where ques_id=$value";
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
	<tr class="table-rows">
	<!-- <th> <?php	echo $res["ques_id"] ?></th> -->
	<th class="items"> <?php	echo $res["ans"] ?>
	<table class="table table-bordered">
	<thead>
	<tr class="table-rows">


	<th class="items">Date : <?php
echo $res["date_posted"] ?></th>
<th class="items">
	<?php $upvote=$res["upvote"]?>


	<table class="table table-bordered">
<thead>
	<tr>
	<th class="items">Upvote
: <?php
$id=$res["ans_id"];?>

	
<?php	
echo
$res["upvote"];?>
</th>
	<th	class="items">



		<form action="upvote.ph p" method="post">
<?php echo





		'<input type="hidden" value="'.$id.'" id="answerID" name="answerID"/> ' ?>
<?php echo




	'<input type="hidden" value="'.$upvote. '" id="up" name="up"/>' ?>
<?php echo






'<input type="hidden" value="'.$res["qu es_id"].'" id="quesID" name="quesID"/>'
?>
<input
		type="submit" value="Like me!" name="post" class="btn btn-primary"
style="background
-image:
linear-gradient(t o right bottom,
#828282,
 
#839fb5,
#5fc5d0, #73e7b8,
#d6fb84);"/>
	</form>
	</th>
	</thead>
	</table>
	</th>
	<th class="items"><?php
	if($res["id"]==$email)
	{?>

	<form action="deleteans.php"
method="post">
	<?php echo '<input
type="hidden" value="'.$id.'" id="answerID" name="answerID"/>' ?>
	<?php echo '<input
type="hidden" value="'.$res["ques_id"].'" id="quesID" name="quesID"/>' ?>
	<input type="submit"
value="Delete me!" name="post" class="btn btn-primary" style="background-image: linear-gradient(to right bottom, #828282, #839fb5, #5fc5d0, #73e7b8, #d6fb84);"/>
	</form>
	<?php
	}?></th>
	</tr>
	</thead>
	</table>
	</th>

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
	<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle. min.js"></script>
	<?php include('footer.php');?>
	</body>
	</html>
	<?php
 	}
	else{
	echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
	}
	?>

