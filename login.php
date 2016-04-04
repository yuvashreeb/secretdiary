<?php

error_reporting(0);
session_start();
if ($_GET['logout'] == 1 AND $_SESSION['id']) {
    session_destroy();
    $msg = "you have been successfully logged out!";
}
include("connection.php");
if (isset($_POST['submit']) == "signup") {
    $error = "";

    if (!$_POST['email'])
        $error.="please enter the email id <br/>";
    else if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
        $error.="please enter valid email id <br/>";


    if (!$_POST['password'])
        $error.="please enter the password <br/>";
    else {


        if (strlen($_POST['password']) < 8)
            $error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['password']))
            $error.="password should contain atleast one Captial Letter <br/>";
    }
    if ($error)
        $error = "there were errors in your signup details<br/>" . $error;
    else {
        // $password_md=md5(md5($_POST['email'].$_POST['password']));

        $query = "SELECT * FROM reg_users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
        if ($results)
            $error = "The email address is already registered .if U want to login IN?";
        else {
            $query = "INSERT INTO reg_users (email,password) VALUES('" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . ($_POST['password']) . "')";


            mysqli_query($link, $query);
            echo "you were successfully signed!";
            $_SESSION['id'] = mysqli_insert_id($link);
            // print_r($_SESSION);
            header("Location:mainpage.php");
        }
    }
}// '".mysqli_real_escape_string($link,$_POST['email'])."',md5(md5($_POST['email'].$_POST['password'])."'

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "login") {

        $x = mysqli_real_escape_string($link, $_POST['loginemail']);
        $y = ($_POST['loginpassword']);
        $login_que = "SELECT * FROM reg_users WHERE email='$x' AND password='$y'";
        //$query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail'].$_POST['loginpassword']))."'"; 
        $result1 = mysqli_query($link, $login_que);
        $row = mysqli_fetch_array($result1);
        //print_r($row);
        if ($row) {
            $_SESSION['id'] = $row['id'];
            //print_r($_SESSION);
            header("Location:mainpage.php");
        } else {
            $error = "we could not find a user with the email and password.Sign Up!!";
        }
    }
}
?>
