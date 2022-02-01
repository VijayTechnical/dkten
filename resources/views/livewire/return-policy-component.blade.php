<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
             Return Policy
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->return_policy !!}
        </div>
        @endif
    </div>
</div>