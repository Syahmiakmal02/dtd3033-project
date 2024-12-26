<?php
// index.php

// Include the database configuration file
require_once 'db_config.php';

// Fetch data from the database
$sql = "SELECT name, description FROM website_desc LIMIT 1";
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
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles-framework.css">
</head>
<body>
    <div class="card">
        <div class="header">
            <h1><?php echo htmlspecialchars($website_name); ?></h1>
            <p><?php echo htmlspecialchars($website_desc); ?></p>
        </div>
        <div class="topnav">
            <a href="#">Home</a>
            <a href="#" style="float:right">Link</a>
        </div>
    </div>
    <div class="row">
        <?php include 'left-column.php'; ?>
        <?php include 'right-column.php'; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
