@extends('mail.app')

@section('content')
    <h2 class="main-h2">[Order Number : {{$order->order_number}}] IN ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <div id="main-div">
        <h4 class="custom-h4">SEND TO US :<strong class="custom-h4"> {{$order->input_number}} Perfect Money USD</strong></h4>
        <h4 class="custom-h4">RECEIVE FROM US :<strong class="custom-h4"> {{$order->output_number}} $ PayPal (Goods & Services)</strong></h4>
        <p>
            Please Send {{$order->input_number}} $ to Perfect Money wallet below and wait for your PayPal transaction to be completed, 
            you will be notified via email upon completion of transaction. 
        </p>
        <p id="custom-p">
            (PayPal Receipt Screenshot & Transaction id will be available in our email to our customers)
        </p>
        <h2 class="main-h2">Perfect Money USD Wallet: U26173713</h2>
        <p id="custom-p">
            You can put your email or order as a note in your Perfect Money Transaction to us
        </p>
        <h2 class="main-h2 extra-space">Please feel free to contact us if you have any questions</h2>
    </div>
@endsection