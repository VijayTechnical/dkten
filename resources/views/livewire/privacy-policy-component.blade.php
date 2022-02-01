<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
                Privacy And Policies
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->privacy_and_policy !!}
        </div>
        @endif
    </div>
</div>