<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
                Terms And Conditions
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->terms_and_condition !!}
        </div>
        @endif
    </div>
</div>