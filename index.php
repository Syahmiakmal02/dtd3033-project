<?php
// index.php

// Include header.php to fetch website details
include 'layouts/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="card">
        <div class="header">
            <h1><?php echo htmlspecialchars($website_name); ?></h1>
            <p><?php echo htmlspecialchars($website_desc); ?></p>
        </div>
        <div class="topnav">
            <a href="#" onclick="showTab('home')">Home</a>
            <a href="#" onclick="showTab('bmi')" style="float:right">BMI Calculator</a>
            <a href="#" style="float:right">Link</a>
        </div>
    </div>
    
    <div class="content">
        <!-- Home Section -->
        <div id="home" class="tab-content">
            <h2>Welcome to the Home Page</h2>
            <p>This is the homepage content. Click "BMI Calculator" to switch tabs.</p>
        </div>

        <!-- BMI Calculator Section -->
        <div id="bmi" class="tab-content" style="display: none;">
            <div class="row">
                <div class="leftcolumn">
                    <?php include 'layouts/left-column.php'; ?>
                </div>
                <div class="rightcolumn">
                    <?php include 'layouts/right-column.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'layouts/footer.php'; ?>
</body>

<script src="script.js"></script>

</html>