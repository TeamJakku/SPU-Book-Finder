<?php
    $host = "fdb21.awardspace.net";
    $username = "2699804_spubookfinder";
    $user_pass = "random1234";
    $database_in_use = "2699804_spubookfinder";

    $mysqli = new mysqli($host, $username, $user_pass, $database_in_use); // Connect to database server(localhost) with username and password.

             
if(isset($_GET['email']) && !empty($_GET['email'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
        
        if(!isset($email)){echo "email is NOT set";}        
    $search = $mysqli->query("SELECT user_id, username, password, email, hash, active FROM users WHERE email='".$email."' AND active='0'");
    $match  = $search->num_rows;
                 
    if($match > 0){
        // We have a match, activate the account
        if($mysqli->query("UPDATE users SET active='1' WHERE email='".$email."' AND active='0'")){echo "set active to 1";}else{echo "active is still 0";}

        echo '<div class="statusmsg">Your account has been activated, you can now login<a href="index.php"></div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}

    $mysqli->close();

?>