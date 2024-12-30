<?php
include 'db_config.php';

$sql = "SELECT * FROM bmi_calculator";
$result = $conn->query($sql);
?>

<div class="table" id="bmi_result">
    <h1>BMI Results</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Gender</th>
            <th>BMI</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['height']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bmi']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['category']) . "</td>";

                        //button edit
                        echo "<td><a href='index.php?page=bmi&id=" . $row['id'] . "'>Edit</a></td>";
                    }
                }
                else {
                    echo "<tr><td colspan='7'>No records found.</td></tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
    // Close the database connection
    $conn->close();
    ?>
</div>