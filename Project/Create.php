<?php
$title = 'Add New Project';
include('../templetes/header.php');
include('../templetes/navbar.php');
include('../App/Models/Company.php');
include('../App/Models/Customer.php');


?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Add New Project</h1>
</div>
</ul>

<form action="../App/Controllers/ProjectController.php" method="post" name="ProjectForm" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        <p class="" id="nameError"></p>

    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="description" Placeholder="Description">
        <p class="" id="descriptionError"></p>

    </div>

    <div class="mb-3">
        <label for="number" class="form-label">Budget</label>
        <input type="number" class="form-control" name="budget" id="budget" Placeholder="Budget">
        <p class="" id="budgetError"></p>

    </div>


    <div class="mb-3">
        <label for="date" class="form-label">Start Date</label>
        <input type="date" class="form-control" name="start_date" id="sdate" Placeholder="Start Date">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">End Date</label>
        <input type="date" class="form-control" name="end_date" id="edate" placeholder="End Date">
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
        <label for="customer" class="form-label">Customer</label>
        <select name="customer" id="customer" class="form-select">
            <?php
            $customers = Customer::all();
            foreach ($customers as $customer) {
                echo '<option value="' . $customer['id'] . '">' . $customer['name'] . '</option>';
            }
            ?>
        </select>
    </div>

    <button type="submit" name="add" class="btn btn-primary">Add</button>
</form>
<script src="../Validation/projectvalidate.js"></script>



<?php include('../templetes/footer.php') ?>