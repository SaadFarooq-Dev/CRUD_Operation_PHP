<?php
$title = 'Add New Company';
include('../templetes/header.php');
include('../templetes/navbar.php');

?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Add New Company</h1>
</div>
</ul>

<form action="../App/Controllers/CompanyController.php" name="CompanyForm" method="post" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
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
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
        <p class="" id="addressError"></p>

    </div>
    <div class="mb-3">
        <label for="website-link" class="form-label">Website Link</label>
        <input type="text" class="form-control" name="website" id="website-link" placeholder="Website">
        <p class="" id="websiteError"></p>

    </div>

    <button type="submit" name="add" class="btn btn-primary">Add</button>
</form>

<script src="../Validation/companyvalidate.js"></script>

<?php include('../templetes/footer.php') ?>