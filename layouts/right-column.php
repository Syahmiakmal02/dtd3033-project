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