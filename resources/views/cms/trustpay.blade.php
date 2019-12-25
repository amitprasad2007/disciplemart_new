@extends('layouts.main')

@section('content')
<div class="clearfix"></div>

     <div class="trustpaybanner">
            <div class="trustbar">
                <ul>
                    <li><img src="{!! asset('design/images/cart(1).svg') !!}"><br/>Easy Cancellations</li>
                    <li><img src="{!! asset('design/images/credit-card.svg') !!}"><br/>100% Payment Protection</li>
                </ul>
            </div>
        </div>

        <div class="container trustpaycontent">
            <h2>Disciplemart Trustpay</h2>
            <h3>We do our best to ensure that you have an amazing experience while purchasing and accessing our products. We sincerely try to always help you receive products in good condition.</h3>
        </div>
        <div class="container trustpaycontent">
            <h3 class="title">Easy Cancellations</h3>
            <p>1. In order to ship the product, Disciple Mart usually takes 5-7 working days from the date of order. In case the shipment is delayed by 12-15 days from the date of order, you can request for cancellation of the order, and the total amount, if paid while making purchase via Debit Card/ Credit Card/ Payment Gateway, will be refunded</p>
            <p>2. If the product received is defective or malfunctioning, then you may request a refund, within 2 working days from the receipt of the product</p>
            <p>3. If paid by Debit/ Credit card, the refund amount will be issued to the card, details of which is provided at the time of purchase</p>
            <p>4. If paid using Payment Gateway, the refund amount will be issued to the same account, details of which is provided at the time of purchase</p>
        </div>

        <div class="container trustpaycontent">
            <h3 class="title">100% Payment Protection</h3>
            <p>Your online transaction on Disciplemart is secure with the highest levels of transaction security currently available on the Internet. Disciplemart uses 256 bit encryption technology to protect your card information while securely transmitting it to the respective banks for payment processing.</p>

            <p>All credit card and debit card payments on Disciplemart are processed through secure and trusted payment gateways managed by leading banks. Banks now use the 3D Secure password service for online transactions, providing an additional layer of security through identity verification.</p>
        </div>



<div class="clearfix"></div>


@endsection