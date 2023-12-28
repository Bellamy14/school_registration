<?php 
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'includes/db/conn.php';
    require_once 'includes/auth_check.php';

    // Get attendee by id
    if (!isset($_GET['id'])) {
        include 'includes/errormessage.php';
    } else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (empty($result['avatar_path'])) { ?>
                <img src="uploads" class="rounded-circle img-fluid" alt="Default Image" style="width: 20%; height: 20%">
            <?php } else { ?>
                <img src="<?php echo $result['avatar_path']; ?>" class="rounded-circle img-fluid" alt="Attendee Image" style="width: 20%; height: 20%">
            <?php } ?>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['firstname'].'  '.$result['lastname']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
                    <p class="card-text">Date of Birth: <?php echo $result['dateofbirth']; ?></p>
                    <p class="card-text">Email: <?php echo $result['email']; ?></p>
                    <p class="card-text">Contact: <?php echo $result['contactnumber']; ?></p>
                </div>
            </div>

            <div class="mt-3">
                <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php require_once 'includes/footer.php'; ?>
