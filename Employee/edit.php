<?php
$title = 'Edit Employee';
include('../templetes/header.php');
include('../templetes/navbar.php');
include('../App/Models/Company.php');

include('../App/Models/Employee.php');


if (isset($_GET['id'])) {
    $employee = Employee::find($_GET['id']);
}


?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Edit Employee</h1>
</div>
</ul>

<form action="../App/Controllers/EmployeeController.php" name="EmployeeForm" method="post" onsubmit=" return validateForm()">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        <p class="" id="nameError"></p>

    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <p class="" id="emailError"></p>

    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No">
        <p class="" id="phoneError"></p>

    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" Placeholder="Address">
        <p class="" id="addressError"></p>

    </div>
    <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <select name="company" id="company" class="form-select">
            <?php
            $companies = Company::all();
            foreach ($companies as $company) {
                echo '<option value="' . $company['id'] . '">' . $company['name'] . '</option>';
            }
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="project" class="form-label">Project</label>
        <select name="project" id="project" class="form-select">
            <?php
            $projects = Project::all();
            foreach ($projects as $project) {
                echo '<option value="' . $project['id'] . '">' . $project['name'] . '</option>';
            }
            ?>
        </select>
    </div>

    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
</form>

<script src="../Validation/employeevalidate.js"></script>

<?php include('../templetes/footer.php') ?>