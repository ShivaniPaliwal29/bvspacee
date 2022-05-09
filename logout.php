<?php //    CODE FOR LOGOUT   //?>

<?php
session_start();
if(isset($_SESSION['id']))
{
    setcookie(session_name(),'',100);
    session_unset();
    session_destroy();
    echo '<script>alert("Successfully logged out!"); window.location.href="index.php"</script>';
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>
