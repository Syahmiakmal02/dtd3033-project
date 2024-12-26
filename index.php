<?php
// index.php

// Include header.php to fetch website details
include 'header.php';
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
