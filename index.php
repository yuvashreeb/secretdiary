<?php include("login.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secret Diary</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" >
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
                    <a href="" class="navbar-brand">Secret Diary</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="email" name="loginemail" placeholder="enter email" class="form-control" value="<?php if (isset($_POST['loginemail'])) echo addslashes($_POST['loginemail']) ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="loginpassword" placeholder="enter password" class="form-control" value="<?php if (isset($_POST['loginpassword'])) echo addslashes($_POST['loginpassword']) ?>"/>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="container contentContainer" id="topcontainer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3"  id="toprow">
                    <h1 class="margintop">SECRET DIARY</h1>
                    <p class="lead">Your own private diary.With you whereever you go.</p>
                    
                    <p class="bold margintop">Interested ? Sign Up Below. </p>
                    <form class="margintop" method="post">
                        <div class="form-group ">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" placeholder="enter email" value="<?php if (isset($_POST['email'])) echo addslashes($_POST['email']) ?>"/>
                        </div>
                        <div class="form-group ">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" placeholder="enter password" value="<?php if (isset($_POST['password'])) echo addslashes($_POST['password']) ?>"/>
                        </div>
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg margintop"/> 
                    </form>
                </div>

            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script>
            $(".contentContainer").css("min-height", $(window).height());
        </script>
    </body>
</html>