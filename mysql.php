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
        
        if($_POST['new']==1)
        {
            $query = mysqli_query($db, "SELECT * from `users` WHERE username='$username'");
            if(!$query)
            {
                echo "Error: " . mysqli_error($db);
                exit;
            }
            if(mysqli_num_rows($query) > 0)
            {
                echo "Username already taken!";
                exit;
            }
            if($db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')"))
            {
                echo "User created!";
            }
            else
            {
                echo "Error: " . $db->error;
                exit;
            }
        }
        else
        {
            $query = mysqli_query($db, "SELECT * from `users` WHERE username='$username'");
            if(!$query)
            {
                echo "Error: " . mysqli_error($db);
                exit;
            }
            if(mysqli_num_rows($query) == 0)
            {
                echo "Unknown username.";
                exit;
            }

            $data = $query->fetch_assoc();
            if($password == $data["password"])
            {
                echo "Valid User! ID: " . $data["id"];
            }
            else
            {
                echo "Invalid password!";
            }
        }
    }
    else
    {
        echo "Invalid input";
    }
?>