<?php
$title = 'Projects List';
include('../templetes/header.php');
include('../templetes/navbar.php');


include('../App/Models/Project.php');

?>


<div class="py-2 mb-4">
    <h1 class="display-5 fw-bold">Projects List</h1>
    <a href="Create.php" class="btn btn-primary btn-lg" type="button">Add New Project</a>
</div>



<ul class="list-group">
    <?php
    $Projects = Project::all();
    foreach ($Projects as $project) {
        echo '<li class="list-group-item">
                <div class="row">
                    <div class="col"><a href="Show.php?id=' . $project['id'] . '">' . $project['name'] . '</a></div>
                    <div class="col">' . $project['description'] . '</div>
                    <div class="col"> Rs.' . $project['budget'] . '</div>
                    <div class="col">' . $project['start_date'] . '</div>
                    <div class="col">' . $project['end_date'] . ' </div>
                    <div class="col"><a href="../Company/Show.php?id=' . $project['company_id'] . '">' . Project::company($project['company_id']) . '</a></div>
                </div>
            </li>';
    }
    ?>
</ul>

<?php include('../templetes/footer.php') ?>