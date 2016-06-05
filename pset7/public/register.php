<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		if ($_POST["username"] == NULL) apologize("Empty field: username");
        if ($_POST["password"] == NULL) apologize("Empty field: passwd");
        if ($_POST["password"] != $_POST["confirmation"]) apologize("Passwd mismatch");
        
        else{
            $ins = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)",
                                $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
            if ($ins == false) apologize ("DB error. Please, try a different username");
            else {
                 $_SESSION["id"] = CS50::query("SELECT LAST_INSERT_ID() AS id")[0]["id"];
                 header('Location: index.php');        
            }
        }
    }

?>