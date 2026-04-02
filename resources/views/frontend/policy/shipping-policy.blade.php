@extends('layouts.master')
@section('title','Privacy')
@section('content')


<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Shipping Policy</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="{{ route('index') }}">Home</a></li> / 
                    <li class="current"><span> Shipping Policy</span></li>
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
                            <strong>
                                At Comfort Mattress, we want to make sure you receive your order as quickly and conveniently as possible. Here's what you need to know about our shipping policy:
                            </strong>
                        </p>
                        <br>
                        <p class="color--light-3">
                            <strong>
                                Shipping Methods
                            </strong>
                        <br>
                            We offer free shipping all over India.
                        </p>
                        <br>
                        <p class="color--light-3">
                            <strong>
                                Shipping Times
                            </strong>
                        <br>
                            We strive to process and ship all orders as quickly as possible. In-stock items are usually processed and shipped within 1-2 business days. Delivery times may vary depending on the shipping method selected and the destination. Please note that delivery times may be longer during holidays or other peak periods.
                        </p>
                        <br>
                        
                        <p class="color--light-3">
                            <strong>
                                Tracking Your Order
                            </strong>
                        <br>
                            Once your order is shipped, you will receive a confirmation email with tracking information. You can track your order by clicking on the tracking link in the email or by logging in to your account on our website.
                        </p>
                        <br>
                        <p class="color--light-3">
                            <strong>
                                Shipping Restrictions
                            </strong>
                        <br>
                            We currently only ship to cities in India. Some products may have additional shipping restrictions due to size, weight, or other factors. We reserve the right to refuse shipping to any address for any reason.
                        </p>
                        <br>
                        <p class="color--light-3">
                            <strong>
                                Shipping Address
                            </strong>
                        <br>
                            Please make sure to provide accurate and complete shipping information, including the recipient's name, address, and phone number. We are not responsible for any delays or additional shipping fees resulting from incorrect or incomplete shipping information.
                        </p>
                        <br>
                        <p class="color--light-3">
                            <strong>
                                Shipping Damage or Loss
                            </strong>
                        <br>
                            If your order is damaged or lost during shipping, please contact our customer service team immediately. We will work with you to resolve the issue and provide a replacement or refund as necessary.
                        </p>
                        <br>
                        <p class="color--light-3">
                            If you have any questions or concerns about our shipping policy, please don't hesitate to contact our customer service team via email.
                        </p>
                        <br>
                        <address>
                            <p class="color--light-3">Comfort Mattress</p>
                            <p class="color--light-3">Email: <a href="mailto:info@comfort-mattress.com">info@comfort-mattress.com</a>
                            </p>
                            <p class="color--light-3">Ph: <a href="tel:+917045944986">+91 70459 44986</a></p>
                        </address>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->

@endsection