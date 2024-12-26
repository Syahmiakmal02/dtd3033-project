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