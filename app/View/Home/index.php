
<script>

    $(document).ready(controls);
    $(document).bind("kendo:skinChange", controls);

    function controls() {
        createChartLine();
        createChartPie();
    }

    let arrayAttendances = <?php echo json_encode($model['chart_attendance']); ?>;
    let arrayPackages = <?php echo json_encode($model['chart_package']); ?>;

    for (let index = 0; index < arrayAttendances.length; index++) {
        arrayAttendances[index].value = arrayAttendances[index].value / arrayAttendances[index].total*100;
    }

    arrayPackages = mapping(arrayPackages);

    function createChartPie() {
        $("#chart").kendoChart({
            title: {
                position: "bottom",
                text: "Attendance Of Years"
            },
            legend: { visible: false },
            chartArea: {
                background: ""
            },
            seriesDefaults: {
                labels: {
                    visible: true,
                    background: "transparent",
                    template: "#= category #: \n #= value#%"
                }
            },
            series: [
                {
                type: "pie",
                startAngle: 150,
                data: arrayAttendances
            }],
            tooltip: {
                visible: true,
                format: "{0}%"
            }
        });
    }

    function createChartLine() {
        $("#chartLine").kendoChart({
            title: {text: "Package Monthly"},
            legend: {position: "bottom"},
            chartArea: {background: ""},
            seriesDefaults: {
                type: "line",
                style: "smooth"
            },
            series: [{
                name: arrayPackages.name,
                data: arrayPackages.data
            }],
            valueAxis: {
                labels: {
                    format: "{0}%"
                },
                line: {
                    visible: false
                },
                axisCrossingValue: -10
            },
            categoryAxis: {
                categories: arrayPackages.categories,
                majorGridLines: {
                    visible: false
                },
                labels: {
                    rotation: "auto"
                }
            },
            tooltip: {
                visible: true,
                format: "{0}%",
                template: "#= series.name #: #= value #"
            }
        });
    }

    function mapping(arr){
        let categories = [];
        let name = [];
        let data = [];
        let final = {};

        arr.forEach(element=> {
            categories.push(element.category);
            name.push(element.name);
            data.push(element.data);
        });

        final.categories = categories;
        final.name = [...new Set(name)]; 
        final.data = data;
        return final;
    }

</script>

    <main class="flex-shrink-0" >
        <div class="container shadow-2-strong" style="border-radius: 1rem;" >
            <div class="card-body p-0 text-center" style="background-color: rgba(243, 243, 243,0.3);">
                <div class="p-md-4 p-4 border rounded-3" >
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $model['title']  ?></h1>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSendReport">
                            Create Report Today
                        </button>
                    </div>
                    <div class="modal fade" id="modalSendReport" tabindex="-1" aria-labelledby="modalSendReportLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalSendReportLabel">Daily Report</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-group p-3" method="post" action="/popup/send-report">
                                    <div class="form-floating mb-3">
                                        <input name="name" type="text" class="form-control shadow-sm mb-2 rounded bg-light bg-gradient" disabled id="name" placeholder="Username">
                                        <label for="name"><?= $model['name']?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="date" type="date" class="form-control shadow-sm mb-2 rounded h-10 bg-light bg-gradient"  id="date" placeholder="Username">
                                        <label for="date">Date</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="totPackage" type="number" class="form-control shadow-sm mb-2 bg-body rounded h-10" id="totPackage" placeholder="Username">
                                        <label for="totPackage">Total Package Today</label>
                                    </div>
                                    <div class="mb-3">
                                        <select name="remarkCode" id="remarkCode" class="form-select p-3 shadow-sm mb-2 bg-body rounded h-10" aria-label="Default select example">
                                            <option selected value="0" >Choose Remark Category</option>
                                            <option  value="2">Just Info</option>
                                            <option  value="3">Tips And Trick</option>
                                            <option  value="4">Problem</option>
                                        </select>
                                    </div>
                                    <div class="form-floating">
                                        <textarea name="remark" class="form-control shadow-sm mb-2 bg-body rounded" id="remark" placeholder="Remark" rows="1" style="height:100px" ></textarea>
                                        <label for="remark">Remark</label>
                                    </div>
                                    <div class="modal-footer text-center align-items-center">
                                        <button class="w-100 btn btn-md btn-primary shadow-md" type="submit">Send Report</button>
                                        <button class="w-100 btn btn-md btn-secondary shadow-md" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2" >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center" >
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                                Attendance Today</div><hr/>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $model['clockIn']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-info text-uppercase mb-1">Sent Package Month
                                            </div><hr/>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $model['persentationPackage']?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?= $model['persentationPackage']?>%" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-warning text-uppercase mb-1">
                                                Total Package Month</div>
                                                <hr/>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $model['totalPackage'] ?? 0?> Package You Sent</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="text-xs h5 font-weight-bold text-success text-uppercase mb-1">
                                                Commission Month</div><hr/>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $model['commission']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xl-5 col-lg-4">
                            <div class="card shadow mb-4 text-align-center">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart Attendance</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                            <div class="demo-section wide">
                                                <div id="chart" style="background: center no-repeat url('../content/shared/styles/world-map.png');"></div>
                                            </div>
                                    </div>
                                    <div class="mt-2 text-center small">
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-primary"></i> Early
                                        </span>
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-success"></i> - On Time
                                        </span>
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-info"></i> - Late
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-8">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart Sent Package</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="demo-section wide">
                                            <div id="chartLine" style="background: center no-repeat url('../content/shared/styles/world-map.png');"></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center small">
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-primary"></i> History
                                        </span>
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-success"></i> -
                                        </span>
                                        <span class="mr-1">
                                            <i class="fas fa-circle text-info"></i> Package
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>