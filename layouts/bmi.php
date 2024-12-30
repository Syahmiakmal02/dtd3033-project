<?php
include('layouts/db_config.php');

// Ensure the connection is active
if (!$conn || $conn->connect_error) {
    die("Database connection is not active or failed.");
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check the state of $conn before using it
    if (!$conn) {
        die("Database connection is closed.");
    }

    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $height = isset($_POST['height']) ? floatval($_POST['height']) : null;
    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : null;
    $gender = $conn->real_escape_string($_POST['gender']);

    $bmi = null;
    $category = null;

    if ($height && $weight) {
        $bmiHeight = $height / 100;
        $bmi = round($weight / ($bmiHeight * $bmiHeight), 2);

        if ($bmi < 18.5) {
            $category = 'Kurus';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = 'Normal';
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = 'Berlebihan Berat Badan';
        } else {
            $category = 'Obesiti';
        }
    }

    $sql = "INSERT INTO bmi_calculator (name, height, weight, gender, bmi, category) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sddsss", $name, $height, $weight, $gender, $bmi, $category);
        if ($stmt->execute()) {
            $message = "Data successfully saved!";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Error preparing statement: " . $conn->error;
    }
}
?>

<div class="row">
    <!-- Left Column -->
    <div class="leftcolumn">
        <div class="main-card">
            <h2>BMI Calculator</h2>
            <?php if (!empty($message)): ?>
                <p class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
            <form action="index.php?page=bmi" method="POST" id="bmiForm">
                <label for="name">Name:</label> <br>
                <input type="text" name="name" id="name" required> <br>

                <label for="height">Height (cm):</label> <br>
                <input type="number" name="height" id="height" step="0.1" required> <br>

                <label for="weight">Weight (kg):</label> <br>
                <input type="number" name="weight" id="weight" step="0.1" required> <br>

                <label>Gender:</label><br>
                <label for="gender_male">
                    <input type="radio" name="gender" id="gender_male" value="male" required> Male
                </label>
                <label for="gender_female">
                    <input type="radio" name="gender" id="gender_female" value="female"> Female
                </label><br>

                <input type="submit" value="Save Data">
            </form>
        </div>
    </div>

    <!-- Right Column -->
    <div class="rightcolumn">
        <div class="card">
            <h2>Result</h2>
            <?php 
                if(isset($bmi, $category)){
                    echo "<h4>Your BMI is: $bmi</h4>";
                    echo "<h4>Your body weight category is: $category</h4>";
                }
                else {
                    echo "<h4>Fill in the form to calculate your BMI.</h4>";
                }
            ?>
        </div>
        <div class="card">
            <h2>DB Connection Status</h2>
            <?php
            // Check and display connection status
            if ($conn->connect_error) {
                echo "<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>";
            } else {
                echo "<p style='color: green;'>Connected successfully</p>";
            }
            ?>
        </div>
    </div>
</div>