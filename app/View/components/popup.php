<style>
    .item {
        position: relative;
        padding-top: 20px;
        display: inline-block;
    }

    .notify-badge {
        position: absolute;
        right: -20px;
        top: 10px;
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: white;
        padding: 5px 10px;
        font-size: 20px;
    }
</style>

<div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="attendance" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attendance">Attendance Before Work!</h5>
            </div>
            <div class="modal-body text-center p-3">
                <p>"Selamat pagi. Semoga hari ini membawa kegembiraan dari harapan kemarin."<p>
                <a href="/popup/clockin" class="d-none d-sm-inline-block btn btn-xl btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Clock In</a>
                <a href="/users/logout" class="d-none d-sm-inline-block btn btn-xl btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Logout</a>
            </div>
        </div>
    </div>
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
                    <hr />
                    <a href="/users/logout" class="btn btn-danger" role="button" style="color:white">Yes, Logout</a>
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
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal"><i class="fas fa-download fa-sm text-white-50"></i>Close</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Send message</a>
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
                                    <img id="test" class="img-fluid rounded shadow-sm mb-2" src="https://raw.githubusercontent.com/adexRepo/web-work-assessment/302abd261f4fb5694066d3345c357319eee0fee8/app/View/assets/images/no-photo.jpg">
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