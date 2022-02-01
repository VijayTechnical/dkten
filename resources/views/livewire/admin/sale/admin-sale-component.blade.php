<div>
    <div class="page-header">
        <h3 class="page-title"> Sales </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Table
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of sales"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Search here...." class="form-control"
                                            wire:model="searchTerm">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>T_Mode</th>
                                    <th>T_Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $key => $sale)
                                @if($sale->Transaction)
                                <tr>
                                    <td>{{ $sale->sale_code }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/user') }}/{{ $sale->User->image }}"
                                            alt="{{ $sale->User->first_name }}" />
                                        <span class="pl-2">{{ $sale->user->first_name }}</span>
                                    </td>
                                    <td>
                                        @if ($sale->status == 'ordered')
                                        <div class="badge badge-outline-warning"> {{ $sale->status }}</div>
                                        @elseif($sale->status == 'delivered')
                                        <div class="badge badge-outline-success"> {{ $sale->status }}</div>
                                        @else
                                        <div class="badge badge-outline-danger"> {{ $sale->status }}</div>
                                        @endif
                                    </td>
                                    <td>Rs. {{ number_format($sale->total) }}</td>
                                    <td>{{ $sale->Transaction->PaymentMode->name }}</td>
                                    <td>
                                        @if ($sale->Transaction->status == 'pending')
                                        <div class="badge badge-outline-warning">
                                            {{ $sale->Transaction->status }}</div>
                                        @elseif($sale->Transaction->status == 'approved')
                                        <div class="badge badge-outline-success">
                                            {{ $sale->Transaction->status }}</div>
                                        @elseif($sale->Transaction->status == 'declined')
                                        <div class="badge badge-outline-danger">
                                            {{ $sale->Transaction->status }}</div>
                                        @else
                                        <div class="badge badge-outline-primary">
                                            {{ $sale->Transaction->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $sale->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.sale.show', ['sale_id' => $sale->id]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                                        @if ($sale->status === 'ordered')
                                        <a href="#"
                                            onclick="confirm('Are you sure you has delivered the order?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="statusUpdate({{ $sale->id }},'delivered')"
                                            class="btn btn-success"><i
                                                class="mdi mdi-checkbox-marked-circle-outline"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to cancel the order?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="statusUpdate({{ $sale->id }},'cancelled')"
                                            class="btn btn-danger"><i class="mdi mdi-window-close"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $sales->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>