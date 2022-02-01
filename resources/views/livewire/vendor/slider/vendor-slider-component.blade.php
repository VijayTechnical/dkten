<div>
    <div class="page-header">
        <h3 class="page-title"> Vendor Slider Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor Slider</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Vendor Slider Table
                        <a href="{{ route('vendor.slider.add') }}"
                            class="btn btn-light create-new-button float-right">+ Add Slider</a>
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
                                        <input type="text" placeholder="Search here...." class="form-control">
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
                                    <th> Image </th>
                                    <th> Button </th>
                                    <th> Added By </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vslides as $key => $vslide)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="py-1">
                                        <img src="{{ asset('/storage/vendor/slider/banner_image') }}/{{ $vslide->banner_image }}"
                                            alt="{{ $vslide->title }}" />
                                    </td>
                                    <td><a href="{{ $vslide->link }}" class="btn"
                                            style="background-color:{{ $vslide->button_color }};color:{{ $vslide->text_color }};">{{
                                            $vslide->text }}</a></td>
                                    <td>{{ $vslide->Vendor->name }}</td>
                                    <td>
                                        <label class="badge badge-{{ $vslide->status ? 'success' : 'danger' }}">{{
                                            $vslide->status ? 'Yes' : 'No' }}</label>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('vendor.slider.edit',['slider_id'=>$vslide->id]) }}"><i
                                                class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#" class="btn btn-{{ $vslide->status ? 'warning' : 'success'
                                                }}"
                                            onclick="confirm('Are you sure you want to change the slider status?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="changeStatus({{ $vslide->id }})"><i class="mdi mdi-{{
                                                            $vslide->status ? 'minus-circle' : 'check' }}"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete vendor slide?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteVslide({{ $vslide->id }})"
                                            class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $vslides->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>