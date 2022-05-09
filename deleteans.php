
<?php


// require('config.php');


// if(isset($_GET['ans_id']))

// {

//      $sql = "DELETE FROM answer WHERE ans_id=".$_GET['ans_id'];

//      $mysqli->query($sql);

// 	 echo 'Deleted successfully.';

// }


?>
<?php
$aid=$_GET['answerID'];
$qid=$_GET['quesID'];
$con = mysqli_connect("localhost", "root", "", "bvspace");
$squery="DELETE FROM answer WHERE ans_id=$aid";
if($con->query($squery) == true)
{
   header("Location:displayanswer.php?value=".$qid);
}
else
{
    echo "ERROR:$sql <br> $conn->error";
}
?>
