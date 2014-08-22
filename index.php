<?php

session_start();

if (!isset($_SESSION["score"]))
{
    $_SESSION["score"] = 0;
}

if (!isset($_SESSION["activities"]))
{
    $_SESSION["activities"] = array();
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Ninja Gold Game</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="container">

            <div id="header">
                <h2>Your Gold:</h2>
                <p><?= $_SESSION["score"] ?></p>
                <form action="process.php" method="post">
                    <input type="submit" name="reset" value="Reset Game">
                </form>
            </div>

            <div id="gamble">

                <div class="get-gold">
                    <h2>Farm</h2>
                    <p>(earns 10-20 golds)</p>
                    <form action="process.php" method="post">
                        <input type="submit" name="farm" value="Find Gold!">
                    </form>
                </div>

                <div class="get-gold">
                    <h2>Cave</h2>
                    <p>(earns 5-10 golds)</p>
                    <form action="process.php" method="post">
                        <input type="submit" name="cave" value="Find Gold!">
                    </form>
                </div>

                <div class="get-gold">
                    <h2>House</h2>
                    <p>(earns 2-5 golds)</p>
                    <form action="process.php" method="post">
                        <input type="submit" name="house" value="Find Gold!">
                    </form>
                </div>

                <div class="get-gold">
                    <h2>Casino!</h2>
                    <p>(earns/takes 0-50 golds)</p>
                    <form action="process.php" method="post">
                        <input type="submit" name="casino" value="Find Gold!">
                    </form>
                </div>

            </div>
            <div id="footer">
                <h3>Activities:</h3>
                <div id="activities">
<?php
                foreach($_SESSION["activities"] as $activity)
                {
                    if(strpos($activity, "-" ) > 0 || strpos($activity, "out of") > 0)
                    {  ?>
                    <p class="red"><?= $activity ?></p>
<?php
                    }
                    else
                    {  ?>
                    <p class="green"><?= $activity ?> </p>
<?php
                    }
                }      ?>
                </div>
            </div>
        </div>
    </body>
</html>
