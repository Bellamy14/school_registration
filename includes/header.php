<?php
// This includes the session file. This file contains code that starts/resumes a session
// By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />

    <style>
        /* Add this style block to set the background color of the navigation bar to black */
        .navbar-dark.bg-warning {
            background-color: black !important;
        }

        /* Add this style block to set the color of the text in the navigation bar to white */
        .navbar-dark.bg-warning .navbar-nav .nav-link {
            color: white;
        }

        .navbar-dark.bg-warning .navbar-brand {
            color: white;
        }
    </style>

    <title>School Registration System - <?php echo $title ?></title>
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <a class="navbar-brand" href="index.php">

            School Registration

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltmarkup"
            aria-controls="navbarNavAltmarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarNavAltmarkupNav">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="about.php">About us <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="contact.php">Contact us <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="meetteam.php">Meet the Team <span class="sr-only">(current)</span></a>

                <a class="nav-link nav-link" href="viewrecords.php">View Attendees</a>
            </div>
            <div class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['userid'])) {
                ?>
                <span class="navbar-text mx-2">Welcome <?php echo $_SESSION['username'] ?>! </span>
                <a class="nav-item nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
                <?php } else { ?>
                <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <br/>