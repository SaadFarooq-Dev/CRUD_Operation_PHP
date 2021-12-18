<?php
$title = 'Company Details';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Customer.php');
include('../App/Models/Company.php');

if (isset($_GET['id'])) {
    $customer = Customer::find($_GET['id']);
}

?>

<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Customer Info</h1>
    <a href="edit.php?id=<?php echo $customer['id'] ?>" class="link-primary" type="button">Edit</a>
    <form action="../App/Controllers/CustomerController.php" method="post" style="display:inline">
        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
    </form>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2">Name</div>
            <div class="col"> <?php echo $customer['name']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Email</div>
            <div class="col"><?php echo $customer['email']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Phone</div>
            <div class="col"><?php echo $customer['phone']; ?></div>
        </div>

    </div>
</div>
<h3 class="display-5">Companies</h3>
<ul class="list-group">

    <?php
    $companies = Customer::companies($_GET['id']);
    if (isset($companies)) {
        foreach ($companies as $company) {
            echo '<li class="list-group-item">
        <div class="row">
            <div class="col"><a href="../Company/Show.php?id=' . $company['id'] . '">' . $company['name'] . '</a></div>
            <div class="col">' . $company['email'] . '</div>
            <div class="col">' . $company['phone'] . '</div>
        </div>
        </li>
    ';
        }
    }

    ?>

    <h3 class="display-5">Projects</h3>
    <ul class="list-group">

        <?php
        $projects = Customer::customerprojects($_GET['id']);
        foreach ($projects as $project) {
            echo '<li class="list-group-item">
        <div class="row">
            <div class="col"><a href="../Project/Show.php?id=' . $project['id'] . '">' . $project['name'] . '</a></div>
            <div class="col">' . $project['description'] . '</div>
            <div class="col">' . $project['budget'] . '</div>
            <div class="col">' . $project['start_date'] . '</div>
            <div class="col">' . $project['end_date'] . '</div>
            <div class="col text-end"><a href="../Project/edit.php?id=' . $project['id'] . '">Edit</a></div>
        </div>
        </li>
    ';
        }

        ?>


        <?php include('../templetes/footer.php') ?>