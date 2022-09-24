 <?php
    $rule = $model['rule'];
    $ruleId = $rule->getRuleId();
    $promotionTargetDay = $rule->getPromotionStandart();
    $promotionType = $rule->getPromotionType();
    $targetIntDay = $rule->getTargetOfDay();
    $interestAmt = $rule->getInterestSalary();
    $average = $model['average'];
    $summary = $model['summary'];

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }

    function month($data){
        $monthNum  = $data;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        return $monthName;
    }
 ?>
 
 <main class="flex-shrink-0">
        <div class="container shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-0 text-center">
                <div class="p-md-4 p-4 border rounded-3">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?= $model['title']  ?></h1>
                    </div>
                    <div class="col-xl mb-2">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-lg-12">
                                        <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                            Benefit Employe Si Cepat</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                                Promotion</div><hr/>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800 text-center">
                                                If you consistently sent package more than <?= $targetIntDay ?> packages in one day
                                                until <?= $promotionTargetDay ?>  days, you will be promoted 
                                                <span class="text-primary"><?= $promotionType ?> </span> Next month!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                                Bonuses</div><hr/>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800 text-center">
                                                If you sent <?= $targetIntDay ?> package in one day you will get bonus
                                                <span class="text-primary"><?= rupiah($interestAmt) ?></span> this month
                                            </div>                                       
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                                Average Sent Today</div><hr/>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800 text-center ">
                                                <span class="text-primary" style="font-size: 30px"><?= $average ?> packages  sent</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <h3>Summary</h3>
                    <div class="d-sm-flex section" style="border-radius: 1rem; overflow-y: scroll; max-height: 300px;">
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead>
                              <tr>
                                <th class="table-primary align-middle" scope="col">No</th>
                                <th class="table-primary align-middle" scope="col">Month</th>
                                <th class="table-primary align-middle" scope="col">Name</th>
                                <th class="table-primary align-middle" scope="col">Package You Sent</th>
                                <th class="table-primary align-middle" scope="col">Average Sent all</th>
                                <th class="table-primary align-middle" scope="col">Package You Sent / Average Sent</th>
                                <th class="table-primary align-middle" scope="col">Total Attendance</th>
                                <th class="table-primary align-middle" scope="col">Result</th> <!-- Bonus or Promotion -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($summary as $index => $item): ?>
                                <tr>
                                    <th scope="row"><?= $index+1?></th>
                                    <td><?= month($item['months']) ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['tot_package'] ?></td>
                                    <td><?= $item['average_sent'] ?></td>
                                    <td><?= $item['percent_sent']?>%</td>
                                    <td><?= $item['tot_login'] ?></td>
                                    <td><?= rupiah($item['bonus']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </main>