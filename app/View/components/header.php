<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <?php require_once __DIR__.'/importer.php'?>
    </head>
<body>
    <header class="p-2 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 link-secondary">Dashboard</a></li>
                    <li><a href="/home/attendance" class="nav-link px-2 link-dark">Attendance</a></li>
                    <li><a href="/home/performance" class="nav-link px-2 link-dark">Performance</a></li>
                    <li><a href="/home/promotions" class="nav-link px-2 link-dark">Promotions</a></li>
                    <li><a href="/home/about-us" class="nav-link px-2 link-dark">About Us</a></li>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myProfile">My Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#advToCompany">Advice to company</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
                    </ul>
                </div>
                <?php require_once __DIR__.'/popup.php'?>
            </div>
        </div>
    </header>