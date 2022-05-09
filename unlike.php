<?php session_start();
if(isset($_SESSION['id']))
{
    $id=$_GET['answerID'];
    $vote=$_GET['up'];
    $ques_id=$_GET['quesID'];
    echo $id." ".$vote;
    $mail= $_SESSION['id'];
    echo $mail;
    $con = mysqli_connect("localhost", "root", "", "bvspace");
    $sql1="DELETE from liketable WHERE ans_id=$id AND id=$mail";
    if($con->query($sql1) == true){
        echo "Successfully deleted";
        $vote=$vote-1;
        $sql="update answer set upvote=$vote where ans_id=$id";
        if($con->query($sql) == true){
            header("Location:displayanswer.php?value=".$ques_id); 
        }
        else
        {
            echo "ERROR:$sql <br> $conn->error";
        }

    }
    else
    {
        echo "ERROR:$sql1 <br> $conn->error";
    }
}
?>