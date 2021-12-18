<?php
$title = 'Project Details';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Customer.php');

include('../App/Models/company.php');
include('../App/Models/Project.php');


if (isset($_GET['id'])) {
    $project = project::find($_GET['id']);
}

?>

<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Project Info</h1>
    <a href="edit.php?id=<?php echo $project['id'] ?>" class="link-primary" type="button">Edit</a>
    <form action="../App/Controllers/projectController.php" method="post" style="display:inline">
        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
    </form>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2">Name</div>
            <div class="col"> <?php echo $project['name']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Description</div>
            <div class="col"><?php echo $project['description']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Budget</div>
            <div class="col">Rs.<?php echo $project['budget']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Start Date</div>
            <div class="col"><?php echo $project['start_date']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">End Date</div>
            <div class="col"><?php echo $project['end_date']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Company</div>
            <?php echo '<div class="col"><a href="../Company/Show.php?id=' . $project['company_id'] . '">' . Project::company($project['company_id']) . '</a></div>'; ?>
        </div>
        <div class="row">
            <div class="col-2">Customer</div>
            <?php echo '<div class="col"><a href="../Customer/Show.php?id=' . $project['customer_id'] . '">' . Project::customer($project['customer_id']) . '</a></div>'; ?>
        </div>


    </div>

</div>
<h3 class="display-5">Employees</h3>
<ul class="list-group">

    <?php
    $employees = Project::employees($_GET['id']);
    foreach ($employees as $employee) {
        echo '<li class="list-group-item">
        <div class="row">
            <div class="col"><a href="../Employee/Show.php?id=' . $employee['id'] . '">' . $employee['name'] . '</a></div>
            <div class="col">' . $employee['email'] . '</div>
            <div class="col">' . $employee['phone'] . '</div>
            <div class="col">' . $employee['address'] . '</div>
        </div>
        </li>
    ';
    }

    ?>


    <?php include('../templetes/footer.php') ?>