@extends('layouts.master')
@section('title','Facebook Data Deletion')
@section('content')


<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Facebook Data Deletion</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="{{ route('index') }}">Home</a></li> / 
                    <li class="current"><span> Facebook Data Deletion</span></li>
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
                        <h2>Facebook Data Deletion Instructions</h2>

                        <p class="color--light-3">
                            If you have logged in to our app using Facebook and want to delete your data, follow these steps:
                        </p>
                        <br>
                        <ol>
    <li>Go to your Facebook Account Settings.</li>
    <li>Click on "Apps and Websites".</li>
    <li>Find and remove our app from the list.</li>
    <li>Facebook will automatically delete the data shared with us.</li>
  </ol>
                        <p class="color--light-3">
                            If you want us to manually delete any remaining data, please email us at <strong><a href="mailto:support@comfort-mattress.com">support@comfort-mattress.com</a></strong> with your Facebook ID.
                        </p>

                        <!--<strong>Grievance Redressal</strong>-->

                        <!--<p class="color--light-3">Redressal Mechanism: Any complaints, abuse or concerns with regards to-->
                        <!--    content and or comment or breach of these terms shall be immediately informed to the-->
                        <!--    designated Grievance Officer as mentioned below via in writing or through email signed with-->
                        <!--    the electronic signature to Mr.Dinesh Joshi. ("Grievance Officer").-->
                        <!--</p>-->

                        <!--<address>-->
                        <!--    {{-- <p class="color--light-3">Mr.DINESH JOSHI (Grievance Officer)</p> --}}-->
                        <!--    <p class="color--light-3">Vardhra Shoes,</p>-->
                        <!--    <p class="color--light-3">G1 sagar chamber,</p>-->
                        <!--    <p class="color--light-3">saini enclave Vikas mark,</p>-->
                        <!--    <p class="color--light-3">New Delhi – 110092,</p><br />-->
                        <!--    <p class="color--light-3">Email: <a href="mailto:info@vardhra.in">info@vardhra.in</a>-->
                        <!--    </p>-->
                        <!--    <p class="color--light-3">Ph: <a href="tel:+918810693435">+91 881 069 3435</a></p>-->
                        <!--    <p class="color--light-3">Timing : 10:30 AM TO 6:30 PM | MON TO FRI</p>-->
                        <!--</address>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->

@endsection