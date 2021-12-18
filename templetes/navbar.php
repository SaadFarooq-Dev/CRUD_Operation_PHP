<?php
include_once('../App/Models/Authentication.php');
?>


<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../company/index.php">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Employee/index.php">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Customer/index.php">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Project/index.php">Project</a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo Auth::name(); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li>
                            <form action="../App/Controllers/AuthenticationController.php" method="POST">
                                <input type="submit" name="logout" value="Logout" class="dropdown-item"></a>
                                <!-- <a class="dropdown-item" href="#">Logout</a> -->
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>