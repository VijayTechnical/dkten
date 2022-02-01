<?php

namespace App\Http\Livewire\Vendor\Dashboard;

use Livewire\Component;

class VendorDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.vendor.dashboard.vendor-dashboard-component')->layout('layouts.vendor');
    }
}
