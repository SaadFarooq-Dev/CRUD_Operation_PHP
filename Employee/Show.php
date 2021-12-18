<?php
$title = 'Employee Details';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Employee.php');

if (isset($_GET['id'])) {
    $employee = Employee::find($_GET['id']);
}


?>

<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Employee Info</h1>
    <a href="edit.php?id=<?php echo $employee['id'] ?>" class="link-primary" type="button">Edit</a>
    <form action="../App/Controllers/EmployeeController.php" method="post" style="display:inline">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
    </form>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2">Name</div>
            <div class="col"><?php echo $employee['name']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Email</div>
            <div class="col"><?php echo $employee['email']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Phone</div>
            <div class="col"><?php echo $employee['phone']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Address</div>
            <div class="col"><?php echo $employee['address']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Company</div>
            <div class="col"><?php echo Employee::company($employee['company_id']) ?></div>
        </div>
        <div class="row">
            <div class="col-2">Current Project</div>
            <div class="col"><?php echo Employee::project($employee['project_id']) ?></div>
        </div>
    </div>
</div>

<?php include('../templetes/footer.php') ?>