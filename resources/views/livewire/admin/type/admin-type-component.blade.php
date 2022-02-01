<div>
    <div class="page-header">
        <h3 class="page-title"> Type Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Type</li>
            </ol>
        </nav>
    </div>
    <style>
        .list-star li {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }

        .slink i {
            font-size: 16px;
            margin-left: 12px;

        }
    </style>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">type Table
                        <a href="{{ route('admin.type.add') }}" class="btn btn-light create-new-button float-right">+
                            Add type</a>
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
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Sub Types</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $key => $type)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="py-1">
                                        <img src="{{ asset('/storage/type') }}/{{ $type->image }}"
                                            alt="{{ $type->name }}" />
                                    </td>
                                    <td>
                                        {{ $type->name }}
                                    </td>
                                    <td>
                                        <label class="badge badge-{{ $type->status ? 'success' : 'danger' }}">{{
                                            $type->status ? 'Approved' : 'Pending' }}</label>
                                    </td>
                                    <td>
                                        <ul class="list-star">
                                            @foreach ($type->SubType as $sub_type)
                                            <li class="sub-type">
                                                {{ $sub_type->name }}
                                                <a class="slink"
                                                    href="{{ route('admin.type.edit', ['type_slug' => $type->slug, 'sub_type_slug' => $sub_type->slug]) }}"><i
                                                        class="mdi mdi-briefcase-edit"></i>
                                                </a>
                                                <a class="slink" href="#"
                                                    onclick="confirm('Are you sure you want to delete the subtype?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent="deleteSubtype({{ $sub_type->id }})"><i
                                                        class="mdi mdi-delete"></i>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $type->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.type.edit', ['type_slug' => $type->slug]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#" class="btn btn-{{ $type->status ? 'warning' : 'success'
                                                }}"
                                            onclick="confirm('Are you sure you want to change the type status?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="changeStatus({{ $type->id }})"><i class="mdi mdi-{{
                                                            $type->status ? 'minus-circle' : 'check' }}"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the type?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteType({{ $type->id }})" class="btn btn-danger"><i
                                                class="mdi mdi-delete"></i></a>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $types->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>