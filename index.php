<?php
include 'layouts/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet"  href="../css/styles.css">
    <link rel="stylesheet"  href="../css/home.css">
</head>

<body>
    <div class="card">
        <div class="header">
            <h1><?php echo htmlspecialchars($website_name); ?></h1>
            <p><?php echo htmlspecialchars($website_desc); ?></p>
        </div>
        <div class="topnav">
            <a href="?page=home">Home</a>
            <a href="?page=bmi">BMI Calculator</a>
            <a href="?page=bmi_result">BMI Result</a>
            <a href="views/auth.php" style="float:right">login</a>
        </div>

        <div id="content">
            <?php

            switch ($page) {
                case 'bmi':
                    include 'views/bmi.php';
                    break;
                case 'bmi_result':
                    include 'views/bmi_result.php';
                    break;
                default:
                    include 'views/home.php';
                    break;
            }
            ?>
        </div>
        <?php include 'layouts/footer.php'; ?>
        <script src="script.js" defer></script>
</body>

</html>