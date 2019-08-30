<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "users_db";

    // Database connection
    $conn = new mysqli($db_server, $db_user, $db_password, $db_name);
    if ($conn->connect_errno)
    {
        exit("Database connection failed: " . $conn->connect_errno);
    }
