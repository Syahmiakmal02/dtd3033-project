<?php
include 'db_config.php';

$sql = "SELECT * FROM bmi_calculator";
$result = $conn->query($sql);
?>

<div class="table">
    <h1>BMI Results</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Height (cm)</th>
            <th>Weight (kg)</th>
            <th>gender</th>
            <th>BMI</th>
            <th>Category</th>
        </tr>"; // Adjust columns based on your table

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['height']) . "</td>";
            echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($row['bmi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>