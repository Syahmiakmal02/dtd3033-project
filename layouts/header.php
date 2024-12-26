<?php
// header.php

// Include the database configuration file
require_once 'db_config.php';

// Fetch data from the database
$sql = "SELECT name, description FROM website_desc WHERE id = 2";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $website_name = $row['name'];
    $website_desc = $row['description'];
} else {
    $website_name = "Default Name";
    $website_desc = "Default Description";
}

// Close the database connection
$conn->close();
