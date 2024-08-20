
<?php
// get-train-locations.php

/*require_once('inc/db.php'); // Adjust path as needed

header('Content-Type: application/json');

try {
    // Assuming you're using MySQLi for database connection
    // Replace table/column names as per your database schema

    $query = "SELECT l.employee_id, l.latitude, l.longitude, t.train_id, t.train_no
    FROM locations l 
    INNER JOIN trains t ON t.current_employee_id = l.employee_id";
        
    $result = $conn->query($query);

    $trains = [];
    while ($row = $result->fetch_assoc()) {
        $trains[] = $row;
    }

    echo json_encode($trains);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
    exit;
}
*/
?>

<?php
// get-train-locations.php

require_once('inc/db.php'); // Adjust path as needed

header('Content-Type: application/json');

try {
    // SQL query to select the most recent location update for each train
    $query = "SELECT l.employee_id, l.latitude, l.longitude, l.timestamp, t.train_id, t.train_no
              FROM locations l 
              INNER JOIN trains t ON t.current_employee_id = l.employee_id
              INNER JOIN (
                  SELECT employee_id, MAX(timestamp) AS max_timestamp
                  FROM locations
                  GROUP BY employee_id
              ) lm ON l.employee_id = lm.employee_id AND l.timestamp = lm.max_timestamp
              ORDER BY l.timestamp DESC";

    $result = $conn->query($query);

    $trains = [];
    while ($row = $result->fetch_assoc()) {
        $trains[] = $row;
    }

    echo json_encode($trains);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
    exit;
}
?>



