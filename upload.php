<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
include 'dbcon.php';
session_start();
$email = $_SESSION['id'];
if (isset($_SESSION['id'])) {

    if (isset($_POST['submit'])) {
        //$date = $_POST['date'];
        $username = $_POST['username'];
        $Branch = $_POST['Branch'];
        $subject = $_POST['subject'];
        $title = $_POST['title'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $filePath = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('pdf', 'jpg', 'png', 'jpeg', 'docx');


        if (!in_array($fileActualExt, $allowed)) {
            echo '<script>alert("You cannot upload this type of file!"); window.location.href="submitMaterial.php"</script>';
        }

        else if ($fileError != 0) {
            echo '<script>alert("Could not upload file"); window.location.href="submitMaterial.php"</script>';
            //throw new Exception("Could not upload file");
        }

        else if ($fileSize > 100000000000) {
            echo '<script>alert("Your file is too big"); window.location.href="submitMaterial.php"</script>';
            //throw new Exception("Your file is too big");
        }

        else{
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($filePath, $fileDestination);

            $insertQuery = "insert into resources(id ,Branch, Subject, Title, Document) values('$email','$Branch','$subject', '$title', '$fileDestination')";

            $queryResponse = mysqli_query($con, $insertQuery);

            if ($queryResponse) {
                echo '<script>alert("File Uploaded Successfully"); window.location.href="submitMaterial.php"</script>';
            } else {
                echo "File not uploaded";
            }
        }
    }
} else {
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
