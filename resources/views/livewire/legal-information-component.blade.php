<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>
               Legal Information
            </span>
        </h2>
        @if($legality)
        <div class="media-list">
            {!! $legality->legal_information !!}
        </div>
        @endif
    </div>
</div>