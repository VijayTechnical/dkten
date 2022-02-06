<div>
    <div class="page-header">
        <h3 class="page-title"> Payment From Admin Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Payment</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Payment From Admin Table
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7"></div>
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
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Total </th>
                                    <th> Commision </th>
                                    <th> Total Due </th>
                                    <th> Paid Amount </th>
                                    <th> Payment Method </th>
                                    <th> Payment Status </th>
                                    <th> Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $payment->total_amount }}</td>
                                    <td>{{ $payment->commision_amount }}</td>
                                    <td>500</td>
                                    <td>{{ $payment->paid_amount }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->payment_status }}</td>
                                    <td>{{ $payment->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the payment?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deletePayment({{ $payment->id }})" class="btn btn-danger"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $stocks->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
</div>