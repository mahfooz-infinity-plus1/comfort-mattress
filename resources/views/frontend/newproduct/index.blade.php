

@extends('layouts.master')
@section('meta_title', 'Buy mattress online in Mumbai | COMFORT MATTRESS')
@section('meta_keywords',
    'Mattress Shop Near me, comfort mattress, soft mattress, buy mattress online in mumbai, Buy
    Mattress online')
@section('meta_canonical', 'https://comfort-mattress.com')
@section('meta_description',
    'Find the best comfort mattress and soft mattress for your home. buy the best mattress
    online in Mumbai. We offer a wide range of mattresses, including pillows.')
@section('content')
    <!--home page slider start-->
    <section class="home-slider-5">
        <div class="home-slider-main-5">
            <div class="home5-slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="img-back s-image1"
                                onclick="window.location.href='{{ $slider->url ? $slider->url : 'javascript:void(0)' }}'">
                                <img class="width100" src="{!! asset('storage/images/sliders') . '/' . $slider->image_url !!}" alt="">
                                <div class="h-s-content">
                                    <h1>{{ $slider->title }}</h1>
                                    <h3>{{ $slider->subtitle }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-buttons">
                    <button class="swiper-prev"><i class="fa fa-angle-left"></i></button>
                    <button class="swiper-next"><i class="fa fa-angle-right"></i></button>
                </div>
                <div class="swiper-pagination"><span></span></div>
            </div>
        </div>
    </section>
    <!--home page slider end-->

    <!-- category image strat -->
    {{-- temparary hide code  --}}
    {{-- <section class="home5-category section-b-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Shop by category</h2>
                    </div>
                    <div class="home5-cate-image owl-carousel owl-theme">
                        @foreach ($categories as $item)
                            <div class="items">
                                <div class="cate-image">
                                    <a href="{{ route('cate', $item->slug_url) }}">
                                        <img src="{!! asset('storage/images/categories/' . $item->image_url) !!}" alt="{{ $item->name }}" class="img-fluid">
                                    </a>
                                    <span>{{ $item->name }}</span>
                                    <p>{{ $item->products_count }} Products</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- category image end -->


    <!-- start Shop Comfort Mattress Online -->

    <section class="shop-online pt-5 pb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Shop Comfort Mattress Online</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
            <div class="row">
                <p class="text-center fs-5 mb-2 home-about-heading">Comfort Mattresses Mfg. Co since 1950</p>
                <p class="text-center fs-5 fw-medium mb-2 home-about-secondheading">Dedicated to your Comfort </p>

                <p>
                     At Comfort Mattress, we specialize in high-quality, innovative mattresses designed to enhance your sleep experience. Whether you are searching for orthopedic support, cooling technology, or the
                    ultimate in comfort and durability, we have a mattress that suits your lifestyle. Explore our top-rated
                    mattresses and find the perfect one for your home. If you're looking to <a
                        href="https://comfort-mattress.com/product-category/latex-mattress"> buy a mattress online in
                        Mumbai</a>, we offer a wide range to cater to every sleeper’s needs.
                </p>
                <p class="mt-1">
                    Buy directly from the manufacturer at Comfort-Mattress.com and
                    <span class="enjoy-discount-span">Enjoy the best discounts</span> on all mattresses.
                </p>
                <p class="mt-2 middlemen-p fs-5">No Middleman, Just Maximum Value</p>
            </div>
            <!--<div class="row">-->
            <!--    <div class="col-5">-->
            <!--        <img src="https://comfort-mattress.com/assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/1.png" style="-->
            <!--            width: 100%;-->
            <!--        ">                    -->
            <!--    </div>-->
            <!--    <div class="col-7">-->
            <!--        <p>-->
            <!--        <span>Comfort Mattresses Mfg. Co since 1950....,</span> dedicated to your comfort giving your body the NATURAL rest-->
            <!--        it needs. At Comfort Mattress, we specialize in high-quality, innovative mattresses designed to enhance-->
            <!--        your sleep experience. Whether you are searching for orthopedic support, cooling technology, or the-->
            <!--        ultimate in comfort and durability, we have a mattress that suits your lifestyle. Explore our top-rated-->
            <!--        mattresses and find the perfect one for your home. If you're looking to <a href="https://comfort-mattress.com/product-category/latex-mattress"> buy a mattress online in-->
            <!--            Mumbai</a>, we offer a wide range to cater to every sleeper’s needs.-->
            <!--    </p>-->
            <!--    </div>-->
                

            <!--</div>-->
        </div>
    </section>
    <!-- end Shop Comfort Mattress Online -->

   

   
    <!-- products tab start -->
    @foreach ($section_products as $key => $section)
        @if (count($section))
            <section class="home5-featured section-b-padding featured-products">
                <div class="container">
                    <div class="row pe-0">
                        <div class="col">
                            <div class="section-title">
                                <!--<h2 class="text-center pb-4"><span>{{ $key }}</span></h2>-->
                                <div class="web-title">
                                    <h3 class="text-center">COMFORT - MATTRESS</h3>
                                </div>
                                 <div class="section-title">
                                    <h2 class="text-center">{{ $key }}</h2>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="long-line"></div>
                                <div class="short-line mb-4"></div>
                            </div>

                            <div class="featured5-pro owl-carousel owl-theme">
                                @foreach ($section as $k => $product)
                                    @php
                                        // $colors = explode(',', $product->color_codes);
                                        $getDiff = $product->starting_price - $product->mrp;
                                        $getOffer = round(($getDiff / $product->starting_price) * 100, 0);
                                    @endphp
                                    <div class="items owl-card-item">
                                        <div class="tred-pro">
                                            <div class="tr-pro-img">
                                                <a href="{{ route('product', $product->slug_url) }}">
                                                    <img class="img-fluid lazy" src="{!! $product->image_url !!}"
                                                        alt="{{ $product->title }}">
                                                    <img class="img-fluid additional-image lazy"
                                                        src="{!! $product->image_url1 !!}" alt="{{ $product->title }}">
                                                </a>
                                            </div>
                                            

                                            <div class="Pro-lable">
                                                <span class="p-text">New</span>
                                                <span class="p-discount"> {{ $getOffer }}% off</span>
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <h3>
                                                <span class="pull-left">
                                                    <a href="{{ route('product', $product->slug_url) }}">
                                                        {{ Str::length($product->title) > 20 ? Str::substr($product->title, 0, 20) . '...' : $product->title }}
                                                    </a>
                                                </span>
                                                {{-- <span class="pull-right">
                                                    @foreach ($colors as $color)
                                                        <span
                                                            style="background: {{ $color }};border-radius:50%;height:10px;width:10px;display:inline-block;box-shadow: 1px 2px 3px 0px #5f5f5f"></span>
                                                    @endforeach
                                                </span> --}}
                                                <div class="clearfix"></div>
                                            </h3>
                                            <div>
                                                <!--removed class (pull-left)-->
                                                <div class="pro-price ">
                                                    <span class="new-price"><i class="fa fa-inr"></i>
                                                        {{ $product->mrp }}</span>
                                                    <span class="old-price"><del><i class="fa fa-inr"></i>
                                                            {{ $product->starting_price }}</del></span>
                                                </div>
                                                <!--@if ($product->review_status)-->
                                                <!--    <div class="rating pull-right">-->
                                                <!--        @for ($i = 1; $i <= $product->rating; $i++)-->
                                                <!--            <i class="fa fa-star b-star"></i>-->
                                                <!--        @endfor-->
                                                <!--        @for ($i = 1; $i <= 5 - $product->rating; $i++)-->
                                                <!--            <i class="fa fa-star-o"></i>-->
                                                <!--        @endfor-->
                                                <!--    </div>-->
                                                <!--@endif-->
                                        <div class="product-action-bar d-flex align-items-center gap-2  mt-3 mb-1">
                                            {{-- Wishlist Icon --}}
                                            <div class="wishlist-btn text-center " style="width: 20%;">
                                                @if (auth('user')->check())
                                                    @if (auth('user')->user()->id == $product->w_u_id && $product->w_product_id == $product->id)
                                                        <a href="javascript:void(0)" class="wishlist-remove" data-w-id="{{ $product->w_id }}" title="Remove from Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" class="wishlist" data-p-id="{{ $product->id }}" data-c-id="{{ $product->c_id }}" data-s-id="{{ $product->s_id }}" title="Add to Wishlist">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </a>
                                                    @endif
                                                @else
                                                    <a href="javascript:void(0)" class="wishlist-login" title="Add to Wishlist">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        
                                            {{-- Add to Cart Button --}}
                                            <div class="flex-grow-1 carousal-add-to-card-btn">
                                                <a href="javascript:void(0)"
                                                   onclick="addToCart('{{ $product->id }}', '{{ $product->stock }}', '{{ $product->c_id }}', '{{ $product->s_id }}')"
                                                   class="btn w-100">
                                                    Add to Cart
                                                </a>
                                            </div>
                                        </div>

                                            </div>
                                        </div>
                                        
                                        

                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    <!-- product tab end -->
    
    

    
    
    <section class="latex-mattress-container">
        <div class="container">
            <div class="mattress-slider">

            </div>
        </div>
    </section>

     <section class="shop-by-categories light-bg pt-4">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Shop By Categories</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
        </div>
        <div class="shop-by-category-container light-bg ">
            <div class="container">
                <div class="row ">
                    <div class="col shop-by-category-card text-center">
                        <a href="https://comfort-mattress.com/product-category/latex-mattress">
                            <div class="category-image-container">
                                <img src="{!! asset('assets/image/category/latex-mattress.png') !!}" alt="">
                            </div>
                            <div class="category-title">
                                <h2 class="text-secondary">Latex Mattress</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col shop-by-category-card text-center">
                        <a href="https://comfort-mattress.com/product-category/foam-mattress">
                            <div class="category-image-container">
                                <img src="{!! asset('assets/image/category/foam-mattress.png') !!}" alt="">
                            </div>
                            <div class="category-title">
                                <h2 class="text-secondary">Foam Mattress</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col shop-by-category-card text-center">
                        <a href="https://comfort-mattress.com/product-category/spring-mattress">
                            <div class="category-image-container">
                                <img src="{!! asset('assets/image/category/spring-mattress.jpg') !!}" alt="">
                            </div>
                            <div class="category-title">
                                <h2 class="text-secondary">Spring Mattress</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col shop-by-category-card text-center">
                        <a href="https://comfort-mattress.com/product-category/memory-mattress">
                            <div class="category-image-container">
                                <img src="{!! asset('assets/image/category/memory-mattress.png') !!}" alt="">
                            </div>
                            <div class="category-title">
                                <h2 class="text-secondary">Memory Mattress</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col shop-by-category-card text-center">
                        <a href="https://comfort-mattress.com/product-category/orthopedic-mattress">
                            <div class="category-image-container">
                                <img src="{!! asset('assets/image/category/orthopedic-mattress.png') !!}" alt="">
                            </div>
                            <div class="category-title">
                                <h2 class="text-secondary">Orthopedic Mattress</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Buy Comfort Mattress Products Online -->
    <!--<section class="buy-products-online dark-bg pt-4 pb-4">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Buy Comfort Mattress Products Online</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line mb-4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <p>-->
    <!--                Our extensive mattress collection features advanced materials and technologies to ensure you get the-->
    <!--                best night's sleep. We offer everything from natural latex mattresses to memory foam and spring-->
    <!--                mattresses, all designed to provide exceptional support and comfort. Whether you’re dealing with back-->
    <!--                pain or just looking for extra softness, we have the right mattress for you.-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-4 col-sm-6 pt-3">-->
    <!--                <div class="flip-box">-->
    <!--                    <div class="flip-box-front text-center">-->
    <!--                        <div class="inner color-black">-->
    <!--                            <div class="neon">-->
    <!--                                <h4>Orthopedic Mattresses</h4>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="flip-box-back text-center">-->
    <!--                        <div class="inner color-white">-->
    <!--                            <div class="neon-wrapper">-->
    <!--                                <p>-->
    <!--                                    Designed for superior spinal alignment and posture support, our Ortho Super Deluxe-->
    <!--                                    and Dr. Ortho mattresses are the perfect choices for anyone experiencing back or-->
    <!--                                    joint pain. These mattresses provide firm yet comfortable support.-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 col-sm-6 pt-3">-->
    <!--                <div class="flip-box">-->
    <!--                    <div class="flip-box-front text-center">-->
    <!--                        <div class="inner color-black">-->
    <!--                            <div class="neon">-->
    <!--                                <h4>Natural Latex Mattresses</h4>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="flip-box-back text-center">-->
    <!--                        <div class="inner color-white">-->
    <!--                            <div class="neon-wrapper">-->
    <!--                                <p>-->
    <!--                                    For those seeking eco-friendly and breathable solutions, our 7 Zone Natural Latex-->
    <!--                                    Mattresses offer unparalleled comfort with the benefit of organic materials. These-->
    <!--                                    mattresses are ideal for hot sleepers, ensuring cooler nights and refreshing rest.-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
                    <!-- <div class="container">
    <!--                                <h4>Natural Latex Mattresses</h4>-->
    <!--                                <p>-->
    <!--                                    For those seeking eco-friendly and breathable solutions, our 7 Zone Natural Latex Mattresses offer unparalleled comfort with the benefit of organic materials. These mattresses are ideal for hot sleepers, ensuring cooler nights and refreshing rest.-->
    <!--                                </p>-->
    <!--                            </div> -->
    <!--            </div>-->
    <!--            <div class="col-md-4 col-sm-6 pt-3">-->
    <!--                <div class="flip-box">-->
    <!--                    <div class="flip-box-front text-center">-->
    <!--                        <div class="inner color-black">-->
    <!--                            <div class="neon">-->
    <!--                                <h4>Memory Foam Mattresses</h4>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="flip-box-back text-center">-->
    <!--                        <div class="inner color-white">-->
    <!--                            <div class="neon-wrapper">-->
    <!--                                <p>-->
    <!--                                    Featuring our Comfort Memory Foam technology, these mattresses contour perfectly to-->
    <!--                                    your body, offering plush support that adjusts to your movement. Perfect for anyone-->
    <!--                                    looking to minimize partner disturbance during sleep.-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
                    <!-- <div class="container">
    <!--                                <h4>Memory Foam Mattresses</h4>-->
    <!--                                <p>-->
    <!--                                    Featuring our Comfort Memory Foam technology, these mattresses contour perfectly to your body, offering plush support that adjusts to your movement. Perfect for anyone looking to minimize partner disturbance during sleep.-->
    <!--                                </p>-->
    <!--                            </div> -->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end Buy Comfort Mattress Products Online -->

    <!-- start Comfort Mattress for Back Pain Relief -->
    <!--<section class="back-pain-relief pt-4 pb-4">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Buy Comfort Mattress Products Online</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line mb-4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <p>-->
    <!--                If you’re struggling with back pain, our specially designed orthopedic mattresses will offer the relief-->
    <!--                you need. Our products are engineered with layers of bonded foam, memory foam, and natural latex to-->
    <!--                ensure that your spine stays aligned throughout the night. Customers frequently tell us that our-->
    <!--                mattresses help reduce discomfort and promote deeper, more restful sleep.-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end Comfort Mattress for Back Pain Relief -->

   

    <!-- start Buy Comfort Mattresses Online at the Best Prices -->
    <section class="the-best-prices pt-4 pb-4">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Buy Comfort Mattresses Online at the Best Prices</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
            <div class="row">
                <p class="mb-3">
                    At Comfort Mattress, we believe that a great night’s sleep should be accessible to everyone. That’s why
                    we offer high-quality mattresses at competitive prices. Whether you’re looking for a luxury latex
                    mattress or a spring mattress, our collection provides options for every budget without compromising on
                    quality. Plus, enjoy free shipping across Mumbai!
                </p>
                 <p>
                    We believe that a premium mattress doesn’t need to come with a premium price tag. At Comfort Mattress,
                    we offer affordable, high-quality mattresses that cater to every budget, whether you’re looking for a
                    foam mattress, spring mattress, or latex mattress. Enjoy free shipping and exclusive offers when you
                    shop online with us.
                </p>
            </div>
        </div>
    </section>
    <!-- end Buy Comfort Mattresses Online at the Best Prices -->

    <section class="watch-vision-comfort-section light-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Watch - Vision - Comfort</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
            <!--<div class="row">-->
            <!--    {{-- <div class="youtube-video-card-container"> --}}-->
            <!--    <div class="col-md-3 col-sm-6 youtube-video-card">-->
            <!--        <div class="youtube-video-card-title">-->
            <!--            <h3>Our Product</h3>-->
            <!--        </div>-->
            <!--        <div class="youtube-video-container">-->
            <!--            <iframe width="100%" height="450"-->
            <!--                src="https://www.youtube.com/embed/2IZdkOzJBAw?si=aE1JB-pMxL46dhza"-->
            <!--                title="YouTube video player" frameborder="0"-->
            <!--                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
            <!--                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-3 col-sm-6 youtube-video-card">-->
            <!--        <div class="youtube-video-card-title">-->
            <!--            <h3>Latex Mattresses</h3>-->
            <!--        </div>-->
            <!--        <div class="youtube-video-container">-->
            <!--            <iframe width="100%" height="450"-->
            <!--                src="https://www.youtube.com/embed/iu94MrOFKag?si=lQ4HoTQSPOYshhzv"-->
            <!--                title="YouTube video player" frameborder="0"-->
            <!--                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
            <!--                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-3 col-sm-6 youtube-video-card">-->
            <!--        <div class="youtube-video-card-title">-->
            <!--            <h3>Why Latex Mattress</h3>-->
            <!--        </div>-->
            <!--        <div class="youtube-video-container">-->
            <!--            <iframe width="100%" height="450"-->
            <!--                src="https://www.youtube.com/embed/nO1kI1aWKIQ?si=SbS0YVTFTR5RQSnX"-->
            <!--                title="YouTube video player" frameborder="0"-->
            <!--                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
            <!--                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-3 col-sm-6 youtube-video-card">-->
            <!--        <div class="youtube-video-card-title">-->
            <!--            <h3>Protect your mattress</h3>-->
            <!--        </div>-->
            <!--        <div class="youtube-video-container">-->
            <!--            <iframe width="100%" height="450"-->
            <!--                src="https://www.youtube.com/embed/e4E1zI1c_v8?si=iXTQK-5ZBd6gzxUg"-->
            <!--                title="YouTube video player" frameborder="0"-->
            <!--                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
            <!--                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    {{-- </div> --}}-->
            <!--</div>-->
            <div class="row">
                <div class="col-12">
                    <div id="yt-video-section" class="owl-carousel owl-theme">
                        <div class="youtube-video-card">
                            <div class="youtube-video-card-title"><h3>Our Product</h3></div>
                            <div class="youtube-video-container">
                              <iframe width="100%" height="450" src="https://www.youtube.com/embed/2IZdkOzJBAw?si=aE1JB-pMxL46dhza" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                        <div class="youtube-video-card">
                            <div class="youtube-video-card-title"><h3>Latex</h3></div>
                            <div class="youtube-video-container">
                              <iframe width="100%" height="450" src="https://www.youtube.com/embed/iu94MrOFKag?si=lQ4HoTQSPOYshhzv" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                        <div class="youtube-video-card">
                            <div class="youtube-video-card-title"><h3>Why Latex</h3></div>
                            <div class="youtube-video-container">
                              <iframe width="100%" height="450" src="https://www.youtube.com/embed/nO1kI1aWKIQ?si=SbS0YVTFTR5RQSnX" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                        <div class="youtube-video-card">
                            <div class="youtube-video-card-title"><h3>Protect</h3></div>
                            <div class="youtube-video-container">
                              <iframe width="100%" height="450" src="https://www.youtube.com/embed/e4E1zI1c_v8?si=iXTQK-5ZBd6gzxUg" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                        <div class="youtube-video-card">
                            <div class="youtube-video-card-title"><h3>Orthopedic Mattress</h3></div>
                            <div class="youtube-video-container">
                              <iframe width="100%" height="450" src="https://youtube.com/embed/JPyoteYh6UA?si=EV7OF22QztNFUh9E" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                    </div>
                    </div>
</div>

            <div class="row">
                <div class="col pt-4 text-center">
                    <a href="https://comfort-mattress.com/product-category/mattress" class="shop-now-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!--<section class="leading-manufacturers">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Leading manufacturers of 100% natural latex mattress</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-4">-->
    <!--                <div class="leading-manufacturers-card">-->
    <!--                    <div class="leading-manufacturers-card-img-container">-->
    <!--                        <img src="{!! asset('assets/image/leading-manufacturers/1.png') !!}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="leading-manufacturers-card-content">-->
    <!--                        <div>-->
    <!--                            <h3>100% NATURAL LATEX</h3>-->
    <!--                            <p>Experience unparalleled comfort with our 100% natural latex products. Crafted from the-->
    <!--                                purest latex sap, our mattresses ensure a luxurious blend of support and eco-friendly-->
    <!--                                indulgence.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4">-->
    <!--                <div class="leading-manufacturers-card">-->
    <!--                    <div class="leading-manufacturers-card-img-container">-->
    <!--                        <img src="{!! asset('assets/image/leading-manufacturers/2.jpeg') !!}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="leading-manufacturers-card-content">-->
    <!--                        <div>-->
    <!--                            <h3>100% COTTON COVER</h3>-->
    <!--                            <p>Crafted from pure, luxurious 100% cotton, our covers offer a touch of elegance and-->
    <!--                                comfort. Impeccably woven, these covers provide a soft and breathable sanctuary for your-->
    <!--                                bedding.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4">-->
    <!--                <div class="leading-manufacturers-card">-->
    <!--                    <div class="leading-manufacturers-card-img-container">-->
    <!--                        <img src="{!! asset('assets/image/leading-manufacturers/3.jpeg') !!}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="leading-manufacturers-card-content">-->
    <!--                        <div>-->
    <!--                            <h3>TENCEL FABRIC OUTER COVER</h3>-->
    <!--                            <p>Tencel is a 100% Natural and Eco-Friendly material. It is luxuriously soft, keeps-->
    <!--                                moisture away and keeps the mattress cool. The fabric is even great for Sensitive skin.-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->


    <section class="pb-4">
        <div class="container">
            <div class="row">
                <div class="normal-card col-md-3">
                    <div class="normal-card-content text-center">
                        <div class="normal-card-img-container">
                            <i class="fa-solid fa-earth-americas"></i>
                        </div>
                        <div class="normal-card-title">
                            <h3>
                                SAFE FOR YOU AND THE PLANET
                            </h3>
                        </div>
                        <div class="floating-shadow-box"></div>
                    </div>
                </div>
                <div class="normal-card col-md-3">
                    <div class="normal-card-content text-center">
                        <div class="normal-card-img-container">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="normal-card-title">
                            <h3>
                                UPTO 15-YEAR WARRANTY
                            </h3>
                        </div>
                        <div class="floating-shadow-box"></div>
                    </div>
                </div>
                <div class="normal-card col-md-3">
                    <div class="normal-card-content text-center">
                        <div class="normal-card-img-container">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="normal-card-title">
                            <h3>
                                EXCEPTIONAL CUSTOMER
                            </h3>
                        </div>
                        <div class="floating-shadow-box"></div>
                    </div>
                </div>
                <div class="normal-card col-md-3">
                    <div class="normal-card-content text-center">
                        <div class="normal-card-img-container">
                            <i class="fa-regular fa-share-from-square"></i>
                        </div>
                        <div class="normal-card-title">
                            <h3>
                                COMMUNICATION
                            </h3>
                        </div>
                        <div class="floating-shadow-box"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="https://comfort-mattress.com/product-category/mattress" class="shop-now-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>


    <!-- start Why Choose a Comfort Mattress? -->
    <section class="why-choose light-bg pt-4 pb-4">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Why Choose a Comfort Mattress?</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-lg-5 pt-3 d-none d-sm-none d-md-block">
                    <div class="why-choose-img-container">
                        <img src="{!! asset('assets/image/card-image/why-choose-a-comfort-mattress.png') !!}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pt-3">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <p>
                                <strong>Expert Design for Every Sleeper:</strong> From orthopedic mattresses that offer
                                extra support to soft memory foam mattresses that cradle your body, our collection is
                                designed to meet every type of sleeper's needs.
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <p>
                                <strong>Natural & Eco-Friendly Options:</strong> Our natural latex mattresses are not only
                                comfortable but also eco-friendly, making them a great choice for conscious consumers.
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <p>
                                <strong>Advanced Technology for Better Sleep:</strong> We incorporate temperature-regulating
                                materials,anti-allergen properties, and pressure-relief technologies in all our mattresses
                                to ensure you sleep soundly every night.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Why Choose a Comfort Mattress? -->


    <!-- start Shop Mattresses for Every Comfort Level -->
    <!--<section class="every-comfort-level pt-4 pb-4">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Shop Mattresses for Every Comfort Level</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line mb-4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row text-center d-flex justify-content-center">-->
    <!--            <div class="col-md-12 col-sm-6 mb-4">-->
    <!--                <div class="row align-items-center">-->
    <!--                    <div class="col-lg-6 col-md-6">-->
    <!--                        <h4 class="mb-3">Foam Mattresses</h4>-->
    <!--                        <div class="row">-->
    <!--                            <div class="d-block d-md-none mb-3">-->
    <!--                                <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/1.png') !!}" alt="">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p class="text-center mb-3">If you’re in need of extra support, our firm mattresses, like the-->
    <!--                            Nature Ortho, provide excellent back support while promoting better sleep posture.</p>-->
    <!--                        <div class="col text-center">-->
    <!--                            <a href="https://comfort-mattress.com/product-category/foam-mattress"-->
    <!--                                class="shop-now-btn">Shop Now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-6 col-md-6 d-none d-md-block">-->
    <!--                        <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/1.png') !!}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-12 col-sm-6 mb-4">-->
    <!--                <div class="row align-items-center">-->
    <!--                    <div class="col-lg-6 col-md-6 d-none d-md-block">-->
    <!--                        <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/2.png') !!}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-6 col-md-6">-->
    <!--                        <h4 class="mb-3">Soft Mattresses</h4>-->
    <!--                        <div class="row">-->
    <!--                            <div class="d-block d-md-none mb-3">-->
    <!--                                <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/2.png') !!}" alt="">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p class="text-center mb-3">For those who prefer a softer surface, our Comfort Plus and-->
    <!--                            Signature Unizone + 7 Zone mattresses offer luxurious comfort without compromising support.-->
    <!--                        </p>-->
    <!--                        <div class="col text-center">-->
    <!--                            <a href="https://comfort-mattress.com/product-category/memory-mattress"-->
    <!--                                class="shop-now-btn">Shop Now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-12 col-sm-6 mb-4">-->
    <!--                <div class="row align-items-center">-->
    <!--                    <div class="col-lg-6 col-md-6">-->
    <!--                        <h4 class="mb-3">Spring Mattresses</h4>-->
    <!--                        <div class="row">-->
    <!--                            <div class="d-block d-md-none mb-3">-->
    <!--                                <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/3.png') !!}" alt="">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <p class="text-center mb-3">Our Comfort Premium Spring Mattress combines the traditional bounce-->
    <!--                            of springs with the body-hugging properties of memory foam, providing a balanced sleep-->
    <!--                            experience.</p>-->
    <!--                        <div class="col text-center">-->
    <!--                            <a href="https://comfort-mattress.com/product-category/spring-mattress"-->
    <!--                                class="shop-now-btn">Shop Now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-6 col-md-6 d-none d-md-block">-->
    <!--                        <img src="{!! asset('assets/image/card-image/Shop-Mattresses-for-Every-Comfort-Level/3.png') !!}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end Shop Mattresses for Every Comfort Level -->

    <!-- start Best Mattress for Your Sleep Style -->
    <section class="your-sleep-style  pt-4 pb-4 ">
    <!--<section class="your-sleep-style light-bg pt-4 pb-4">-->
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Best Mattress for Your Sleep Style</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
                <div class="col-12">
                    <p>
                        Choosing the right mattress can depend on your sleeping position and body type. Our experts
                        recommend the following:
                    </p>
                </div>
            </div>
            <div class="row text-center d-flex justify-content-center equal-height-row mt-3">
                <div class="col-md-4 col-sm-6 card equal-height-col my-2 shadow">
                    <div class="row">
                        <div class="col card-body">
                            <h4 class="mb-2">Side Sleepers</h4>
                            <p class="text-center mb-2">The 7 Zone Natural Latex Mattress provides optimal pressure relief
                                for your shoulders and hips.</p>
                            <div class="col text-center">
                                <a href="https://comfort-mattress.com/product-category/mattress" class="shop-now-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 card equal-height-col my-2 shadow">
                    <div class="row">
                        <div class="col card-body">
                            <h4 class="mb-2">Back Sleepers</h4>
                            <p class="text-center mb-2">Our Ortho Super Deluxe and Dr. Ortho Mattresses are great choices
                                for maintaining spinal alignment.</p>
                            <div class="col text-center">
                                <a href="https://comfort-mattress.com/product-category/mattress" class="shop-now-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 card equal-height-col my-2 shadow">
                    <div class="row">
                        <div class="col card-body">
                            <h4 class="mb-2">Combination Sleepers</h4>
                            <p class="text-center mb-2">If you tend to move around while sleeping, the Comfort Memory Foam
                                Mattress adapts to your every move, ensuring uninterrupted rest.</p>
                            <div class="col text-center">
                                <a href="https://comfort-mattress.com/product-category/mattress" class="shop-now-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Best Mattress for Your Sleep Style -->


    <!-- start Comfort Mattress Reviews -->
    <!--<section class="mattress-reviews pt-4 pb-4">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Comfort Mattress Reviews</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line mb-4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <p>-->
    <!--                Comfort Mattress has earned a stellar reputation across Mumbai for its high-quality mattresses. Our-->
    <!--                customers frequently praise the comfort, durability, and excellent back support provided by our range of-->
    <!--                natural latex, memory foam, and orthopedic mattresses. Many of our clients mention that after switching-->
    <!--                to Comfort Mattress, their back pain has reduced significantly, and they’ve experienced better overall-->
    <!--                sleep quality.-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end Comfort Mattress Reviews -->

    <section class="why-youll-love dark-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Why you'll love the comfort mattress</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
            <div class="row">
                <p class="text-center">A comfortable night’s sleep is essential to our well-being, but many people settle
                    for less than they deserve when it comes to their mattress selection. If you’re ready to feel like your
                    old self again, or if you want the best night’s sleep of your life, then read on about what makes the <a
                        href="https://comfort-mattress.infinityplus1.in/product-category/latex-mattresses/"
                        target="_blank" rel="noopener">Comfort Mattress</a> so special and why it can help you get better
                    rest and relaxation than ever before!</p>
            </div>
        </div>
    </section>

    <section class="featurs-card-container pt-4">
        <div class="container owl-carousel owl-theme" id="slider-two">
            {{-- <div class="container"> --}}
            <div>
                <div class="row ps-5">
                    <div class="col-lg-6 pe-5">
                        <div class="web-logo-container">
                            <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="">
                        </div>
                        <div class="card-title mb-4">
                            <h3>
                                Comfort Signature
                            </h3>
                        </div>
                        <div class="blue-line"></div>
                        <div class="card-description">
                            <p class="mb-4">
                                Comfort Signature typically denotes a unique and recognizable set of features or qualities
                                that
                                define a product or experience as exceptionally comfortable. This term is often used in
                                marketing to emphasize the distinct comfort-related attributes that set a particular brand
                                or
                                product apart from others in the market.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-image-container">
                            <img src="{!! asset('assets/image/card-image/comfort-signature-card.png') !!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ps-5">
                    <div class="col-lg-6 pe-5">
                        <div class="web-logo-container">
                            <!--<img src="{asset('assets/image/logo/logo.png')}" alt="">-->
                            <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="">
                        </div>
                        <div class="card-title mb-4">
                            <h3>
                                ORGONOPEDIC MATTRESS
                            </h3>
                        </div>
                        <div class="blue-line"></div>
                        <div class="card-description">
                            <p class="mb-4">
                                An Orgonopedic Mattress is designed to provide orthopedic support and promote better spinal
                                alignment during sleep. Combining elements of orthopedics and ergonomics, these mattresses
                                aim
                                to enhance comfort and alleviate back and joint pain. They are crafted to support overall
                                body
                                wellness and improve sleep quality.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-image-container">
                            <img src="{!! asset('assets/image/card-image/orgonopedic-mattress-card.png') !!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ps-5">
                    <div class="col-lg-6 pe-5">
                        <div class="web-logo-container">
                            <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="">
                        </div>
                        <div class="card-title mb-4">
                            <h3>
                                7 Zone Natural Latex
                            </h3>
                        </div>
                        <div class="blue-line"></div>
                        <div class="card-description">
                            <p class="mb-4">
                                7 Zonal Natural Latex is a manufacturing process that divides rubber trees into seven zones
                                for
                                efficient latex extraction, ensuring quality through selective tapping. This method promotes
                                sustainability, minimizing environmental impact and supporting responsible latex production.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-image-container">
                            <img src="{!! asset('assets/image/card-image/7-zone-natural-card.png') !!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ps-5">
                    <div class="col-lg-6 pe-5">
                        <div class="web-logo-container">
                            <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="">
                        </div>
                        <div class="card-title mb-4">
                            <h3>
                                Nature Cool
                            </h3>
                        </div>
                        <div class="blue-line"></div>
                        <div class="card-description">
                            <p class="mb-4">
                                Nature Cool typically refers to products or materials designed to have cooling properties
                                inspired by natural elements. These innovations aim to provide comfort through temperature
                                regulation, often leveraging breathable fabrics or technologies that mimic cooling effects
                                found
                                in nature.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-image-container">
                            <img src="{!! asset('assets/image/card-image/nature-cool-card.png') !!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ps-5">
                    <div class="col-lg-6 pe-5">
                        <div class="web-logo-container">
                            <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="">
                        </div>
                        <div class="card-title mb-4">
                            <h3>
                                Comfort premium
                            </h3>
                        </div>
                        <div class="blue-line"></div>
                        <div class="card-description">
                            <p class="mb-4">
                                Comfort Premium typically signifies a higher tier or quality level in products associated
                                with
                                comfort, such as mattresses, bedding, or furniture. It suggests superior materials,
                                construction, or features that enhance the overall comfort experience. Brands often use
                                "Comfort
                                Premium" to convey a heightened standard of luxury and satisfaction.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-image-container">
                            <img src="{!! asset('assets/image/card-image/comfort-premium-card.png') !!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- start Shop Comfort Mattresses for Every Budget -->
    <!--<section class="for-every-budget light-bg pt-4 pb-4">-->
    <!--    <div class="container">-->
    <!--        <div class="row text-center">-->
    <!--            <div class="col">-->
    <!--                <div class="web-title">-->
    <!--                    <h3>COMFORT - MATTRESS</h3>-->
    <!--                </div>-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Shop Comfort Mattresses for Every Budget</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12">-->
    <!--                <div class="long-line"></div>-->
    <!--                <div class="short-line mb-4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <p>-->
    <!--                We believe that a premium mattress doesn’t need to come with a premium price tag. At Comfort Mattress,-->
    <!--                we offer affordable, high-quality mattresses that cater to every budget, whether you’re looking for a-->
    <!--                foam mattress, spring mattress, or latex mattress. Enjoy free shipping and exclusive offers when you-->
    <!--                shop online with us.-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end Shop Comfort Mattresses for Every Budget -->


    <!-- start Upgrade to Comfort Mattress Today -->
    <section class="upgrade-today pt-4 pb-4">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Upgrade to Comfort Mattress Today</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line mb-4"></div>
                </div>
            </div>
            <div class="row">
                <p>
                    Why settle for less when you can experience the best? Upgrade your sleep quality with a mattress from <a
                        href="https://comfort-mattress.com/product-category/memory-mattress"> Comfort Mattress </a> today.
                    Whether you prefer a soft, memory foam mattress, a natural latex option, or an orthopedic mattress for
                    back pain, we have the perfect solution to meet your needs.
                </p>
            </div>
        </div>
    </section>
    <!-- end Upgrade to Comfort Mattress Today -->

    <section style="padding: 30px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="absolute-image-container text-center">
                        <img src="{!! asset('assets/image/card-image/8/THE-PROBLEM-WITH-STANDARD.png') !!}" alt="">
                        <div class="absolute-image-description">
                            <h4>THE PROBLEM WITH STANDARD MATTRESSES</h4>
                            <p>
                                Standard mattresses often lack adequate support and may contribute to discomfort or back
                                pain. Additionally, they can harbor allergens and pose environmental concerns due to the
                                materials used in their production.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="absolute-image-container text-center">
                        <img src="{!! asset('assets/image/card-image/8/THE-SOLUTION.png') !!}" alt="">
                        <div class="absolute-image-description">
                            <h4>THE SOLUTION</h4>
                            <p>
                                The best way to get a good night’s sleep is by investing in a comfort mattress. A foam
                                mattress is ideal for those who want a comfortable, supportive surface to sleep on. Plus,
                                buying a comfort mattress can save your money.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="absolute-image-container text-center">
                        <img src="{!! asset('assets/image/card-image/8/SCIENTIFICALLY-PROVEN-BENEFITS.png') !!}" alt="">
                        <div class="absolute-image-description">
                            <h4>SCIENTIFICALLY PROVEN BENEFITS</h4>
                            <p>
                                Scientifically proven benefits highlight the efficacy of specific interventions or
                                practices, providing empirical evidence for their positive impact on health, well-being, or
                                other measurable outcomes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="absolute-image-container text-center">
                        <img src="{!! asset('assets/image/card-image/8/BUY-NOW-OR-REGRET.png') !!}" alt="">
                        <div class="absolute-image-description">
                            <h4>BUY NOW OR REGRET LATER</h4>
                            <p>
                                This luxurious soft mattress is designed for ultimate comfort. The comfort mattress is
                                perfect for any sleeping position, so you can rest easy no matter how you like to sleep. And
                                at an affordable price, there’s no reason not to buy mattress online in Mumbai. So don’t
                                wait any longer, order your comfort mattress online today!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="absolute-image-container text-center">
                                <img src="{!! asset('assets/image/card-image/8/BUY-NOW-OR-REGRET.png') !!}" alt="">
                                <div class="absolute-image-description">
                                    <h4>BUY NOW OR REGRET LATER</h4>
                                    <p>
                                        This luxurious soft mattress is designed for ultimate comfort. The comfort mattress is
                                        perfect for any sleeping position, so you can rest easy no matter how you like to sleep. And
                                        at an affordable price, there’s no reason not to buy mattress online in Mumbai. So don’t
                                        wait any longer, order your comfort mattress online today!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="absolute-image-container text-center">
                                <img src="{!! asset('assets/image/card-image/8/SPECIAL-OFFER-FOR-MY-READERS.png') !!}" alt="">
                                <div class="absolute-image-description">
                                    <h4>SPECIAL OFFER FOR MY READERS</h4>
                                    <p>
                                        Comfort mattress is now available online. To sweeten the deal, I’m offering a special
                                        discount to my readers. For a limited time, you can get 25% off your purchase of a comfort
                                        mattress. Check out our innovative product and take advantage of this great offer today.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
        </div>
    </section>
    <section class="review-section ">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>Blogs</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <div class=" owl-carousel owl-theme" id="blogs">
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs15')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-12.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs15')}}">
                            <h2 class="home-blog-card-heading">
                              How to Find the Best Mattress Manufacturer in Mumbai?
                            </h2></a>
                            <p class="home-blog-card-info">
                            Choosing the right mattress is an important decision because a mattress affects more than just
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs15')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs12')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-12.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs12')}}">
                            <h2 class="home-blog-card-heading">
                              Dr Orthopedic Mattress: Features, Benefits & Buying Guide
                            </h2></a>
                            <p class="home-blog-card-info">
                            In today’s fast-paced lifestyle, back pain and poor sleep quality have become common problems. 
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs12')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs11')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-11.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs11')}}">
                            <h2 class="home-blog-card-heading">
                              What is a Latex Mattress? Benefits, Types & Buying Guide in Mumbai
                            </h2></a>
                            <p class="home-blog-card-info">
                            A good mattress is essential for quality sleep and overall health. With increasing awareness about sleep wellness, many people are now switching 
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs11')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs1')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-1.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs1')}}">
                            <h2 class="home-blog-card-heading">
                              Why a Latex Mattress is the Best Choice for Healthy & Comfortable Sleep
                            </h2></a>
                            <p class="home-blog-card-info">
                            The Ultimate Guide to Choosing the Perfect Latex Mattress in Mumbai: When it comes to quality sleep, your mattress plays a vital role. Among the many options available
                
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs1')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs2')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-2.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs2')}}">
                            <h2 class="home-blog-card-heading">
                              Say Goodbye to Back Pain with the Right Orthopedic Mattress
                            </h2>
                            </a>
                            <p class="home-blog-card-info">
                            Why an Orthopedic Mattress is the Best Mattress for Back Pain Relief: Back pain is one of the most common health issues affecting people of all ages, especially in urban
                
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs2')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs3')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-3.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                              <a href="{{route('blogs3')}}">
                            <h2 class="home-blog-card-heading">
                              The Natural Making of a 100% Latex Mattress
                            </h2>
                              </a>
                            <p class="home-blog-card-info">
                            At Comfort Mattress, we craft every mattress from 100% natural latex, sustainably sourced for pure, chemical-free sleep. Enjoy exceptional comfort and breathability.</p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs3')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs4')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-4.png')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs4')}}">
                            <h2 class="home-blog-card-heading">
                                Why a Dr Ortho Mattress Is the Best Choice for Back Pain Relief
                            </h2>
                            </a>
                            <p class="home-blog-card-info">
                                Wake up pain-free with a Dr Ortho mattress from Comfort Mattress. Expertly designed for spinal support, it’s the ideal choice for those seeking relief from back pain and discomfort.
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs4')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 home-blog-card mb-20 card-hover">
                          <div class="home-blog-card-img-container">
                            <a href="{{route('blogs5')}}">
                            <img src="{{asset('assets/image/blog-image/comfort-blog-5.webp')}}" alt="">
                            </a>
                          </div>
                          <div class="home-blog-card-content p-20">
                            <a href="{{route('blogs5')}}">
                            <h2 class="home-blog-card-heading">
                                What to look for in a mattress?
                            </h2>
                            </a>
                            <p class="home-blog-card-info">
                                Finding the right mattress can feel overwhelming. With so many brands, materials, and prices, it’s easy to get confused. But your mattress plays a huge role in your sleep quality.
                            </p>
                            <div class="home-blog-card-btn">
                              <a href="{{route('blogs5')}}" class="home-blog-card-read-more-btn">Read More</a>
                            </div>
                          </div>
                        </div>
                        <!--<div class="home-blog-card mb-20 card-hover">-->
                        <!--    <div class="home-blog-card-img-container"> <a-->
                        <!--            href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep">-->
                        <!--            <img src="https://comfort-mattress.com/assets/image/card-image/8/BUY-NOW-OR-REGRET.png"-->
                        <!--                alt=""> </a>-->
                        <!--    </div>-->
                        <!--    <div class="home-blog-card-content p-20">-->
                        <!--        <h2 class="home-blog-card-heading"> Why a Latex Mattress is the Best Choice for Healthy-->
                        <!--            &amp; Comfortable-->
                        <!--            Sleep </h2>-->
                        <!--        <p class="home-blog-card-info"> The Ultimate Guide to Choosing the Perfect Latex Mattress-->
                        <!--            in Mumbai: When it-->
                        <!--            comes to quality sleep, your mattress plays a vital role. Among the many options-->
                        <!--            available </p>-->
                        <!--        <div class="home-blog-card-btn"> <a-->
                        <!--                href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep"-->
                        <!--                class="home-blog-card-read-more-btn">Read More</a> </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <div class="home-blog-card mb-20 card-hover">-->
                        <!--    <div class="home-blog-card-img-container"> <a-->
                        <!--            href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep">-->
                        <!--            <img src="https://comfort-mattress.com/assets/image/card-image/8/BUY-NOW-OR-REGRET.png"-->
                        <!--                alt=""> </a>-->
                        <!--    </div>-->
                        <!--    <div class="home-blog-card-content p-20">-->
                        <!--        <h2 class="home-blog-card-heading"> Why a Latex Mattress is the Best Choice for Healthy-->
                        <!--            &amp; Comfortable-->
                        <!--            Sleep </h2>-->
                        <!--        <p class="home-blog-card-info"> The Ultimate Guide to Choosing the Perfect Latex Mattress-->
                        <!--            in Mumbai: When it-->
                        <!--            comes to quality sleep, your mattress plays a vital role. Among the many options-->
                        <!--            available </p>-->
                        <!--        <div class="home-blog-card-btn"> <a-->
                        <!--                href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep"-->
                        <!--                class="home-blog-card-read-more-btn">Read More</a> </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <div class="home-blog-card mb-20 card-hover">-->
                        <!--    <div class="home-blog-card-img-container"> <a-->
                        <!--            href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep">-->
                        <!--            <img src="https://comfort-mattress.com/assets/image/card-image/8/BUY-NOW-OR-REGRET.png"-->
                        <!--                alt=""> </a>-->
                        <!--    </div>-->
                        <!--    <div class="home-blog-card-content p-20">-->
                        <!--        <h2 class="home-blog-card-heading"> Why a Latex Mattress is the Best Choice for Healthy-->
                        <!--            &amp; Comfortable-->
                        <!--            Sleep </h2>-->
                        <!--        <p class="home-blog-card-info"> The Ultimate Guide to Choosing the Perfect Latex Mattress-->
                        <!--            in Mumbai: When it-->
                        <!--            comes to quality sleep, your mattress plays a vital role. Among the many options-->
                        <!--            available </p>-->
                        <!--        <div class="home-blog-card-btn"> <a-->
                        <!--                href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep"-->
                        <!--                class="home-blog-card-read-more-btn">Read More</a> </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <div class="home-blog-card mb-20 card-hover">-->
                        <!--    <div class="home-blog-card-img-container"> <a-->
                        <!--            href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep">-->
                        <!--            <img src="https://comfort-mattress.com/assets/image/card-image/8/BUY-NOW-OR-REGRET.png"-->
                        <!--                alt=""> </a>-->
                        <!--    </div>-->
                        <!--    <div class="home-blog-card-content p-20">-->
                        <!--        <h2 class="home-blog-card-heading"> Why a Latex Mattress is the Best Choice for Healthy-->
                        <!--            &amp; Comfortable-->
                        <!--            Sleep </h2>-->
                        <!--        <p class="home-blog-card-info"> The Ultimate Guide to Choosing the Perfect Latex Mattress-->
                        <!--            in Mumbai: When it-->
                        <!--            comes to quality sleep, your mattress plays a vital role. Among the many options-->
                        <!--            available </p>-->
                        <!--        <div class="home-blog-card-btn"> <a-->
                        <!--                href="https://comfort-mattress.com/why-a-latex-mattress-is-the-best-choice-for-healthy-&amp;-comfortable-sleep"-->
                        <!--                class="home-blog-card-read-more-btn">Read More</a> </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-section dark-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>FAQ</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
            <div class="row">
                <!--<div class="col-md-5">-->
                <!--    <img src="{!! asset('assets/image/card-image/750x900.png') !!}" alt="">-->
                <!--</div>-->
                <div class="col-12 mb-5">
                    <h3>Choosing the Right Mattress</h3>
                    <p class="mb-3">Guidance + buying decisions</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    How can I choose the right mattress thickness?
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Comfort Mattress offers various thickness options, from 4 to 6 inches, across different
                                                    models. Thicker mattresses provide more plushness and support, while thinner options are
                                                    suitable for lighter individuals or children.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseThree">
                                                    How to Choose the Right Mattress Size?
                                                </button>
                                            </h2>
                                            <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Choosing the right mattress size depends on your sleeping habits, room size, and
                                                    personal preferences. Consider factors such as your height, whether you sleep alone or
                                                    with a partner, and available space.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseThree">
                                                    What Should I Look for When Buying a Mattress Online?
                                                </button>
                                            </h2>
                                            <div id="collapseEleven" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    When buying a mattress online, consider factors like material quality, firmness level,
                                                    warranty, return policy, and customer reviews. Ensure you select a brand that
                                                    prioritizes comfort and durability.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseThree">
                                                    How to Identify the Right Firmness for Your Sleeping Position?
                                                </button>
                                            </h2>
                                            <div id="collapseTwelve" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Firmness preferences vary based on sleeping positions: side sleepers often prefer softer
                                                    mattresses for pressure relief, while back and stomach sleepers may benefit from firmer
                                                    support.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <h3>Mattress Types & Materials</h3>
                    <p class="mb-3">Product education</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                    What is Natural Latex Technology?
                                                </button>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Natural latex technology utilizes 100% organic latex derived from rubber trees, offering
                                                    superior comfort and support while being environmentally friendly.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                                    What are the Key Features of Natural Latex Mattresses?
                                                </button>
                                            </h2>
                                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Natural latex mattresses are breathable, hypoallergenic, and resistant to dust mites and
                                                    mold. They provide excellent body support, pressure relief, and durability.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseThree">
                                                    What Makes Memory Foam Unique?
                                                </button>
                                            </h2>
                                            <div id="collapseNine" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Memory foam contours to your body's shape, providing customized support and relieving
                                                    pressure points. It is ideal for those seeking enhanced comfort and pain relief.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                                                    What are the Benefits of Using Natural Latex in Mattresses?
                                                </button>
                                            </h2>
                                            <div id="collapseSeven" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Natural latex promotes healthy sleep by providing optimal spinal alignment, reducing
                                                    motion transfer, and offering a cooler sleeping surface. It's also sustainable and
                                                    biodegradable.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseThree">
                                                    How Do Pocket Spring Mattresses Work?
                                                </button>
                                            </h2>
                                            <div id="collapseEight" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Pocket spring mattresses consist of individually wrapped coils that move independently,
                                                    providing targeted support and reducing motion transfer for a restful night's sleep.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <h3>Orders, Delivery & Returns</h3>
                    <p class="mb-3">All transactional + policies in one place</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Are custom sizes available for Comfort Mattress products?
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Yes, we offer custom sizing for all our mattress models to ensure that you get the
                                                    perfect fit for your bed frame. Contact us at +91 7045945037 for custom orders.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFifteen" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Does Comfort Mattress offer free shipping?
                                                </button>
                                            </h2>
                                            <div id="collapseFifteen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Yes, we provide free shipping on all our mattresses, ensuring a hassle-free shopping experience. Our products are delivered right to your doorstep.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFifteen" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    What is Your Return Policy?
                                                </button>
                                            </h2>
                                            <div id="collapseFifteen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    We offer a hassle-free return policy to ensure our customers are completely satisfied
                                                    with their purchase. If you are not happy with your mattress, you can initiate a return
                                                    within 30 days of delivery.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h3>Care, Longevity & Brand</h3>
                    <p class="mb-3">Post-purchase + trust</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThirteen" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    How to Care for and Maintain My Mattress?
                                                </button>
                                            </h2>
                                            <div id="collapseThirteen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Regularly rotate your mattress to prevent uneven wear, use a mattress protector to keep
                                                    it clean, and follow care instructions for specific materials to ensure longevity.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                    What makes Comfort Mattress a trusted brand?
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Comfort Mattress combines premium materials, advanced mattress technology, and a
                                                    customer-first approach to deliver high-quality sleep solutions. Our mattresses are
                                                    designed for long-lasting comfort, ensuring you wake up feeling refreshed.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFourteen" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    What are the Signs That It’s Time to Replace My Mattress?
                                                </button>
                                            </h2>
                                            <div id="collapseFourteen" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Signs it’s time to replace your mattress include visible sagging, persistent discomfort,
                                                    allergies acting up, and waking up feeling tired. Generally, mattresses should be
                                                    replaced every 7-10 years.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row">-->
            <!--    <p class="text-center mt-3">-->
            <!--        To qualify for a return, the mattress must be in its original condition and packaging. Please note that-->
            <!--        certain conditions apply, and we recommend reviewing our return policy on our website for detailed-->
            <!--        instructions. Our customer service team is here to assist you throughout the return process, making it-->
            <!--        as smooth as possible. Your comfort is our priority!-->
            <!--    </p>-->
            <!--</div>-->
        </div>
    </section>

     <section class="review-section light-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="web-title">
                        <h3>COMFORT - MATTRESS</h3>
                    </div>
                    <div class="section-title">
                        <h2>View the reasons why our products are so popular.</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <div class="customer-review-card-container owl-carousel owl-theme" id="slider-one">
                        <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Rahul Dharia</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>Very good! <br>Fabulous and fantastic experience from the pitch to the closure of the
                                    sale. <br>Delighted.</p>
                            </div>
                        </div>
                        <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Satyam Sharma</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>Amazing comfort and back support! Their natural latex and orthopedic mattresses are durable and really improved my sleep and reduced back pain. Highly recommended!</p>
                                <!--<p>Comfort Mattress has earned a stellar reputation across Mumbai for its high-quality mattresses. Our customers frequently praise the comfort, durability, and excellent back support provided by our range of natural latex, memory foam, and orthopedic mattresses. Many of our clients mention that after switching to Comfort Mattress, their back pain has reduced significantly, and they’ve experienced better overall sleep quality.</p>-->
                            </div>
                        </div>
                                                <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Akash Bhatt</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>I am really happy and satisfied with the service. He knows exactly what you need and
                                    delivers the same. Highly recommended! Great work.</p>
                            </div>
                        </div>
                        <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Rizwan Sheikh</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>Why settle for just 'SUNDAY' when you can have 'COMFORT' the whole week, <br> month, and
                                    years? Fabulous and fantastic experience.</p>
                            </div>
                        </div>
                        <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Anil Yadav</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>Excellent service.<br> Special thanks to Mr. Faiz. You have made us fans of COMFORT.
                                    Great mattress! <br>Wow!</p>
                            </div>
                        </div>
                        <div class="customer-review-card text-center">
                            <div class="author-img">
                                <img src="{!! asset('assets/image/user.png') !!}" alt="">
                            </div>
                            <div class="author-name">Dhorajiwala Mohammed</div>
                            {{-- <div class="author-des">Customer</div> --}}
                            <ul class="customer-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            <div class="customer-review">
                                <p>Life is about comfort, <br> and I really found it here. My dreams are filled with
                                    happiness. Thanks to the latex I bought from Comfort.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <!-- service start -->
    <section class="home5-service section-tb-padding pt-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="service">
                        <div class="service-box">
                            <div class="s-box">
                                <!--<i class="ti-truck"></i>-->
                                <i class="fa-solid fa-truck"></i>
                                <div class="service-content">
                                    <span>FREE SHIPPING</span>
                                    <p>Free shipping for all orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <!--<i class="ti-money"></i>-->
                                <i class="fa-solid fa-rotate-left"></i>
                                <div class="service-content">
                                    <span>EASY RETURNS</span>
                                    <p>Returns made easy peasy</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <!--<i class="ti-email"></i>-->
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <div class="service-content">
                                    <span>BEST PRICE GUARANTEE</span>
                                    <p>Our products are lower than retail.</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <!--<i class="ti-headphone"></i>-->
                                <i class="fa-solid fa-headphones"></i>
                                <div class="service-content">
                                    <span>Quality support</span>
                                    <p>Always online 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service end -->





    <!-- deal of the day start -->
    @if (!empty($homeOfferSliders))
        @foreach ($homeOfferSliders as $homeOfferSlider)
            <section class="deal-day5">
                <div class="deal5-back" style="background-image: url({!! asset('storage/images/home-offer-sliders/' . $homeOfferSlider->image_url) !!});">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="deal-area5">
                                    {{-- <div class="deal-content">
                            <h2>Deal of the day! <span>Sale</span></h2>
                            <span class="deal-slogan">We offer a hot deal offer every festival</span>
                        </div>
                        <ul class="contdown_row">
                            <li class="countdown_section">
                                <span id="days" class="countdown_timer">254</span>
                                <span class="countdown_title">Days</span>
                            </li>
                            <li class="countdown_section">
                                <span id="hours" class="countdown_timer">11</span>
                                <span class="countdown_title">Hours</span>
                            </li>
                            <li class="countdown_section">
                                <span id="minutes" class="countdown_timer">33</span>
                                <span class="countdown_title">Minutes</span>
                            </li>
                            <li class="countdown_section">
                                <span id="seconds" class="countdown_timer">36</span>
                                <span class="countdown_title">Seconds</span>
                            </li>
                        </ul> --}}
                                    @if (!empty($homeOfferSlider->url))
                                        <a href="{{ $homeOfferSlider->url }}" class="btn btn-style1">Shop collection</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif
    <!-- deal of the day end -->

    <!-- banner start -->
    {{-- <section class="banner-7 section-t-padding">
        <div class="all-banner">
            <div class="banner-area">
                <div class="banner-grid">
                    <img src="{!! asset('assets/image/layout-7/banner33.jpg') !!}" class="img-fluid" alt="banner-image">
                    <a href="{{ route('cate', 'namkeens-1') }}" class="btn btn-style3">Shop now</a>
                </div>
            </div>
            <div class="banner-area">
                <div class="off-banner">
                    <img src="{!! asset('assets/image/layout-7/banner32.jpg') !!}" class="img-fluid" alt="banner-image">
                    <div class="banner-content">
                        <span class="bannre-title">It'z Shopping time</span>
                        <h2>We deliver <span class="b-off">best product at your door</span></h2>
                    </div>
                </div>
            </div>
            <div class="banner-area">
                <div class="banner-grid">
                    <img src="{!! asset('assets/image/layout-7/banner34.jpg') !!}" class="img-fluid" alt="banner-image">
                    <a href="{{ route('cate', 'namkeens-1') }}" class="btn btn-style3">Shop now</a>
                </div>
            </div>
            <div class="banner-area">
                <div class="banner-grid">
                    <img src="{!! asset('assets/image/layout-7/banner35.jpg') !!}" class="img-fluid" alt="banner-image">
                    <a href="{{ route('cate', 'namkeens-1') }}" class="btn btn-style3">Shop now</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- banner end -->

    <!-- testimonial start -->
    @if (count($reviews))
        <section class="testimonial-6 section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>What Customers Say ?</h2>
                        </div>
                        <div class="testi-6 owl-carousel owl-theme">
                            @foreach ($reviews as $review)
                                <div class="items">
                                    <div class="testimonial-content">
                                        <div class="testimonial-area">
                                            <div class="testi-name">
                                                <span class="tsti-title">{{ $review->name }}</span>
                                                @if ($review->rating)
                                                    <span>
                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                            <i class="fa fa-star e-star"></i>
                                                        @endfor
                                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                            <i class="fa fa-star-o"></i>
                                                        @endfor
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                        <h6>{{ $review->product ? $review->product->title : 'Unknown' }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- testimonial end -->

    <!-- home banner start -->
    {{-- <section class="home-banner section-b-padding">
    <div class="banner-area">
        <div class="banner-item banner-1">
            <a href="javascript:void(0)" class="banner-url">
                <img src="{!! asset('assets/image/home-10/banner-1.jpg') !!}" class="img-fluid" alt="image">
            </a>
            <div class="banner-text">
                <span class="sub-title">Get up to 30% off</span>
                <h1 class="title">
                    <span class="bold-text">Brussels</span>
                    <span>foods</span>
                </h1>
                <a href="{{ route('cate', 'namkeens-1') }}" class="btn-style2">Buy now</a>
            </div>
        </div>
        <div class="banner-item banner-2">
            <a href="javascript:void(0)" class="banner-url">
                <img src="{!! asset('assets/image/home-10/banner-2.jpg') !!}" class="img-fluid" alt="image">
            </a>
            <div class="banner-text">
                <h1 class="title">
                    <span class="bold-text">Fresh</span>
                    <span>farm</span>
                </h1>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="video-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play">
                        <polygon points="5 3 19 12 5 21 5 3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- model video start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </a>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.youtube.com/embed/gee7LfsxIa8" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- model video end -->
</section> --}}
    <!-- home banner end -->
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="d-flex bg-white border border-danger border-5">
                <!--<div class="modal-image-container">-->
                <!--    <img src="{!! asset('assets/image/card-image/enquiry-form-bed.png') !!}" alt="">-->
                        <!--<img src="https://placehold.co/500x526" alt="">-->
                    <!--<div class="position-absolute top-0 left-0">-->
                    <!--</div>-->
                <!--</div>-->
                <div class="modal-content rounded-0 border-0" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <form action="{{ route('mail') }}" method="post" class="modal-body pb-0">
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone no.</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone no">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="g-recaptcha mb-5" style="transform:scale(0.77);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="6LeoZPsqAAAAAFfWf3hqreMIrKwSCja8gvSavudS"></div>
                            </div>
                             <div class="modal-footer pt-0 border-0">
                            <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                            <button type="submit" class="btn shop-now-btn mx-auto">Submit</button>
                        </div>
                    </form>
                   
                </div>
            </div>
          </div>
    </div>
@endsection
@section('extracss')
    <style>
        .home-slider-5 .home-slider-main-5 .home5-slider .img-back {
            width: 100% !important;
        }
    </style>
@endsection
@section('extrajs')
    <script>
        $(document).ready(function() {
            var why_choose = $("#why-choose-slider");
            var blogs = $("#blogs");
            var one = $("#slider-one");
            var two = $("#slider-two");
            var two = $("#slider-two");

            why_choose.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    600: {
                        items: 1,
                        nav: false,
                    },
                    786: {
                        items: 1,
                        // nav: true,
                    },
                    900: {
                        items: 1,
                        // nav: true,
                    },
                    1000: {
                        items: 1,
                        // nav: true,
                    }
                }
            });


            blogs.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    600: {
                        items: 1,
                        nav: false,
                    },
                    786: {
                        items: 2,
                        // nav: true,
                    },
                    900: {
                        items: 3,
                        // nav: true,
                    },
                    1000: {
                        items: 3,
                        // nav: true,
                    }
                }
            });


            one.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    600: {
                        items: 1,
                        nav: false,
                    },
                    786: {
                        nav: true,
                    },
                    900: {
                        items: 1,
                        nav: true,
                    },
                    1000: {
                        items: 1,
                        nav: true,
                    }
                }
            });
            two.owlCarousel({
                loop: true,
                margin: 10,
                // nav: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
            var ytSection = $('#yt-video-section');
            
            ytSection.owlCarousel({
              loop: true,
              margin: 15,
              nav: false,
              dots: false,
              autoplay: true,
              autoplayTimeout: 2000,     
              autoplayHoverPause: true,  
              responsive: {
                0: {
                  items: 1
                },
                576: {
                  items: 2
                },
                768: {
                  items: 3
                },
                992: {
                  items: 4
                }
              }
            });

    </script>
      <script>
        let modalOpenedByUser = false;

        document.getElementById('enquireButton').addEventListener('click', function() {
            modalOpenedByUser = true;
        });


        window.onload = function() {
            setTimeout(function() {
                if (!modalOpenedByUser) {  
                    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    myModal.show();
                }
            }, 2000); 
        };
    </script>


@endsection
