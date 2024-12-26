<?php
// header.php

// Include the database configuration file
require_once 'db_config.php';

// Fetch the initial website name and description
$sql = "SELECT id, name, description FROM website_desc LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $website_id = $row['id'];
    $website_name = $row['name'];
    $website_desc = $row['description'];
} else {
    $website_id = 0;
    $website_name = "Default Name";
    $website_desc = "Default Description";
}

// Function to fetch the next name by ID
function getNextName($currentId) {
    global $conn; // Use the global database connection
    $sql = "SELECT id, name FROM website_desc WHERE id > ? ORDER BY id ASC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $currentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null; // Return null if no next name exists
}

// Close the database connection at the end of the script
