<?php
// Include the database configuration file
include 'db_config.php';

// SQL query to fetch all data from the BMI table (replace 'bmi_table' with your actual table name)
$sql = "SELECT * FROM bmi_table"; // Adjust 'bmi_table' to your actual table name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Results</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>BMI Results</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Height (cm)</th><th>Weight (kg)</th><th>BMI</th><th>Date</th></tr>"; // Adjust columns based on your table

        // Fetch each row and display in the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // Replace 'id' with your column name
            echo "<td>" . htmlspecialchars($row['name']) . "</td>"; // Replace 'name' with your column name
            echo "<td>" . htmlspecialchars($row['height']) . "</td>"; // Replace 'height' with your column name
            echo "<td>" . htmlspecialchars($row['weight']) . "</td>"; // Replace 'weight' with your column name
            echo "<td>" . htmlspecialchars($row['bmi']) . "</td>"; // Replace 'bmi' with your column name
            echo "<td>" . htmlspecialchars($row['date']) . "</td>"; // Replace 'date' with your column name
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
