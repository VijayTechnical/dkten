<div>
    <div class="page-header">
        <h3 class="page-title"> Language Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Language</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Language Table
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
                                    <div class="col-lg-5">
                                        <select name="field" id="field" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="field">
                                            <option value="category">Category</option>
                                            <option value="sub_category">Sub Category</option>
                                            <option value="type">Type</option>
                                            <option value="sub_type">Sub Type</option>
                                            <option value="vendor_category">Vendor Category</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5">
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Nepali</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->nepali_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.language.edit',['field'=>$field,'id'=>$data->id]) }}" class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $datas->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>