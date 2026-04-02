@extends('layouts.master')
@section('title', 'About')
@section('content')

    <!-- Breadcrumb area Start -->
    {{-- <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">About Us</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="current"><span>About Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper" style="margin-top: 74px;">
        <div class="container-fluid about-page-heading pt-5 pb-5">
            <div class="text-center">
                <h1>
                    About Us
                </h1>
                <h2 class="mb-5 pt-5" style="color:#5f5f5f; font-size:19.5px;">
                    Comfort Mattresses Mfg. Co since 1950......
                </h2>
                <h2 style="color:#5f5f5f; font-size:19.5px;" class="pb-5">
                    Dedicated to your Comfort Giving your Body the NATURAL Rest it needs
                </h2>
            </div>
        </div>
        <div class="page-content-inner">
            <div class="container">
                <div class="row ptb--40 ptb-md--30 ptb-sm--20">
                    <div class="col-lg-6 col-md-6 order-md-2 mb-sm--25">
                        <div class="about-text">
                            <div class="section-title">
                                <h2 class="text-center" style="margin-bottom: 20px !important;">
                                    COMPANY PROFILE
                                </h2>
                            </div>
                            <div class="col-12">
                                <div class="long-line"></div>
                                <div class="short-line"></div>
                            </div>
                            <div class="col-12">
                                <p class="mb-3">
                                    “Comfort Mattresses Mfg. Co.,” a renowned entity under the family-run R.G. Mansuri
                                    conglomerate based in Mumbai, India, has been a stalwart in the bedding sector for over
                                    six decades since its inception in 1950. Our distinct mattresses provide users with a
                                    unique floating experience that effectively alleviates stress.
                                </p>
                                <p class="mb-3">
                                    Comfort Foam Products stands at the forefront as a premier global producer and supplier
                                    of 100% Natural Latex Foam elements tailored for the bedding domain. Our extensive
                                    product portfolio encompasses Fiber Pillows, Latex Pillows, Contour Latex and Memory
                                    Foam Pillows, all crafted with the utmost quality of natural latex. Characterized by
                                    unparalleled elasticity and resilience, our natural rubber bedding components epitomize
                                    longevity and unparalleled comfort across diverse sleeping postures.
                                </p>
                                <p class="mb-3">
                                    Recognized as the most environmentally conscious choice in the market, Comfort Foam
                                    Products prides itself on offering a product that is inherently organic and
                                    eco-friendly.
                                </p>
                                <p class="mb-3">
                                    Thanks to our unwavering commitment to excellence, “Comfort Mattresses Mfg. Co.” has
                                    solidified its reputation as a premier brand in India for nearly 68 years. We stand as
                                    the leading manufacturer of Natural Latex Mattresses in India, dedicated to delivering
                                    dreams as we recognize the significance of spending one-third of life in peaceful
                                    slumber.
                                </p>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 order-md-1">
                        <figure class="image-box image-box-w-video-btn btn-right max-w-sm-65 max-w-xs-100">
                            <img style="width:100%;" src="{!! asset('assets/image/comfort-mattress-about-page-img.jpeg') !!}" alt="about">
                        </figure>
                    </div>
                </div>

            </div>
            <div class="container pt-3 pb-2">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2 class="text-center" style="margin-bottom: 20px !important;">Company History</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="long-line"></div>
                        <div class="short-line"></div>
                    </div>
                    <div class="col-12">
                        <p class="mb-3">
                            “Comfort Foam Products” established by R.G.Mansuri group of companies has been the forerunner in
                            mattresses technology after decades of rigorous R&D along with the latest foreign expertise has
                            resulted in top quality products comparable to any of the best brands in India and foreign
                            markets.
                        </p>
                        <p class="mb-3">
                            “Comfort Mattresses Mfg Co.” started of with a retail & wholesale showroom in 1950 at Mohammed
                            Ali Road, Mumbai catering to customers with quality home furnishing products in the form of
                            mattresses, pillows, upholstery sheets and furnishing items.
                        </p>
                        <p class="mb-3">
                            Pertaining to the growing markets and demands of Natural Latex Rubber mattresses and pillows Mr.
                            Rashid Mansuri strategically set up a plant for manufacturing 100% Natural latex rubber foam
                            Mattresses in 1979, in the name “COMFORT FOAM PRODUCTS” at Badlapur, Thane district Maharashtra
                            (India).
                        </p>
                        <p class="mb-3">
                            Mr. Sohail Mansuri successor of RG Mansuri introduced Comfort in the international markets in
                            2005 and has made it one of the leading suppliers to major European and Asian countries since
                            the last 6 years.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container pt-3 pb-2" style="background-color: #1C14BC4A;">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2 class="text-center" style="margin-bottom: 20px !important;">Our Values</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="long-line"></div>
                        <div class="short-line"></div>
                    </div>
                    <div class="col-12">
                        <p class="mb-3">
                            We provide 24 x 7 services to our clients and continuously enhancing the quality of our
                            products. We work with the vision to make prompt delivery of our products to our customers who
                            have put their trust on us that constantly tempts us to work even better. Our Core value stands
                            on innovation and application for modern technology. We strengthen our core values with
                            dedication, punctuality, loyalty and offering qualitative products to the global market.
                        </p>
                        <ul class="mb-3 ms-5" style="list-style: disc">
                            <li>
                                Be courteous to our customers and educate them about the product they are buying.
                            </li>
                            <li>
                                Always strive for the win-win solution in dealings with customers, fellow employees and
                                suppliers.
                            </li>
                        </ul>
                        <p class="mb-3">
                            This means you can ask questions and compare our brand to the other (national) brands, feature
                            for feature. By learning more about mattress you can understand exactly what you’re getting for
                            your money and make an informed buying decision. More importantly, you can feel confident that
                            you’ve chosen the best mattress and received the best value.
                        </p>
                        <p class="mb-3">
                            Our mission is to provide the end consumer with the high quality standard pillows and
                            mattresses, which at the end of the day gives them desired relief. Our effort is to create new
                            horizons of excellence by offering exclusive products at a reasonable rate.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->



@endsection
