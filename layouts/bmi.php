<?php
require_once 'db_config.php';

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    // Get JSON data
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    // Add debug logging
    error_log("Received BMI data: " . print_r($data, true));
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
        exit;
    }

    try {
        $sql = "INSERT INTO bmi_calculator (name, height, weight, gender, bmi, category) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
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
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        exit;
        
    } catch (Exception $e) {
        error_log("Database error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        exit;
    }
}
?>

<!-- HTML part starts here -->
<!DOCTYPE html>
<html>

<head>
    <title>BMI Calculator</title>
</head>

<body>
    <div class="row">
        <div class="leftcolumn">
            <div class="main-card">
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
                    <input type="radio" name="gender" id="gender_female" value="female"> Female <br><br>

                    <input type="submit" value="Calculate BMI">
                </form>
                <h3 id="result"></h3>
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
</body>

</html>