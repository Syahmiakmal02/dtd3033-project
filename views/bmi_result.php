<?php
include 'layouts/db_config.php';

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
                    $counter = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['height'] . "</td>";
                        echo "<td>" . $row['weight'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['bmi'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        $counter++;

                        //button edit
                        echo "<td><a href='index.php?page=bmi&id=" . $row['id'] . "'>Edit</a></td>";
                    }
                }
                else {
                    echo "<tr><td colspan='8'>No records found.</td></tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
    // Close the database connection
    $conn->close();
    ?>
</div>