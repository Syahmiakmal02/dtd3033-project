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
            <a href="#" onclick="showPage('home')" id="homeLink">Home</a>
            <a href="#" onclick="showPage('bmi')" id="bmiLink">BMI Calculator</a>
            <a href="#" style="float:right">Link</a>
        </div>

        <div id="content">
            <div id="home">
                <?php include 'layouts/home.php'; ?>
            </div>
            <div id="bmi">
                <?php include 'layouts/bmi.php'; ?>
            </div>
        </div>

        <?php include 'layouts/footer.php'; ?>
        <script src="script.js"></script>
</body>

</html>