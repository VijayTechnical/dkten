<div>
    @if($logo)
    <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img
            src="{{ asset('/storage/logo') }}/{{ $logo->admin_logo }}" alt="logo" class="px-10 py-10"></a>
    <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
            src="{{ asset('/storage/logo') }}/{{ $logo->mobile_logo }}" alt="logo" /></a>
    @endif
</div>