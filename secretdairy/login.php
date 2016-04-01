<?php

error_reporting(0);
session_start();
include("connection.php");

if (isset($_POST['submit']) == 'sign Up') {
    $error = "";
    if (!$_POST['email'])
        $error.="<br>Please enter your email";
    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $error.="<br>Please enter a valid email address";
    if (!$_POST['password'])
        $error.="<br>please enter a password";
    else {
        if (strlen($_POST['password']) < 8)
            $error.="<br>please enter a password with atleast 8 characters";
        if (!preg_match('`[A-Z]`', $_POST['password']))
            $error = "<br>please include atleast one captial letter";
    }
    if ($error)
        echo "There were error(S) in your signup details:" . $error;
    else {

        $query = " SELECT * FROM reg_users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
        if ($results)
            echo "That email address is already registered.Do you want to login?";
        else {
            $val = md5(md5($_POST['email']) . $_POST['password']);
            $test = mysqli_real_escape_string($link, $_POST['email']);
            $query = "INSERT INTO reg_users(`email`,`password`)VALUES('$test',' $val' )";
            mysqli_query($link, $query);
            echo "You have been signed up!";
            $_SESSION['id'] = mysqli_insert_id($link);
            print_r($_SESSION);
            //Redirect to logged in page
        }
    }
}

if (isset($_POST['submit']) == 'Log In') {

    $query = "SELECT * FROM reg_users WHERE email='" . mysqli_real_escape_string($link, $_POST['loginemail']) . "' LIMIT 1 ";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['id'] = $row['id'];

        print_r($_SESSION);
        // Redirect to logged in page
    } else {
        echo "<br>We could not find a user with that email and password.Please try again";
    }
}
?>
