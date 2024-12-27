<?php
// index.php

// Include header.php to fetch website details
include 'layouts/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">

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
            <a href="#" style="float:right">Link</a>
        </div>

        <div id="content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            switch ($page) {
                case 'bmi':
                    include 'layouts/bmi.php';
                    break;
                default:
                    include 'layouts/home.php';
                    break;
            }
            ?>
        </div>

        <?php include 'layouts/footer.php'; ?>
        <script src="script.js"></script>
</body>

</html>