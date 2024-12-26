<?php
// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    include 'header.php';

    // Get the current ID from the request
    $input = json_decode(file_get_contents('php://input'), true);
    $currentId = $input['currentId'] ?? 0;

    // Fetch the next name
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
    exit; // Stop further rendering
}

// Regular page rendering logic
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
            <h1 id="website-name"><?php echo htmlspecialchars($website_name); ?></h1>
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

    <script>
        // Initialize the current ID
        window.currentId = <?php echo json_encode($website_id ?? 0); ?>;
    </script>
</body>

</html>
