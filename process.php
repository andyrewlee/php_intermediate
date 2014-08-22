<?php

session_start();
if (!isset($_POST["reset"]))
{
    if (isset($_POST["farm"]))
    {
        $gold = rand(10,20);
    }
    elseif (isset($_POST["cave"]))
    {
        $gold = rand(5,10);
    }
    elseif (isset($_POST["house"]))
    {
        $gold = rand(2, 5);
    }
    elseif (isset($_POST["casino"]))
    {
        $chance = rand(1,10);
        if($chance < 8)
        {
          $gold = rand(-50, 0);
        }
        else
        {
          $gold = rand(0, 50);
        }
    }

    $_SESSION["score"] += $gold;



    if ($gold < 0)
    {
        foreach($_POST as $key => $value)
        {
          array_push($_SESSION["activities"], "You entered a " . $key . " and lost " . $gold . " golds... Ouch.." . "  " . date("M, d, Y H:i:s"));
        }
    }
    else
    {
        foreach($_POST as $key => $value)
        {
            array_push($_SESSION["activities"], "You entered a " . $key . " and earned " . $gold . " golds" . "  " . date("M, d, Y H:i:s"));
        }
    }

    if ($_SESSION["score"] < 0)
    {
        $_SESSION = array();
        $_SESSION["activities"] = array();
        array_push($_SESSION["activities"], "You are out of gold" . "  " . date("M, d, Y H:i:s"));
    }
}
else
{
  $_SESSION = array();
}

header("Location: index.php");



// END OF FILE
