<?php

// FILE: config.php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure these credentials match your database setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth_app"; // Confirm this is your actual database name

// If your database is named differently (e.g., "SupraPrime"), update accordingly:
// $dbname = "SupraPrime";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Conexão falhou: " . $conn->connect_error);
    // Do not send any output to the client. Let the API script handle the response.
    exit();
}

// Do NOT include the closing PHP tag