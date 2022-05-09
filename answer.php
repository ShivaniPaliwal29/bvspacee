<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>

<?php
session_start();
if(isset($_SESSION['id'])){ 
    if(isset($_POST['answer'])){ 
        $ques_id=$_POST['questionID'];
        $answer=$_POST['answer'];                           
        if(isset($answer)){
            $server = "localhost";
            $username = "root";
            $password = "";

            $con = mysqli_connect($server, $username, $password);

            if(!$con){
                die("connection to this database failed due to".mysqli_connect_error());
            }
            $email= $_SESSION['emailId'];
            $sql="INSERT INTO `bvspace`.`answer` (`ques_id`,`ans`, `upvote` ,`date_posted`,`id`) VALUES ('$ques_id','$answer' , 0 , current_timestamp(),'$email');";
            //echo $sql;
            if($con->query($sql) == true){
                //echo "Successfully inserted";
                header("Location:displayanswer.php?value=".$ques_id); 


            }
            else{
                echo "ERROR:$sql <br> $conn->error";
            }

            $con->close();
        }
    }
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}

?>

