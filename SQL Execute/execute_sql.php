<?php
// Assuming you have a SQLite database named 'database.db'
$db = new SQLite3('database.db');

// Get the SQL code from the POST request
$postData = json_decode(file_get_contents('php://input'), true);
$sqlCode = $postData['sqlCode'];

// Initialize response array
$response = [];

// Execute the SQL code
$result = $db->query($sqlCode);

if ($result) {
    // Fetch the result as an associative array
    $data = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }

    // Set success flag and data in the response
    $response['success'] = true;
    $response['data'] = $data;
} else {
    // Set error flag and message in the response
    $response['success'] = false;
    $response['message'] = 'Error executing SQL query.';
}

// Close the database connection
$db->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
