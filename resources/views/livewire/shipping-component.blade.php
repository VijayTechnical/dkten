<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
             Shippings
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->shipping !!}
        </div>
        @endif
    </div>
</div>