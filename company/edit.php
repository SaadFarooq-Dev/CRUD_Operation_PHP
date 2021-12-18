<?php
$title = 'Edit Company';
include('../templetes/header.php');
include('../templetes/navbar.php');
include('../App/Models/Company.php');

if (isset($_GET['id'])) {
    $company = Company::find($_GET['id']);
}

?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Edit Company</h1>
</div>
</ul>

<form action="../App/Controllers/CompanyController.php" name="CompanyForm" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="id" value="<?php echo $company['id']; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
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
        <input type="text" class="form-control" id="address" name="address" placeholder="Address No">
        <p class="" id="addressError"></p>

    </div>
    <div class="mb-3">
        <label for="website-link" class="form-label">Website Link</label>
        <input type="text" class="form-control" id="website-link" name="website" placeholder="Website">
        <p class="" id="websiteError"></p>
    </div>

    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
</form>

<script src="../Validation/companyvalidate.js"></script>

<?php include('../templetes/footer.php') ?>