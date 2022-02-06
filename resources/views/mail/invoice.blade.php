@php
    $order = get_order($order_id);
@endphp


@component('mail::message')
Order Confirmation Email From DKten

@component('mail::panel')
Your sale code is {{ $order->sale_code }}
@endcomponent


<h1>Billing Detail</h1>
@component('mail::table')
| Name                                                         | Email                     | Address                                            | Phone                     | Zip                    |
|:------------------------------------------------------------:|:-------------------------:|:--------------------------------------------------:|:-------------------------:|:----------------------:|
| {{ $order->User->first_name }} {{ $order->User->last_name }} | {{ $order->User->email }} | {{ $order->User->line1}},{{ $order->User->line2 }} | {{ $order->User->phone }} | {{ $order->User->zip }}|
@endcomponent
<h1>Shipping Detail</h1>
@component('mail::table')
|                     Name                       | Email               | Address                                | Phone                | Zip              |
|:----------------------------------------------:|:-------------------:|:--------------------------------------:|:--------------------:|:----------------:|
| {{ $order->firstname }} {{ $order->lastname }} | {{ $order->email }} | {{ $order->line1}},{{ $order->line2 }} | {{ $order->mobile }} | {{ $order->zip }}|
@endcomponent
<h1>Payment Detail</h1>
@component('mail::table')
| Payment status | Payment Mode  |
|:--------------:|:-------------:|
| {{ $order->Transaction->status }} | {{ $order->Transaction->PaymentMode->name }} |
@endcomponent
@php
    $items = get_order_items($order->id);
@endphp
@component('mail::table')
| Item                            | Options                                                                                                                                   -| Quantity              | Unit Cost             | Total                                                   |
|:-------------------------------:|:------------------------------------------------------------------------------------------------------------------------------------------:|:---------------------:|:---------------------:|:-------------------------------------------------------:|
@foreach ($items as $item)
@php
    $options = get_item_options($item->id); 
@endphp
| {{ get_item_title($item->id) }} | <ul><li>{{ $options['key'] }} : {{ $options['value'] }}</li></ul> | {{ $item->quantity }} | NPR{{ $item->price }} | NPR{{ number_format($item->price * $item->quantity,2)}} |
@endforeach
@endcomponent

@component('mail::subcopy')
<ul>
    <li>Subtotal : NPR{{ $order->subtotal }}</li>
    <li>Tax : NPR{{ $order->tax }}</li>
    <li>Shipping : NPR{{ $order->shipping_cost }}</li>
    <li>Total : NPR{{ $order->total }}</li>
</ul>
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent