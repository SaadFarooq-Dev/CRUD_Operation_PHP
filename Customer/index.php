<?php
$title = 'Companies List';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Customer.php');

?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Customers List</h1>
    <a href="Create.php" class="btn btn-primary btn-lg" type="button">Add New Customer</a>
</div>



<ul class="list-group">
    <?php
    $customers = Customer::all();
    foreach ($customers as $customer) {
        echo '<li class="list-group-item">
                <div class="row">
                    <div class="col"><a href="Show.php?id=' . $customer['id'] . '">' . $customer['name'] . '</a></div>
                    <div class="col">' . $customer['email'] . '</div>
                    <div class="col">' . $customer['phone'] . '</div>
                </div>
            </li>';
    }
    ?>

</ul>

<?php include('../templetes/footer.php') ?>