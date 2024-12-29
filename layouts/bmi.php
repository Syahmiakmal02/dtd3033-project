<?php
require_once 'db_config.php';  // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    try {
        $sql = "INSERT INTO bmi_calculator (name, height, weight, gender, bmi, category) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sddsds", 
            $data['nama'],
            $data['tinggi'],
            $data['berat'],
            $data['gender'],
            $data['bmi'],
            $data['category']
        );
        
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'BMI data saved successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save BMI data']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>

<!-- existing BMI calculator form -->
<div class="row">
    <div class="leftcolumn">
        <div class="main-card">
            <div class="container">
                <h2>BMI Calculator</h2>
                <form id="bmiForm" method="POST" onsubmit="calculateBMI(event)">
                    <label for="nama">Name:</label> <br>
                    <input type="text" name="nama" id="nama" required> <br>

                    <label for="tinggi">Height (cm):</label> <br>
                    <input type="number" name="tinggi" id="tinggi" step="0.1" required> <br>

                    <label for="berat">Weight (kg):</label> <br>
                    <input type="number" name="berat" id="berat" step="0.1" required> <br>

                    <label for="gender">Gender:</label> <br>
                    <input type="radio" name="gender" id="gender_male" value="male" required> Male <br>
                    <input type="radio" name="gender" id="gender_female" value="female" required> Female <br><br>

                    <input type="submit" value="Calculate BMI">
                </form>
            </div>
        </div>
    </div>
    <div class="rightcolumn">
        <div class="card">
            <h2>Result</h2>
            <h3 id="result">Your BMI result will appear here.</h3>
        </div>

        <div class="card">
            <h2>DB Connection Status</h2>
            <?php
            // Include database connection
            include 'db_config.php';

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