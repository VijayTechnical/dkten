<div>
    <div class="page-header">
        <h3 class="page-title"> Shipping Area Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping Area</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Shipping Area Table
                        <a href="{{ route('admin.shipping.area.add') }}"
                            class="btn btn-light create-new-button float-right">+ Add Area</a>
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
                                    <th> Name </th>
                                    <th> Region </th>
                                    <th> City </th>
                                    <th> Shipping Cost </th>
                                    <th> Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $key => $area)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->Region->name }}</td>
                                    <td>{{ $area->City->name }}</td>
                                    <td>{{ $area->shipping_cost }}</td>
                                    <td>{{ $area->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.shipping.area.edit', ['area_id' => $area->id]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the area?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteArea({{ $area->id }})" class="btn btn-danger"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $areas->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>