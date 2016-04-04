
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SECRET DAIRY</title>

       
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
         <?php
         session_start();
           include("connection.php");
           $query="SELECT dairy FROM reg_users WHERE id='".$_SESSION['id']."' LIMIT 1";
           $result=mysqli_query($link,$query);
           $row=mysqli_fetch_array($result);
           $dairy=$row['dairy'];
           
         
         
         ?>
    </head>
    <body>
        <div class="navbar navbar-default">

            <div class="container">

                <div class="navbar-header pull-left">

                    <a href="" class="navbar-brand">Secert Dairy</a>

                </div>

                <div class="pull-right">
                    <ul class="navbar-nav">
                        <li><a href="index.php?logout=1">Log Out</a></li>
                    </ul>
                   
                   
                </div>
            </div>

        </div>
        <div class="container contentContainer" id="topContainer">

            <div class="row center marginTop">
                <div class="col-md-6 col-md-offset-3 center ">
                    <textarea class="form-control"><?php echo $dairy; ?></textarea>

            </div>
        </div>
       
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>

            $(".contentContainer").css("min-height", $(window).height());
             $("textarea").css("height", $(window).height()-120);
             $("textarea").keyup(function()
             {
                 $.post("updatedairy.php",{dairy:$("textarea").val()});
             });
        </script>
    </body>
</html>
