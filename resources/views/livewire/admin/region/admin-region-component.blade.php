<div>
    <div class="page-header">
        <h3 class="page-title"> Shipping Region Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping Region</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Shipping Region Table 
                        <a href="{{ route('admin.shipping.region.add') }}"
                        class="btn btn-light create-new-button float-right">+ Add Region</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $key => $region)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $region->name }}</td>
                                    <td>{{ $region->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.shipping.region.edit', ['region_id' => $region->id]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the region?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteRegion({{ $region->id }})"
                                            class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>