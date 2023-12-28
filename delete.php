<?php
require_once 'includes/db/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Call a function to delete the record based on $id
    $result = $crud->deleteAttendee($id);

    if ($result) {
        // Deleted Successfully
        header('Location: viewrecords.php'); 
        exit();
    } else {
        // Deletion Error
        echo "Error deleting record.";
    }
} else {
    // No ID provided
    echo "Invalid request.";
}
?>
