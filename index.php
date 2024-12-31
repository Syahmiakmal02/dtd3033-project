<?php
include 'layouts/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet"  href="styles.css">
</head>

<body>
    <div class="card">
        <div class="header">
            <h1><?php echo htmlspecialchars($website_name); ?></h1>
            <p><?php echo htmlspecialchars($website_desc); ?></p>
        </div>
        <div class="topnav">
            <a href="?page=home">Home v3</a>
            <a href="?page=bmi">BMI Calculator</a>
            <a href="?page=bmi_result">BMI Results</a>
            <a href="#" style="float:right">Link</a>
        </div>

        <div id="content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            switch ($page) {
                case 'bmi':
                    include 'layouts/bmi.php';
                    break;
                case 'bmi_result':
                    include 'layouts/bmi_result.php';
                    break;
                default:
                    include 'layouts/home.php';
                    break;
            }
            ?>
        </div>
        <?php include 'layouts/footer.php'; ?>
        <script src="script.js" defer></script>
</body>

</html>