<?php
    if($_POST['user'] && $_POST['pass'])
    {
        $db = mysqli_connect("127.0.0.1", "root", "", "portal");
        if(!$db)
        {
            echo "Could not login to database.<br>Error: " . mysqli_connect_errno();
            exit;
        }

        $username = mysqli_real_escape_string($db, $_POST['user']);
        $password = mysqli_real_escape_string($db, $_POST['pass']);
        
        echo "Logged in!";
    }
    else
    {
        echo "Invalid input";
    }
?>