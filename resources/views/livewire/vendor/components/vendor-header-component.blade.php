<div>
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            @if($logo)
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
                    src="{{ asset('/storage/logo') }}/{{ $logo->mobile_logo }}" style="width:400px;" alt="logo" /></a>
            @endif
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control" placeholder="Search products">
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-none d-lg-block">
                    {{-- <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="{{ route('vendor.product.add') }}">+ Create New Product</a> --}}
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-view-grid"></i>
                    </a>
                </li>
                {{-- <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email"></i>
                        <span class="count bg-success" style="height: 15px;width:15px;">
                            <p style="font-size: 10px;font-weight:700;">{{ $contacts->count() }}</p>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Messages</h6>
                        @if ($contacts->count() > 0)
                            <div class="dropdown-divider"></div>
                            @foreach ($contacts as $key => $contact)
                                @if ($key < 3)
                                    <a class="dropdown-item preview-item" href="{{ route('admin.contact') }}">
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">{{ $contact->name }}
                                                send you a message</p>
                                            <p class="text-muted mb-0">
                                                {{ $contact->created_at->diffForHumans() }} </p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">{{ $contacts->count() }} new messages</p>
                        @else
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">No new messages</p>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                        data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count bg-danger" style="height: 15px;width:15px;"><p style="font-size: 10px;font-weight:700;">{{ $notifications->count() }}</p></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="notificationDropdown">
                        @if ($notifications->count() > 0)
                            @foreach ($notifications as $notification)
                                @if ($notification->type == 'App\Notifications\SubscriberNotification')
                                    <a href="{{ route('admin.notification') }}"
                                        class="dropdown-item message d-flex align-items-center">
                                        <div class="content">
                                            <strong
                                                class="d-block">{{ Illuminate\Support\Str::limit($notification->data['email'], 15) }}</strong>
                                            <span class="d-block">Subscribed to newsletter</span>
                                            <small class="date d-block">{{ $notification->data['created_at'] }}</small>
                                        </div>
                                    </a>
                                @elseif ($notification->type == 'App\Notifications\OrderNotification')
                                    <a href="{{ route('admin.notification') }}"
                                        class="dropdown-item message d-flex align-items-center">
                                        <div class="content">
                                            <strong class="d-block">{{ $notification->data['name'] }}</strong>
                                            <span
                                                class="d-block">{{ $notification->data['name'] }} has ordered item through {{ $notification->data['method'] }}</span>
                                            <small class="date d-block">{{ $notification->data['created_at'] }}</small>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            <a href="{{ route('admin.notification') }}" class="dropdown-item text-center message">
                                <strong>See All Notifications <i class="fa fa-angle-right"></i></strong>
                            </a>
                        @else
                            <p class="text-danger text-center mt-5">No new notifications</p>
                        @endif
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle"
                                src="{{ '/storage/vendor/cover_image' }}/{{ Auth::guard('vendor')->user()->cover_image }}" alt="{{ Auth::guard('vendor')->user()->name }}">
                            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::guard('vendor')->user()->name }}
                            </p>
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Vendor</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="{{ route('vendor.setting') }}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="{{ route('vendor.profile') }}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-account text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Profile</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="{{ route('vendor.profile') }}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="#" wire:click.prevent="Logout()">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Log out</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">Advanced settings</p>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>
</div>
