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

<body>
    <header class="p-2 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class=" <?php if($model['title'] == 'Dashboard') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-secondary">Dashboard</a></li>
                    <li><a href="/attend/attendance" class=" <?php if($model['title'] == 'Attendance') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Attendance</a></li>
                    <li><a href="/perform/performance" class=" <?php if($model['title'] == 'Performance') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Performance</a></li>
                    <li><a href="/home/promotions" class=" <?php if($model['title'] == 'Promotion') echo "h5 font-weight-bold text-primary";?> nav-link px-2 link-dark">Promotions</a></li>
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

                <!-- modal advice to company -->
                <div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settings" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="settings">Settings Rule Benefit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="form-group p-2" method="post" action="/">
                            <div class="modal-body">
                                <div class="row">
                                        <div class="col">
                                            <label for="ruleId" class="col-form-label">Rule ID :</label>
                                            <input name="ruleId" type="text" maxlength="10" class="form-control" id="ruleId" required>
                                        </div>
                                        <div class="col">
                                            <label for="contract" class="col-form-label">Contract :</label>
                                            <select name="contract" id="contract" required class="form-select" aria-label="Default select example">
                                                <option selected value="0" disabled>Choose..</option>
                                                <option  value="1">Contract Worker</option>
                                                <option  value="2">loyalty Worker</option>
                                                <option  value="3">Permanent Worker</option>
                                                <option  value="4">Not Yet Decided</option>
                                            </select>
                                            <!-- <input name="about" type="text" class="form-control" id="recipient-name" required> -->
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="departement" class="col-form-label">Department Name :</label>
                                            <select name="departement" id="departement" required class="form-select" aria-label="Default select example">
                                                <option selected value="0" disabled >Choose..</option>
                                                <option  value="1">Just Info</option>
                                                <option  value="2">Tips and Trick</option>
                                                <option  value="3">Problem</option>
                                            </select>
                                            <!-- <input name="about" type="text" class="form-control" id="recipient-name" required> -->
                                        </div>
                                        <div class="col">
                                            <label for="principalSalary" class="col-form-label">Salary :</label>
                                            <input name="principalSalary" required type="number" class="form-control" id="principalSalary" required>
                                        </div>
                                        <div class="col">
                                            <label for="targetOfDay" class="col-form-label">Target Of Day :</label>
                                            <input name="targetOfDay" type="number" class="form-control" id="targetOfDay" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="interestSalary" class="col-form-label">Bonuses :</label>
                                            <input name="interestSalary" type="number" class="form-control" id="interestSalary">
                                        </div>
                                        <div class="col">
                                            <label for="promotionStandart" class="col-form-label">Promotion Standart :</label>
                                            <input name="promotionStandart" type="number" class="form-control" id="promotionStandart" >
                                        </div>
                                        <div class="col">
                                            <label for="promotionType" class="col-form-label">Promotion Type :</label>
                                            <select name="promotionType" id="promotionType" class="form-select" aria-label="Default select example">
                                                <option selected value="0" >Choose..</option>
                                                <option  value="1">Increase Salary</option>
                                                <option  value="2">Increase Bonuses</option>
                                                <option  value="3">Promoted position</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-floating col-auto mt-4">
                                        <label for="remark">Remark</label>
                                        <textarea name="remark" class="form-control shadow-sm" id="remark" placeholder="Remark" rows="1" style="height:100px" ></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal"><i class="fas fa-download fa-sm text-white-50"></i>Close</a>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Send message</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>