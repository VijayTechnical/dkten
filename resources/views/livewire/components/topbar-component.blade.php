<div>
    <!-- top-bar starts -->
    <div class="top-bar">
        <div id="c" class="container-fluid">
            <div class="row">
                <div class="col-md-2 mb-vw-hdn">
                    <div class="top-bar-left text-center">
                        @if($gsetting)
                        <span class="dk_top"><a href="{{ route('home') }}">{{ $gsetting->name }}</a></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-7 text-center mb-vw-hdn">
                    You can use Dkten app on your mobile, install it free on your Android or iOS device. <a
                        class="dk_top_link" href="#"> <strong>Download Dkten app</strong></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 lg-vw-hdn mb-vw-shw"><a class="dk_top_link"
                        href="#"><strong>Download Dkten app</strong></a></div>
                <div class="col-md-3 col-sm-6 col-xs-6 text-right">
                    <div class="ribbonsocial">
                        <span class="ribbonpara">Link With Us: </span>
                        <span class="ribbonlinks">
                            @if($ssetting)
                            <a href="{{ $ssetting->facebook }}" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="{{ $ssetting->instagram }}" target="_blank"><i
                                    class="fab fa-instagram "></i></a>
                            <a href="{{ $ssetting->youtube }}" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top bar ends here -->
</div>