@extends('layouts.master')
@section('title', 'Blogs')
@section('content')
<section class="p-5"></section>
<section class="course-section__block padding ptb-xs-60">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9 mb-30 op">
                <div class="course__details_block">
                    <div class="course__figure_img">
                        <img src="{{asset('assets/image/blog-image/comfort-blog-4.png')}}" alt="Mughal-E-Azam Turns Into a Broadway Musical, Promo of the Musical Organised at New York’s Time Square (Watch Video)">
                    </div>
                    <div class="course__text_details mt-5">
                        <h2 class="mb-20">Why a Dr Ortho Mattress Is the Best Choice for Back Pain Relief</h2>
                        
                        <p class="mb-3">If you’re waking up with aches and discomfort, it’s time to switch to a <strong>Dr Ortho mattress</strong>. Specially designed to support your spine, our ortho mattress range at Comfort Mattress offers the ultimate solution for those seeking a mattress for back pain.</p>
                        
                        
                        <p class="mb-3">Engineered with high-density foam and ergonomic zoning, every <strong>Dr Ortho mattress</strong> ensures perfect spinal alignment. Unlike regular beds, an ortho mattress provides firm yet comfortable support, helping <strong>relieve pressure points and improve posture</strong> over time.</p>
                        
                        <p class="mb-3">Whether you suffer from chronic back pain or simply want better sleep, choosing the right mattress for back pain can make all the difference. Our <strong>Dr Ortho mattress</strong> collection is also ideal for seniors, athletes, and professionals who spend long hours sitting or standing.</p>
                                
                        <h5 class="mb-3">Upgrade to an ortho mattress from Comfort Mattress and experience the long-lasting relief your back deserves.</h5>

                    </div>

                </div>

            </div>
            <!--Sidebar-->
            <div class="col-md-3 col-lg-3 mt-sm-60">
                <div class="sidebar-widget">
                    <h4>ALL Blogs</h4>

                    <ul class="categories">
                        <li><a href="{{route('blogs1')}}"><i class="fa fa-chevron-right"></i> Why a Latex Mattress is the Best Choice for Healthy & Comfortable Sleep</a></li>

                        <li><a href="{{route('blogs2')}}"><i class="fa fa-chevron-right"></i> Say Goodbye to Back Pain with the Right Orthopedic Mattress</a></li>
                        <li><a href="{{route('blogs3')}}"><i class="fa fa-chevron-right"></i> The Natural Making of a 100% Latex Mattress</a></li>
                        <li><a href="{{route('blogs4')}}"><i class="fa fa-chevron-right"></i> Why a Dr Ortho Mattress Is the Best Choice for Back Pain Relief</a></li>

                    </ul>
                </div>

            </div>
            <!--Sidebar-->
        </div>

    </div>
</section>
@endsection