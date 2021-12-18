<?php
$title = 'Add New Customer';
include('../templetes/header.php');
include('../templetes/navbar.php');
include('../App/Models/Company.php');


?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Add New Customer</h1>
</div>
</ul>

<form action="../App/Controllers/CustomerController.php" method="post" name="CustomerForm" onsubmit=" return validateForm()">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        <p class="" id="nameError"></p>

    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <p class="" id="emailError"></p>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No">
        <p class="" id="phoneError"></p>
    </div>
    <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <?php
        echo '<select name="company[]" id="company" class="form-select" multiple>';
        $companies = Company::all();
        foreach ($companies as $company) {
            echo '<option value="' . $company['id'] . '">' . $company['name'] . '</option>';
        }
        echo '</select>';
        ?>

    </div>
    <button type="submit" name="add" class="btn btn-primary">Add</button>
</form>


<script src="../Validation/customervalidate.js"></script>

<?php include('../templetes/footer.php') ?>