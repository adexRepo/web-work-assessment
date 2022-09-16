<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.802/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.802/js/kendo.all.min.js"></script>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.802/styles/kendo.default-ocean-blue.min.css" />
</head>

<style>
    .section {
        max-height: 250px;
        padding: 0.3rem;
        overflow-y: auto;
        direction: ltr;
        scrollbar-color: #d4aa70 #e4e4e4;
        scrollbar-width: thin;
    }

    .section::-webkit-scrollbar {
        width: 20px;
    }

    .section::-webkit-scrollbar-track {
        background-color: #e4e4e4;
        border-radius: 100px;
    }

    .section::-webkit-scrollbar-thumb {
        border-radius: 100px;
        border: 6px solid rgba(0, 0, 0, 0.18);
        border-left: 0;
        border-right: 0;
        background-color: #0d6efd;
    }

    td {
        white-space: normal !important;
        word-wrap: break-word;
        min-width: 160px;
        max-width: 300px;
    }
</style>

<?php   
    $code = $model['code'];
    // var_dump($model['user_info']);
    // var_dump($model['user_info']['branchId']);
?>

<body>
    <header class="p-2 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class=" <?php if($model['title'] == 'Dashboard') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-secondary">Dashboard</a></li>
                    <li><a href="/attend/attendance" class=" <?php if($model['title'] == 'Attendance') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Attendance</a></li>
                    <li><a href="/perform/performance" class=" <?php if($model['title'] == 'Performance') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Performance</a></li>
                    <li><a href="/promotion/promotions" class=" <?php if($model['title'] == 'Promotion') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Promotions</a></li>
                    <li><a href="/home/about-us" class=" <?php if($model['title'] == 'About Us') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">About Us</a></li>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myProfile">My Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#advToCompany">Advice to company</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settings">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
                    </ul>
                </div>
                <?php require_once __DIR__ . '/popup.php' ?>
            </div>
        </div>
    </header>