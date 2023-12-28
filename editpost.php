<?php
require_once 'includes/db/conn.php';

// Get values from the post operation
if (isset($_POST['submit'])) {
    
    // Extract values from the post array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $choice = $_POST['choice'];

    // Call crud function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $choice);

    // Redirect to viewrecords.php
    if ($result) {
        header("Location: viewrecords.php");
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}
?>
