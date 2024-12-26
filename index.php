<?php
// index.php

// Include header.php to fetch website details
include 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles-framework.css">
    <script>
        function changeName() {
            fetch('index.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        currentId: window.currentId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('website-name').textContent = data.name;
                        window.currentId = data.nextId;
                    } else {
                        alert('No more names found.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>

<body>
    <div class="card">
        <div class="header">
            <h1><?php echo htmlspecialchars($website_name); ?></h1>
            <p><?php echo htmlspecialchars($website_desc); ?></p>
        </div>
        <button onclick="changeName()">Change Name</button>
        <div class="topnav">
            <a href="#">Home</a>
            <a href="#" style="float:right">Link</a>
        </div>
    </div>
    <div class="row">
        <?php include 'left-column.php'; ?>
        <?php include 'right-column.php'; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
<?php
// Handle AJAX request for changing the name dynamically
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $currentId = $input['currentId'] ?? 0;

    // Use the function defined in header.php to fetch the next name
    $next = getNextName($currentId);

    if ($next) {
        echo json_encode([
            'success' => true,
            'name' => $next['name'],
            'nextId' => $next['id']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit; // End script to prevent rendering the rest of the HTML
}
?>

</html>