<?php

namespace App\View\Components\Admin\Esewa;

use Illuminate\View\Component;

class AdminVendorPayEsewaComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.esewa.admin-vendor-pay-esewa-component');
    }
}
