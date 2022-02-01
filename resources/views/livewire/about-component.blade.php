<div>
    <div class="contact-info contact_bg">
        @if($setting)
        <h2 class="block-title">
            <span>
             About {{ $setting->name }}
            </span>
        </h2>
        <div class="media-list">
            {!! $setting->description !!}
        </div>
    </div>
    @endif
</div>