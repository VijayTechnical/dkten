<div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                @php
                                $total_user = DB::table('users')->count();
                                @endphp
                                <p class="mb-0">
                                    {{ $total_user }}
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-account icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Customers</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                @php
                                $total_vendor = DB::table('vendors')->where('status',true)->count();
                                @endphp
                                <p class="mb-0">{{ $total_vendor }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-account icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Vendors</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <p class="mb-0">NRP. {{ $daily_sale }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-currency-usd icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Today Sales</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <p class="mb-0">NRP. {{ $total_sale }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-currency-usd icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Sales</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div
                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Esewa</h6>
                        </div>
                        <div
                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">NRP.{{ $transaction_data_esewa }}</h6>
                        </div>
                    </div>
                    <div
                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Khalti</h6>
                        </div>
                        <div
                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">NRP.{{ $transaction_data_khalti }}</h6>
                        </div>
                    </div>
                    <div
                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Cash</h6>
                        </div>
                        <div
                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">NRP.{{ $transaction_data_cash }}</h6>
                        </div>
                    </div>
                    <div
                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Imepay</h6>
                        </div>
                        <div
                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">NRP.{{ $transaction_data_imepay }}</h6>
                        </div>
                    </div>
                    <div
                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Tranfer to Wallet</h6>
                        </div>
                        <div
                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">NRP.{{ $transaction_data_wallet }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Weekly Sale Report</h4>
                    <canvas id="lineChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        var date = @this.get('graph_date');
        var sale = @this.get('graph_sale');
        console.log(sale);
               var data = {
                labels: date,
                datasets: [{
                label: '# of Votes',
                data: sale,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
                }]
            };
            var options = {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                },
                gridLines: {
                color: "rgba(204, 204, 204,0.1)"
                }
            }],
            xAxes: [{
                gridLines: {
                color: "rgba(204, 204, 204,0.1)"
                }
            }]
            },
            legend: {
            display: false
            },
            elements: {
            point: {
                radius: 0
            }
            }
        };
        if ($("#lineChart").length) {
            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: data,
            options: options
            });
         }
});
</script>
<script>
    $(function() {
    if ($("#transaction-history").length) {
        wallet = @this.get('transaction_data_wallet');
        esewa = @this.get('transaction_data_esewa');
        khalti = @this.get('transaction_data_khalti');
        imepay = @this.get('transaction_data_imepay');
        cash = @this.get('transaction_data_cash');
      var areaData = {
        labels: ["Wallet", "Esewa","Khalti","Ime Pay","Cash"],
        datasets: [{
            data: [wallet, esewa,khalti,imepay, cash],
            backgroundColor: [
              "#17E7E7","#30E717","#7B17E7","#E71717","#ffab00",
            ]
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        segmentShowStroke: false,
        cutoutPercentage: 70,
        elements: {
          arc: {
              borderWidth: 0
          }
        },      
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        }
      }
      var transactionhistoryChartPlugins = {
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;
      
          ctx.restore();
          var fontSize = 1;
          ctx.font = fontSize + "rem sans-serif";
          ctx.textAlign = 'left';
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#ffffff";
      
          var text = "$1200", 
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2.4;
      
          ctx.fillText(text, textX, textY);

          ctx.restore();
          var fontSize = 0.75;
          ctx.font = fontSize + "rem sans-serif";
          ctx.textAlign = 'left';
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#6c7293";

          var texts = "Total", 
              textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
              textsY = height / 1.7;
      
          ctx.fillText(texts, textsX, textsY);
          ctx.save();
        }
      }
      var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
      var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
        type: 'doughnut',
        data: areaData,
        options: areaOptions,
        plugins: transactionhistoryChartPlugins
      });
    }
});
</script>
@endpush