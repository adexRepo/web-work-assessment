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
                <p>"Selamat pagi. Semoga hari ini membawa kegembiraan dari harapan kemarin."
                <p>
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
                <form method="post" action="/popup/advice">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Title :</label>
                        <input name="title" type="text" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message :</label>
                        <textarea name="message" class="form-control" id="message-text" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal"><i class="fas fa-download fa-sm text-white-50"></i>Close</a>
                        <button class="btn btn-md btn-primary shadow-md" type="submit">Yes, Send Advice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal advice to company -->
<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settings" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settings">Settings Rule Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-group p-2" method="post" action="/popup/set-benefit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="ruleId" class="col-form-label">Rule ID :</label>
                            <input name="ruleId" placeholder="RID001"type="text" maxlength="10" class="form-control" id="ruleId" required>
                        </div>
                        <div class="col">
                            <label for="contract" class="col-form-label">Contract :</label>
                            <select name="contract" id="contract" required class="form-select" aria-label="Default select example">
                                <option selected value="0" disabled>Choose..</option>
                                <option  value="1">Contract Worker</option>
                                <option  value="2">Loyalty Worker</option>
                                <option  value="3">Permanent Worker</option>
                                <option  value="4">Not Yet Decide</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="departement" class="col-form-label">Department Name :</label>
                            <select name="departement" id="departement" required class="form-select" aria-label="Default select example">
                                <option selected value="0" disabled>Choose..</option>
                                <option  value="1">Koordinator Wilayah</option>
                                <option  value="2">Koordinator</option>
                                <option  value="3">Driver</option>
                                <option  value="4">Kurrir</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="principalSalary" class="col-form-label">Salary :</label>
                            <input name="principalSalary" required type="number" class="form-control" id="principalSalary" required>
                        </div>
                        <div class="col">
                            <label for="targetOfDay" class="col-form-label">Target Of Day :</label>
                            <input name="targetOfDay" placeholder="count sent / month" type="number" class="form-control" id="targetOfDay" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="interestSalary" class="col-form-label">Bonuses :</label>
                            <input name="interestSalary" type="number" class="form-control" id="interestSalary">
                        </div>
                        <div class="col">
                            <label for="promotionType" class="col-form-label">Promotion Type :</label>
                            <select name="promotionType" id="promotionType" class="form-select" aria-label="Default select example">
                                <option selected value="0">Choose..</option>
                                <option  value="1">Increase Salary</option>
                                <option  value="2">Increase Bonuses</option>
                                <option  value="3">Promoted Position</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="promotionStandart" class="col-form-label">Promotion Standart :</label>
                            <input name="promotionStandart" placeholder="(day)" type="number" class="form-control" id="promotionStandart">
                        </div>
                    </div>
                    <div class="form-floating">
                        <div class="mb-3">
                            <label for="remark" class="col-form-label">Remark :</label>
                            <textarea name="remark" class="form-control" id="remark"  style="height:100px" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal"><i class="fas fa-download fa-sm text-white-50"></i>Close</a>
                    <button class="btn btn-md btn-primary shadow-md" type="submit">Yes, Send Advice</button>
                </div>
            </form>
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
                            <form method="post" action="/popup/update-profile">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name" class="col-form-label">Name : </label>
                                        <input name="name" type="text" value="<?= $model['user_info']['name']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phone" class="col-form-label">Phone : </label>
                                        <input name="phone" type="text" value="<?= $model['user_info']['phone']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="phone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="email" class="col-form-label">Email : </label>
                                        <input name="email" type="text" value="<?= $model['user_info']['email']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="email">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="AuthAndcontract" class="col-form-label">Employee Type : </label>
                                        <input name="AuthAndcontract" type="text" value="<?= $model['user_info']['contract']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="AuthAndcontract" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="departemen" class="col-form-label">Departement : </label>
                                        <select name="departemen" selec=3 id="departemen" disabled class="form-select shadow-sm mb-2 rounded bg-light bg-gradient" aria-label="Default select example">
                                            <?php $dept = $model['user_info']['departement'] ?>
                                            <option <?php if($dept == "") {echo "selected='selected'";}else{echo"";}; ?>  value="0">Choose Remark Category</option>
                                            <option <?php if($dept == "1"){echo "selected='selected'";}else{echo"";}; ?> value="1">Koordinator Wilayah</option>
                                            <option <?php if($dept == "2"){echo "selected='selected'";}else{echo"";}; ?> value="2">Koordinator</option>
                                            <option <?php if($dept == "3"){echo "selected='selected'";}else{echo"";}; ?> value="3">Driver</option>
                                            <option <?php if($dept == "4"){echo "selected='selected'";}else{echo"";}; ?> value="4">Kurrir</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="branch" class="col-form-label">Branch : </label>
                                        <select name="branch" id="branch" disabled class="form-select shadow-sm mb-2 rounded bg-light bg-gradient" aria-label="Default select example">
                                            <option selected value="0">Choose Remark Category</option>
                                            <?php
                                                $codeId = "BRANCH";
                                                foreach ($code as $keys => $item) {
                                                    if ($item['type'] == $codeId) {
                                                        if($item['code'] == $model['user_info']['branchId']){
                                                            echo "<option selected value=\"$item[code]\">$item[value]</option>";
                                                            continue;
                                                        }
                                                        echo "<option  value=\"$item[code]\">$item[value]</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="registered" class="col-form-label">Date Registered : </label>
                                        <input name="registered" type="text" value="<?= $model['user_info']['dateRegist']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="registered" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="updated" class="col-form-label">Date Updated : </label>
                                        <input name="updated" type="text" value="<?= $model['user_info']['dateUpdated']  ?>" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" id="registered" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-md btn-primary shadow-md" type="submit">Update Information</button>
                                    <button class="btn btn-md btn-secondary shadow-md" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>