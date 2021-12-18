<?php
$title = 'Companies List';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Company.php');

?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Companies List</h1>
    <a href="Create.php" class="btn btn-primary btn-lg" type="button">Add New Company</a>
</div>



<ul class="list-group">
    <?php
    $companies = Company::all();
    foreach ($companies as $company) {
        echo '<li class="list-group-item">
                <div class="row">
                    <div class="col"><a href="Show.php?id=' . $company['id'] . '">' . $company['name'] . '</a></div>
                    <div class="col">' . $company['email'] . '</div>
                    <div class="col">' . $company['phone'] . '</div>
                    <div class="col">' . $company['address'] . '</div>
                    <div class="col">' . $company['website'] . ' </div>
                </div>
            </li>';
    }
    ?>

</ul>

<?php include('../templetes/footer.php') ?>