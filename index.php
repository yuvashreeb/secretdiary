<?php
include ("login.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secret Dairy</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(".contentContainer").css("min-height", $(window).height());
        </script>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <div class="navbar navbar-default navbar-fixed-top">

            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a href="" class="navbar-brand">APP</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-right" method="post">
                        <div class="form-group">
                            <input type="email" name="loginemail" class="form-control" placeholder="EmailId" value="<?php if (isset($_POST['loginemail'])) echo addslashes($_POST['loginemail']); ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="loginpassword" class="form-control" placeholder="password" value="<?php if (isset($_POST['loginpassword'])) echo addslashes($_POST['loginpassword']); ?>"/>
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="login">
                    </form>
                </div>

            </div>
        </div>
        <div class="container contentContainer" id="topcontainer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3"  id="toprow">
                    <h1 class="margintop">Secert Dairy</h1>
                    <p class="lead">Your own private diary.With you whereever you go.</p>
                    <?php
                    if ($error) {
                        echo '<div class="alert alert-danger">' . addslashes($error) . '</div>';
                    }
                    if ($msg) {
                        echo '<div class="alert alert-success">' . addslashes($msg) . '</div>';
                    }
                    ?>
                    <p class="bold margintop">Interested ? Sign Up Below.</p>
                    <form class="margintop" method="post">
                        <div class="form-group">
                            <label for="email">Email Id
                            </label>
                            <input type="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo addslashes($_POST['email']); ?>"/><br/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password
                            </label><input type="password" name="password" class="form-control" value="<?php if (isset($_POST['password'])) echo addslashes($_POST['password']); ?>"/><br/>
                        </div>
                        <input type="submit" name="submit" value="signup" class="btn btn-success" />
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>