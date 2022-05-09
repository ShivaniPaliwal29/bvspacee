<?php
session_start();
if(isset($_SESSION['id']))
{
    $question=filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
    if(isset($question)){
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die("connection to this database failed due to".mysqli_connect_error());
        }

            //$view_times_no = filter_input(INPUT_POST, 'view_times_no', FILTER_VALIDATE_INT);
            $id = $_SESSION['id'];//filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $sql="INSERT INTO `bvspace`.`question` (`ques`, `view_times_no` ,`date_posted`,`id`) VALUES ('$question' , 0 , current_timestamp(),'$id');";


        /*$question=filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
        //$clean = filter_input(INPUT_POST, 'clean', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql="INSERT INTO `quora`.`question` (`ques`, `clean`, `dd`) VALUES ('$question', 'null' , current_timestamp());";*/
        //echo $sql;

        if($con->query($sql) == true){
            //echo "Successfully inserted";
            echo '<script>alert("Question posted Successfully"); window.location.href="display.php"</script>';
        }
        else{
            echo "ERROR:$sql <br> $conn->error";
        }

        $con->close();
    }

?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bulb -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                input[type="text"]
                {
                    font-size:24px;
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
    <title>Post Question</title>
    </head>
    <body>
    <div>
        <?php include('header.php');?>
        <!-- <img
              src="https://www.azquotes.com/picture-quotes/quote-it-is-not-the-answer-that-enlightens-but-the-question-eugene-ionesco-14-15-17.jpg" alt="BVSpace-logos-black" alt="BVSpace-logos-white"
              style="max-width: 115%;margin-left: -8%;width: 115%;margin-top:-2%; height: 13%; border-right: 2px solid #ccc"
            /> -->
        <div class="container" style="margin-top:4%;border-color: #fff">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-header">
                             <h1>Q & A</h1>  
                            </div>
                            <div class="card-body" style="padding: 1rem 1rem">
                                <div class="row">
                                    <div class="col-md-7" style="width: 103.333%;border-color: #fff;border-width: 0px 0px">
                                    <table class="table table-bordered" style="border-collapse: collapse" style="width: 100%;  border-width: 0px 0px;border-color: #fff">
                                            <!-- <thead>
                                                <tr class="header-row" style="color: #d10f6a;border-color: #fff;border-width: 0px 0px">
                                                    <th class="header-item items">Question</th>

                                                </tr>
                                            </thead> -->
                                            <tbody style="background-color: #dab897;">
                                                <tr style="border-width: 0 0px">
                                                    <th class="items" style="padding:30px;font-size: 100%;border-width: 0 0px;width: 57%;">
                                                    <form action="question.php" method="post">
                                                        <!-- <div class="input-group mb-3"> -->
                                                        <textarea name="question" id="question" cols="30" rows="10" class="form-control" size="50%"placeholder="Ask your question here..." style="background-color: #FBF6EA" required></textarea>
                                                        <input type="submit" value="POST" name="post" class="btn btn-primary" style="background-color: black"/>
                                                    </form>
                                                    </th>
                                                    <th style="border-width: 0px 0px;font-size:15px">
                                                        <p style="text-transform: uppercase"><br><br>
                                                        <i class="fa fa-lightbulb-o" style="font-size:20px;color:yellow"></i> Tips on getting good answers quickly
                                                            <p>
                                                                <ul><li>Make sure your question has not been asked already</li>
                                                                <li>Keep your question short and to the point</li>
                                                                <li>Double-check grammar and spelling</li></ul>
                                                            </p>
                                                        </p>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--        <form action="question.php" method="post">
        <div><h1>Q & A</h1></div>
       <textarea name="question" id="question" cols="30" rows="10" placeholder="Ask your question here..."></textarea>
       <input type="submit" value="POST" name="post" />
        </form>-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

                    
                    </body>
                    <?php include('footer.php');?>
</html>  
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>