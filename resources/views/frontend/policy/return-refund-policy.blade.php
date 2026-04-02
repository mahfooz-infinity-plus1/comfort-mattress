@extends('layouts.master')
@section('title','Privacy')
@section('content')


<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Return Refund Policy</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="{{ route('index') }}">Home</a></li> / 
                    <li class="current"><span> Return Refund Policy</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area End -->


<!-- Main Content Wrapper Start -->
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row ptb--40 ptb-md--30 ptb-sm--20">
                <div class="col-lg-12  col-md-12 order-md-2 mb-sm--25">
                    <div class="about-text">
                        <!-- <h3 class="heading-tertiary heading-color mb--20">Privacy</h3> -->
                        <p class="color--light-3">
                            At Comfort Mattress, we want you to be completely satisfied with your purchase. If you're not satisfied with your purchase, we accept returns within 7 days of the purchase date. To be eligible for a return, the item must be in its original condition, unused, and in its original packaging.
                        </p>
                        <br>
                        <p class="color--light-3">
                            To initiate a return, please contact our customer service team via email with your order number and reason for return. Our team will provide you with a return authorization number and instructions on how to send the item back to us. First you have to send parcel on our mentioned address.
                        </p>
                        <br>
                        <p class="color--light-3">
                            Please note that the customer is responsible for the cost of return shipping. Kindly note that we will deduct 100 RS for maintenance (which includes GST, Payment Gateway Charges, Order Processing Charges) and 200 RS for courier charges ( which includes return & reverse pickup). We recommend that you use a shipping method with tracking and insurance, as we are not responsible for lost or damaged items during the return shipping process.
                        </p>
                        <br>
                        
                        <p class="color--light-3">
                            Once we receive your returned item and verify that it is in its original condition, we will issue a refund to your original payment method or provide you with store credit for the purchase price of the item. Once refund is processed it will take up to 5 to 12 business working days to reflect in the accounts.
                        </p>
                        <br>
                        <p class="color--light-3">
                            Payment refund by Google Pay, Paytm, Phone Pay, & Bank Transfer. We are not providing cash back.
                        </p>
                        <br>
                        <p class="color--light-3">
                            If you have any questions or concerns about our return policy, please don't hesitate to contact our customer service team.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->

@endsection