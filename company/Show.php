<?php
$title = 'Company Details';
include('../templetes/header.php');
include('../templetes/navbar.php');

include('../App/Models/Company.php');

if (isset($_GET['id'])) {
    $company = Company::find($_GET['id']);
}

?>

<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Company Info</h1>
    <a href="edit.php?id=<?php echo $company['id'] ?>" class="link-primary" type="button">Edit</a>
    <form action="../App/Controllers/CompanyController.php" method="post" style="display:inline">
        <input type="hidden" name="id" value="<?php echo $company['id']; ?>">
        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
    </form>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2">Name</div>
            <div class="col"> <?php echo $company['name']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Email</div>
            <div class="col"><?php echo $company['email']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Phone</div>
            <div class="col"><?php echo $company['phone']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Address</div>
            <div class="col"><?php echo $company['address']; ?></div>
        </div>
        <div class="row">
            <div class="col-2">Website Link</div>
            <div class="col"><?php echo $company['website']; ?></div>
        </div>
    </div>
</div>
<h3 class="display-5">Employees</h3>
<ul class="list-group">

    <?php
    $employees = Company::employees($_GET['id']);
    foreach ($employees as $employee) {
        echo '<li class="list-group-item">
        <div class="row">
            <div class="col"><a href="../Employee/Show.php?id=' . $employee['id'] . '">' . $employee['name'] . '</a></div>
            <div class="col">' . $employee['email'] . '</div>
            <div class="col">' . $employee['phone'] . '</div>
            <div class="col">' . $employee['address'] . '</div>
            <div class="col text-end"><a href="../Employee/edit.php?id=' . $employee['id'] . '">Edit</a></div>
        </div>
        </li>
    ';
    }

    ?>
    <h3 class="display-5">Customers</h3>
    <ul class="list-group">

        <?php
        $customers = Company::companycustomers($_GET['id']);
        if (isset($customers)) {
            foreach ($customers as $customer) {
                echo '<li class="list-group-item">
        <div class="row">
            <div class="col"><a href="../Customer/Show.php?id=' . $customer['id'] . '">' . $customer['name'] . '</a></div>
            <div class="col">' . $customer['email'] . '</div>
            <div class="col">' . $customer['phone'] . '</div>
            <div class="col text-end"><a href="../Customer/edit.php?id=' . $customer['id'] . '">Edit</a></div>
        </div>
        </li>
    ';
            }
        }

        ?>
        <h3 class="display-5">Projects</h3>
        <ul class="list-group">

            <?php
            $projects = Company::companyprojects($_GET['id']);
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