<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public $graph_date;
    public $graph_sale;
    public $transaction_data_wallet;
    public $transaction_data_esewa;
    public $transaction_data_khalti;
    public $transaction_data_imepay;
    public $transaction_data_cash;


    public function render()
    {
        $transaction_Sale = Order::with('Transaction')->whereHas('Transaction', function ($query) {
            $query->where('status', true);
        })->get();
        $c_sum = 0;
        $w_sum = 0;
        $e_sum = 0;
        $k_sum = 0;
        $i_sum = 0;
        foreach ($transaction_Sale as $sale) {
            if ($sale->Transaction->PaymentMode->name == 'cash_on_delivery') {
                $c_sum = $c_sum + $sale->total;
            } elseif ($sale->Transaction->PaymentMode->name == 'wallet') {
                $w_sum = $w_sum + $sale->total;
            } elseif ($sale->Transaction->PaymentMode->name == 'esewa') {
                $e_sum = $e_sum + $sale->total;
            } elseif ($sale->Transaction->PaymentMode->name == 'khalti') {
                $k_sum = $k_sum + $sale->total;
            } else {
                $i_sum = $i_sum + $sale->total;
            }
        }
        $this->transaction_data_cash = str_replace('.', '' ,$c_sum);
        $this->transaction_data_wallet = str_replace('.', '' ,$w_sum);
        $this->transaction_data_esewa = str_replace('.', '' ,$e_sum);
        $this->transaction_data_khalti = str_replace('.', '' ,$k_sum);
        $this->transaction_data_imepay = str_replace('.', '' ,$i_sum);

        $this->graph_date = collect();
        $this->graph_sale = collect();

        for ($i = 0; $i <= 7; $i++) {
            $date = Carbon::now()->copy()->subDays($i)->toDateString();
            $this->graph_sale->push(str_replace('.', '', Order::with('Transaction')->whereHas('Transaction', function ($query) {
                $query->where('status', true);
            })->whereDate('created_at', '<=', $date)->sum('total')));
            $this->graph_date->push($date);
        }

        $daily_sale = Order::where('created_at', 'like', date("Y-m-d") . "%")->sum('total');
        $total_Sale = str_replace('.', '', Order::with('Transaction')->whereHas('Transaction', function ($query) {
            $query->where('status', true);
        })->sum('total'));
        return view('livewire.admin.dashboard.admin-dashboard-component', ['daily_sale' => $daily_sale, 'total_sale' => $total_Sale])->layout('layouts.admin');
    }
}
