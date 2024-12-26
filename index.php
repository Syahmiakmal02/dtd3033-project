<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles-framework.css">
</head>

<body>

    <div class="card">
        <div class="header">
            <h1>Syahmi Akmal</h1>
            <p>student of Software Engineering (Educational Software)</p>
        </div>

        <div class="topnav">
            <a href="#">Home</a>
            <a href="#" style="float:right">Link</a>
        </div>
    </div>

    <div class="row">
        <div class="leftcolumn">
            <div class="main-card">
                <div class="container">
                    <h2>BMI Calculator</h2>
                    <form id="bmiForm" method="POST" onsubmit="calculateBMI(event)">
                        <label for="name">Nama:</label> <br>
                        <input type="text" name="name" id="name" required> <br>
                        <label for="height">height (cm):</label> <br>
                        <input type="number" name="height" id="height" step="0.1" required> <br>
                        <label for="weight">weight (kg):</label> <br>
                        <input type="number" name="weight" id="weight" step="0.1" required> <br>
                        <label for="gender">gender:</label> <br>
                        <input type="radio" name="gender" id="gender_male" value="male" required> male <br>
                        <input type="radio" name="gender" id="gender_female" value="female" required> female <br><br>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>


        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>Result</h2>
                <h3 id="result"></h3>
            </div>
            <div class="card">
                <h2>Db connection</h2>
                <?php
                // Enable detailed error reporting
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $servername = "localhost";
                $username = "d20221101856";
                $password = "Aa151k027!!";
                $dbname = "d20221101856";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "Connected successfully<br>";
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>

</body>

</html>