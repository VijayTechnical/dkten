<div>
    <footer class="footer1">
        <div class="footer1-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 class="footer-title">Recognize Us</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="{{ route('about') }}">About Dkten</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('career') }}">Careers</a></li>
                                    <li><a href="{{ route('mission') }}">Mission &amp; Vision</a></li>
                                    <li><a href="{{ route('legal') }}">Legal Information</a></li>
                                    <li><a href="{{ route('term') }}">Terms of Use</a></li>
                                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 class="footer-title">Earn With Us</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="{{ route('vendor.dashboard') }}">Sell On Dkten</a></li>
                                    <li><a href="{{ route('travel') }}">Travel &amp; Tours</a></li>
                                    <li><a href="{{ route('easy_eservice') }}">Easy E-Service</a></li>
                                    <li><a href="{{ route('employee_aid') }}">Employee Aid</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget mb-40 ">
                            <h3 class="footer-title">We Support You</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="{{ route('faq') }}}">FAQ</a></li>
                                    <li><a href="{{ route('shipping') }}">Shipping</a></li>
                                    <li><a href="{{ route('return') }}">Return, Cancellation &amp; Refund</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget mb-40 ">
                            <h3 class="footer-title">We Are Available On</h3>
                            <div class="downloadappimages">
                                <div class="app-footer">
                                    <img src="https://cdn.sastodeal.com/logo/default/Sastodeal_App_on_Playstore.png">
                                    <img src="https://cdn.sastodeal.com/logo/default/Sastodeal_App_on_ios_store.png">
                                    <img src="https://dkten.com/uploads/qrcode_www.dkten.com.png">
                                </div>

                                <div class="qr-code">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="border-top: 1px solid #ccc;">
                <div class="row  foot-bar" style="padding-bottom:15px;">
                    @if ($gsetting)
                    <div class="col-md-2  new-address-section">
                        <p><i class="fas fa-map-marker-alt"></i> <b>Head Office: </b>{{ $gsetting->head_office }}</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5 new-address-section">
                                <p><i class="fas fa-map-marker-alt"></i> <b>Corporate Office:</b> {{ $gsetting->corporate_office }}</p>
                            </div>
                            <div class="col-md-5 new-address-section">
                                <p><i class="fas fa-map-marker-alt"></i> <b>Hub center:</b> {{ $gsetting->hub_center }}
                            </div>
                            <div class="col-md-2 new-address-section">
                                <p><i class="fas fa-envelope"></i> {{ $gsetting->email }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-2 ">
                        <div class="new-address-section mg-tp-20-ftr">
                            <span class="fin-us-footer-title"><b>Find us on: </b></span>
                            @if($ssetting)
                            <a href="{{ $ssetting->facebook }}" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="{{ $ssetting->instagram }}" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="{{ $ssetting->youtube }}" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            <!-- <a href="https://www.tiktok.com/@dkten0?" target="_blank"><img src="http://demo.dkten.com/assets/images/tik-tok.svg" class="fa fa-tiktok"></a> -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>