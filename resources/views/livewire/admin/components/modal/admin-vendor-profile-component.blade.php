<div>
    @if($vendor)
    <div wire:ignore.self class="modal fade" id="vendorView" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:700px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $vendor->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <style>
                    ul {
                        list-style: none;
                    }

                    li {
                        text-decoration: none;
                    }
                </style>
                <div class="modal-body">
                    <div class="row align-items-stretch">
                        <div class="col-md-6" style="left: 0;">
                            <ul>
                                <li><p>Cover Image : <img src="{{ asset('/storage/vendor/cover_image') }}/{{ $vendor->cover_image }}" alt="{{ $vendor->name }}" class="img-fluid rounded" style="height: 40px;width:40px;"></p></li>
                                <li><p>Logo : <img src="{{ asset('/storage/vendor/logo') }}/{{ $vendor->logo }}" alt="{{ $vendor->name }}" class="img-fluid rounded" style="height: 40px;width:40px;"></p></li>
                                <li><p>Type : {{ $vendor->Type->name }}</p></li>
                                @if($vendor->Type->slug === 'shopping-mall')
                                <li><p>Sub Category : {{ $vendor->Mall->name }}</p></li>
                                @elseif ($vendor->type->slug === 'eservice')
                                <li><p>Sub Category : {{ $vendor->Eservice->name }}</p></li>
                                @else
                                <li><p>Sub Category : {{ $vendor->Gvendor->name }}</p></li>
                                @endif
                                <li><p>Name : {{ $vendor->name }}</p></li>
                                <li><p>Display Name : {{ $vendor->display_name }}</p></li>
                                <li><p>Email : {{ $vendor->email }}</p></li>
                                <li><p>Company : {{ $vendor->company }}</p></li>
                            </ul>
                        </div>
                        <div class="col-md-6" style="left: 0;">
                            <ul>
                                <li><p>Address line 1 : {{ $vendor->line1 }}</p></li>
                                <li><p>Address line 2 : {{ $vendor->line2 }}</p></li>
                                <li><p>City : {{ $vendor->city }}</p></li>
                                <li><p>State : {{ $vendor->state }}</p></li>
                                <li><p>Country : {{ $vendor->country }}</p></li>
                                <li><p>Zip : {{ $vendor->zip }}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($customer)
    <div wire:ignore.self class="modal fade" id="customerView" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:700px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $customer->first_name }} {{ $customer->last_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <style>
                    ul {
                        list-style: none;
                    }

                    li {
                        text-decoration: none;
                    }
                </style>
                <div class="modal-body">
                    <div class="row align-items-stretch">
                        <div class="col-md-6" style="left: 0;">
                            <ul>
                                <li><p>Profile Image : <img src="{{ asset('/storage/user') }}/{{ $customer->image }}" alt="{{ $customer->first_name }}" class="img-fluid rounded" style="height: 40px;width:40px;"></p></li>
                                <li><p>Wallet Balance : {{ $customer->balance }}</p></li>
                                <li><p>First Name : {{ $customer->first_name }}</p></li>
                                <li><p>Last Name : {{ $customer->last_name }}</p></li>
                                <li><p>Email : {{ $customer->email }}</p></li>
                            </ul>
                        </div>
                        <div class="col-md-6" style="left: 0;">
                            <ul>
                                <li><p>Address line 1 : {{ $customer->line1 }}</p></li>
                                <li><p>Address line 2 : {{ $customer->line2 }}</p></li>
                                <li><p>City : {{ $customer->city }}</p></li>
                                <li><p>State : {{ $customer->state }}</p></li>
                                <li><p>Country : {{ $customer->country }}</p></li>
                                <li><p>Zip : {{ $customer->zip }}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>