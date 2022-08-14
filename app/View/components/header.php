<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
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
                    <li><a href="/home/aboutUs" class="nav-link px-2 link-dark">About Us</a></li>
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

                    <!-- modal logout -->
                    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="logout">Logout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body text-center">
                                    <h5>Are you soure want to logout ?</h5>
                                    <hr/>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logout">
                                        Yes, Logout
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logout">
                                        Not really
                                    </button>
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <p> Si Cepat Mantap</p>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- modal advice to company -->
                    <div class="modal fade" id="advToCompany" tabindex="-1" aria-labelledby="advToCompany" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="advToCompany">Advice to Company</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">About :</label>
                                    <input name="about" type="text" class="form-control" id="recipient-name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message :</label>
                                    <textarea name="remark" class="form-control" id="message-text" required></textarea>
                                </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"  data-bs-dismiss="modal"><i
                                class="fas fa-download fa-sm text-white-50"></i>Close</a>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Send message</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- modal my profile -->
                    <div class="modal fade" id="myProfile" tabindex="-1" aria-labelledby="myProfile" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="myProfile">My Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-5 hstack gap-3">
                                            <div class="item text-center">
                                                <a href="#">
                                                    <span class="notify-badge bg-primary">Active</span>
                                                    <img id="test" class="img-fluid rounded shadow-sm mb-2" src="../assets/images/no-photo.jpg">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row col">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="name" class="col-form-label">Name : </label>
                                                    <input name="name" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="name" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="phone" class="col-form-label">Phone : </label>
                                                    <input name="phone" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="phone" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="email" class="col-form-label">Email : </label>
                                                    <input name="email" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="email" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="branch" class="col-form-label">Branch : </label>
                                                    <input name="branch" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="branch" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="departemen" class="col-form-label">Departement : </label>
                                                    <input name="departemen" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="departemen" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="team" class="col-form-label">Team : </label>
                                                    <input name="team" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="login" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="AuthAndcontract" class="col-form-label">Employee Type : </label>
                                                    <input name="AuthAndcontract" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="AuthAndcontract" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="registered" class="col-form-label">Date Registered : </label>
                                                    <input name="registered" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="registered" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p> Si Cepat Mantap</p>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </header>