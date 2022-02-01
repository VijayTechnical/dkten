<div>
    <ul class="pleft_nav">
        <a class="pnav_info" href="{{ route('user.dashboard') }}">
            <li class="">Profile</li>
        </a>
        <a style="display: none" class="pnav_affiliation_point_earnings" href="#">
            <li>Affiliation Point Earnings</li>
        </a>
        <a class="pnav_wishlist" href="{{ route('user.wishlist') }}">
            <li class="">Wishlist</li>
        </a>
        <a class="pnav_coupon" href="{{ route('user.coupon') }}">
            <li class="">Coupon</li>
        </a>

        <a class="pnav_order_history " href="{{ route('user.order') }}">
            <li class="">Order History</li>
        </a>

        <a class="pnav_downloads " href="#">
            <li class="">Downloads</li>
        </a>

        <a class="pnav_downloads " href="{{ route('user.load.wallet') }}">
            <li class="">Load Wallet</li>
        </a>


        <a class="pnav_update_profile" href="{{ route('user.profile.edit') }}">
            <li class="active">Edit Profile</li>

        </a><a class="pnav_ticket" href="{{ route('user.support.admin') }}">
            <li class="">Support Ticket To Admin</li>
        </a>


        <a class="pnav_message_to_vendor" href="{{ route('user.support.vendor') }}">
            <li class="">Support Ticket To Vendor</li>
        </a>
    </ul>
</div>