<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
             Employee Aid
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->employee_aid !!}
        </div>
        @endif
    </div>
</div>