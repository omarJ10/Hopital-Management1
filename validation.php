<?php 
include('dbcon.php');
$test=false;
if(isset($_POST['b'])){
    if(($_POST["email"]=="helasaoudi@gmail.com" && $_POST["pwd"]=="hela") OR ($_POST["email"]=="hadilslimani@gmail.com" && $_POST["pwd"]=="hedil") OR ($_POST["email"]=="omarjalled@gmail.com" && $_POST["pwd"]=="omar")){
        $_SESSION['test']=true;
        session_start();
        header('location:dashboard.php');
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Enter a correct password");';
        echo 'window.location="log.php";';
        echo '</script>';
    }

} 

?>