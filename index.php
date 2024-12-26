<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); // Start output buffering

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    include 'header.php';

    ob_clean(); // Clear any previous output

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
    exit;
}

include 'header.php';
?>
