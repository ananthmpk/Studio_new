<?php
include("includes.php");

// Content type JSON-ah set pannalam
header('Content-Type: application/json');

// Error logging enable pannalam
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debug: Request method check pannalam
error_log("Request method: " . $_SERVER['REQUEST_METHOD']);
error_log("POST data: " . print_r($_POST, true));

// Check pannalam POST request ah illa
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Required parameters check pannalam
if (!isset($_POST['banner_id'])) {
    echo json_encode(['success' => false, 'message' => 'Banner ID missing']);
    exit;
}

// Status parameter check pannalam - isset illa array_key_exists use pannalam
if (!array_key_exists('status', $_POST)) {
    echo json_encode(['success' => false, 'message' => 'Status parameter missing']);
    exit;
}

$banner_id = (int)$_POST['banner_id'];

// Status explicitly check panni convert pannalam
if ($_POST['status'] === '0' || $_POST['status'] === 0 || $_POST['status'] === false) {
    $status = 0;
} elseif ($_POST['status'] === '1' || $_POST['status'] === 1 || $_POST['status'] === true) {
    $status = 1;
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid status value: ' . $_POST['status']]);
    exit;
}

// Debug log add pannalam
error_log("Processing: Banner ID = $banner_id, Status = $status (original: " . $_POST['status'] . ")");

try {
    // Database connection assume pannalam (includes.php-le irukku)
    // Your database connection variable-ah use pannunga (example: $conn, $pdo, etc.)
    
    // Example using mysqli:
    $query = "UPDATE studio_banner SET status = ? WHERE ban_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status, $banner_id);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Status updated successfully',
            'banner_id' => $banner_id,
            'new_status' => $status
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status']);
    }
    
    $stmt->close();
    
    /* 
    // Alternative: PDO use panninal ippadi pannalam:
    
    $stmt = $pdo->prepare("UPDATE banners SET status = :status WHERE ban_id = :banner_id");
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':banner_id', $banner_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Status updated successfully',
            'banner_id' => $banner_id,
            'new_status' => $status
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status']);
    }
    */
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>