<?php
$title = 'Employees List';
include('../templetes/header.php');
include('../templetes/navbar.php');
include('../App/Models/Employee.php');

?>




<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Employees List</h1>
    <a href="Create.php" class="btn btn-primary btn-lg" type="button">Add New Employee</a>
</div>
<ul class="list-group">
    <?php
    $employees = Employee::all();
    foreach ($employees as $employee) {
        echo '<li class="list-group-item">
                <div class="row">
                    <div class="col"><a href="Show.php?id=' . $employee['id'] . '">' . $employee['name'] . '</a></div>
                    <div class="col">' . $employee['email'] . '</div>
                    <div class="col">' . $employee['phone'] . '</div>
                    <div class="col">' . $employee['address'] . '</div>
                    <div class="col"><a href="../Company/Show.php?id=' . $employee['company_id'] . '">' . Employee::company($employee['company_id']) . '</a></div>
                </div>
            </li>';
    }
    ?>

</ul>

<?php include('../templetes/footer.php') ?>