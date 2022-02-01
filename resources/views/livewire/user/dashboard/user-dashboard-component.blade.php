<div>
    <section class="page-section">
        <div class="wrap container">
            <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div class="information-title" style="margin-bottom: 0px;">Profile Information</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
                                    <div class="media">
                                        <a class="pull-left media-link" href="#" style="height: 124px;">
                                            @if ($image)
                                            <div class="media-object img-bg" id="blah"
                                                style="background-image: url({{ $image->temporaryUrl() }}); background-size: cover;background-position-x: center; background-position-y: top; width: 100px; height: 124px;">
                                            </div>
                                            @elseif(Auth::guard('web')->user()->image)
                                            <div class="media-object img-bg" id="blah"
                                                style="background-image: url({{ asset('/storage/user') }}/{{ Auth::guard('web')->user()->image }}); background-size: cover;background-position-x: center; background-position-y: top; width: 100px; height: 124px;">
                                            </div>
                                            @else
                                            <div class="media-object img-bg" id="blah"
                                                style="background-image: url('https://www.w3schools.com/howto/img_avatar.png'); background-size: cover;background-position-x: center; background-position-y: top; width: 100px; height: 124px;">
                                            </div>
                                            @endif
                                            <form action="#" id="avatarForm" wire:submit.prevent="setImage()" enctype="multipart/form-data"
                                                accept-charset="utf-8" style="background: #666;">
                                                <span id="inppic" class="set_image">
                                                    <label class="" for="imgInp">
                                                        <span><i class="fa fa-pencil"
                                                                style="cursor: pointer; color:#fff;"></i></span>
                                                    </label>
                                                    <input type="file" style="display:none;" id="imgInp" name="img" wire:model="image">
                                                </span>
                                                <span id="savepic" style="display:none;">
                                                    <button type="submit" class="signup_btn">
                                                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>
                                                    </button>
                                                </span>
                                            </form>
                                        </a>
                                        <div class="media-body" style="padding-right: 20px">
                                            <table class="table table-condensed"
                                                style="font-size: 14px; margin-bottom: 0px">
                                                <tbody>
                                                    <tr>
                                                        <td><b>First Name</b></td>
                                                        <td align="left">{{ Auth::guard('web')->user()->first_name }}
                                                        </td>
                                                        <td><b>Last Name</b></td>
                                                        <td>{{ Auth::guard('web')->user()->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td>{{ Auth::guard('web')->user()->email }}</td>
                                                        <td><b>Contact No</b></td>
                                                        <td>{{ Auth::guard('web')->user()->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Address</b></td>
                                                        <td> {{ Auth::guard('web')->user()->line1 }},{{
                                                            Auth::guard('web')->user()->line2 }} </td>
                                                        <td><b>Country</b></td>
                                                        <td>{{ Auth::guard('web')->user()->country }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>State</b></td>
                                                        <td>{{ Auth::guard('web')->user()->state }}</td>
                                                        <td><b>City</b></td>
                                                        <td>{{ Auth::guard('web')->user()->city }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        @php
                                        $orders =
                                        DB::table('orders')->where('user_id',Auth::guard('web')->user()->id)->get();
                                        $total_purchase = $orders->sum('total');
                                        $week_date = \Carbon\Carbon::today()->subDays(7);
                                        $lastweekPurchase = $orders->where('created_at','>=',$week_date)->sum('total');
                                        $month_date = \Carbon\Carbon::today()->subDays(30);
                                        $lastmonthPurchase =
                                        $orders->where('created_at','>=',$month_date)->sum('total');
                                        @endphp
                                        <h3 class="block-title"><span>Purchase Summary</span></h3>
                                        <div class="widget widget-categories" style="padding-bottom:25px">
                                            <ul class="profile_ul">
                                                <li><a href="#">Total Purchase: <b>NPR.{{ $total_purchase }}</b></a>
                                                </li>
                                                <li><a href="#">Last 7 Days: <b>NPR.{{ $lastweekPurchase }}</b></a></li>
                                                <li><a href="#">Last 30 Days: <b>NPR.{{ $lastmonthPurchase }}</b></a>
                                                </li>
                                                <li><a href="#">Total Wallet Balance: <b>NPR.{{ Auth::guard('web')->user()->balance }}</b></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="block-title"><span>Others Info</span></h3>
                                        <div class="widget widget-categories" style="padding-bottom:25px">
                                            <ul class="profile_ul">
                                                <li><a href="#">Wished Products: <b>
                                                            @if (Cart::instance('wishlist')->count() > 0){{
                                                            Cart::instance('wishlist')->count() }}
                                                            @else
                                                            0
                                                            @endif
                                                        </b></a></li>
                                                <li><a href="#">User Since: <b>{{
                                                            \Carbon\Carbon::parse(Auth::guard('web')->user()->created_at)->format('d/m/Y')}}</b></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>
</div>
@push('scripts')
<script type="text/javascript">
    window.addEventListener('uploadImage', function(event) {
        @this.setImage();
    });
</script>
@endpush