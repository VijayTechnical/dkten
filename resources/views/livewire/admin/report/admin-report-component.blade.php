<div>
    <div class="page-header">
        <h3 class="page-title"> Stock Report </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stock Report</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control"
                                    wire:model="category_id">
                                    <option value="0" data-hidden="true">Please select category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control"
                                    wire:model="sub_category_id">
                                    <option value="0" data-hidden="true">Please select sub category
                                    </option>
                                    @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control"
                                    wire:model.defer="product_id">
                                    <option value="0" data-hidden="true">Please select product
                                    </option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn-lg btn-primary mt-3" wire:click.prevent="$emitSelf('setStatus')"
                                type="button">Get
                                Report</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Stock Report Chart</h4>
                            <canvas id="lineChart" style="height:200px;width:80%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        window.addEventListener('name-updated', event => {
        var date = @this.get('graph_date');
        var quantity = @this.get('graph_quantity');
        console.log(date);
               var data = {
                labels: date,
                datasets: [{
                label: '# of Votes',
                data: quantity,
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
});
</script>
@endpush