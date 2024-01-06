<div class="container">
    <!--card stats start-->
    <div id="card-stats">
        <div class="row mt-1">
            <div class="col s12 m6 l2">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">home</i>
                            <h5>Home</h5>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0"><?= $card['stat_home']; ?></h5>
                            <p class="no-margin">views</p>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col s12 m6 l2">-->
<!--                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">-->
<!--                    <div class="padding-4">-->
<!--                        <div class="col s7 m7">-->
<!--                            <i class="material-icons background-round mt-5">business</i>-->
<!--                            <h5>Aboutus</h5>-->
<!--                        </div>-->
<!--                        <div class="col s5 m5 right-align">-->
<!--                            <h5 class="mb-0">--><?//= $card['stat_aboutus']; ?><!--</h5>-->
<!--                            <p class="no-margin">views</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col s12 m6 l2">-->
<!--                <div class="card gradient-45deg-purple-amber  min-height-100 white-text">-->
<!--                    <div class="padding-4">-->
<!--                        <div class="col s7 m7">-->
<!--                            <i class="material-icons background-round mt-5">wifi_tethering</i>-->
<!--                            <h5>Telecommunication</h5>-->
<!--                        </div>-->
<!--                        <div class="col s5 m5 right-align">-->
<!--                            <h5 class="mb-0">--><?//= $card['stat_telecom']; ?><!--</h5>-->
<!--                            <p class="no-margin">views</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col s12 m6 l2">-->
<!--                <div class="card gradient-45deg-indigo-blue gradient-shadow min-height-100 white-text">-->
<!--                    <div class="padding-4">-->
<!--                        <div class="col s7 m7">-->
<!--                            <i class="material-icons background-round mt-5">camera</i>-->
<!--                            <h5>CCTV</h5>-->
<!--                        </div>-->
<!--                        <div class="col s5 m5 right-align">-->
<!--                            <h5 class="mb-0">--><?//= $card['stat_cctv']; ?><!--</h5>-->
<!--                            <p class="no-margin">views</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col s12 m6 l2">-->
<!--                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">-->
<!--                    <div class="padding-4">-->
<!--                        <div class="col s7 m7">-->
<!--                            <i class="material-icons background-round mt-5">recent_actors</i>-->
<!--                            <h5>Portfolio</h5>-->
<!--                        </div>-->
<!--                        <div class="col s5 m5 right-align">-->
<!--                            <h5 class="mb-0">--><?//= $card['stat_portfolio']; ?><!--</h5>-->
<!--                            <p class="no-margin">views</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col s12 m6 l2">-->
<!--                <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">-->
<!--                    <div class="padding-4">-->
<!--                        <div class="col s7 m7">-->
<!--                            <i class="material-icons background-round mt-5">contact_phone</i>-->
<!--                            <h5>Contactus</h5>-->
<!--                        </div>-->
<!--                        <div class="col s5 m5 right-align">-->
<!--                            <h5 class="mb-0">--><?//= $card['stat_contact']; ?><!--</h5>-->
<!--                            <p class="no-margin">views</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    <!--card stats end-->
<link rel="stylesheet" href="<?= base_url('assets/chart/Chart.min.css'); ?>" />
<script src="<?= base_url('assets/chart/Chart.min.js'); ?>"></script>
    <!--card widgets start-->
    <div id="card-widgets">
        <div class="row">
            <div class="col s12 m8 l8">
                <h5>สถิติผู้เข้าชมในแต่ละเดือน</h5>
                <div class="divider blue"></div>
                <canvas id="lineBar" height="350"></canvas>
            </div>
            <div class="col s12 m4 l4">
                <h5>สถิติผู้เข้าชมผ่านอุปกรณ์</h5>
                <div class="divider blue"></div>
                <canvas id="pieChart" width="300" height="300"></canvas>
            </div>
        </div>
    </div>
    <!--card widgets end-->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
</div>
<script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + "").replace(",", "").replace(" ", "");
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
            dec = typeof dec_point === "undefined" ? "." : dec_point,
            s = "",
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return "" + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || "").length < prec) {
            s[1] = s[1] || "";
            s[1] += new Array(prec - s[1].length + 1).join("0");
        }
        return s.join(dec);
    }
    var ctx = document.getElementById("lineBar");
    var myLineChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            datasets: [{
                label: "Views",
                lineTension: 0.3,
                backgroundColor: "rgba(0, 97, 242, 0.05)",
                borderColor: "rgba(0, 97, 242, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(0, 97, 242, 1)",
                pointBorderColor: "rgba(0, 97, 242, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
                pointHoverBorderColor: "rgba(0, 97, 242, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= $graph; ?>
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: "date"
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: "#6e707e",
                titleFontSize: 14,
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: "index",
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel =
                            chart.datasets[tooltipItem.datasetIndex].label || "";
                        return datasetLabel + ": " + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>
<script>
    window.chartColors = {
        red: 'rgb(255, 0, 0)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(50, 205, 50)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var ctxx = document.getElementById("pieChart");
    var myPieChart = new Chart(ctxx, {
        type: 'pie',
        data: {
            datasets: [{
                data: <?= $devices; ?>,
                backgroundColor: [
                    window.chartColors.green,
                    window.chartColors.red
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'PC',
                'Mobile'
            ]
        },
        options: {
            responsive: true
        }
    });

</script>