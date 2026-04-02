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
                        <img src="{{asset('assets/image/blog-image/comfort-blog-3.png')}}" alt="Mughal-E-Azam Turns Into a Broadway Musical, Promo of the Musical Organised at New York’s Time Square (Watch Video)">
                    </div>
                    <div class="course__text_details mt-5">
                        <h2 class="mb-20">The Natural Making of a 100% Latex Mattress</h2>
                        
                        <p class="mb-3">At Comfort Mattress, we believe sleep should be as pure as nature intended. That’s why every latex mattress we make is crafted using <strong> 100% natural latex</strong>, sustainably harvested from rubber trees. Unlike synthetic blends, a natural latex mattress offers exceptional comfort, durability, and breathability—without harmful chemicals.</p>
                        
                        <p class="mb-3">The journey of a latex mattress starts with tapping the milky sap of rubber trees. This <strong>eco-friendly process</strong> supports tree growth and renewability. The latex is then processed using the Dunlop or Talalay method—both producing a luxuriously soft yet supportive latex mattress ideal for all sleeping positions.</p>
                        
                        <p class="mb-3"> Every latex mattress we offer is hypoallergenic, dust mite-resistant, and naturally cooling—making it perfect for allergy sufferers and warm sleepers. At Comfort Mattress, we’re proud to provide you with a latex mattress that’s not only <strong>good for your health</strong> but great for the planet too.</p>
                        
                        <h5 class="mb-3">Looking for a healthier, more restful sleep? Switch to a 100% natural latex mattress today!</h5>

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