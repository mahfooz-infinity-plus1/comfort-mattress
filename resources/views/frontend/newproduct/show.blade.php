@extends('layouts.master')
@section('meta_title')
    {{ $product->meta_title }}
@endsection
@section('meta_keywords')
    {{ $product->meta_keywords }}
@endsection
@section('meta_canonical')
    {{ $product->meta_canonical }}
@endsection
@section('meta_description')
    {{ $product->meta_description }}
@endsection
@section('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-start">
                        <ul class="breadcrumb-url">
                            <li class="breadcrumb-url-li">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-url-li">
                                <span>{{ $product->title }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product info start -->
    <section class="section-tb-padding pro-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 pro-image">
                    <div class="row">
                        <div class="col-lg-5 col-xl-5 col-md-6 col-12 col-xs-12 larg-image">
                            <div class="tab-content large_image">

                            </div>
                            <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme thumb_image">

                            </ul>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info">
                            <h1>{{ $product->title }}</h1>
                            @if ($product->categories->count() > 0)
                                <span class="pro-details">
                                    @foreach ($product->categories as $index => $cat)
                                        <a href="{{ route('cate', [$cat->slug_url]) }}" class="mb--10 text-black">
                                            <span>{{ $cat->name }}</span>
                                        </a>{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </span>
                            @elseif ($product->category)
                                <span class="pro-details">
                                    <a href="{{ route('cate', [$product->category->slug_url]) }}"
                                        class="mb--10 text-black">
                                        <span>{{ $product->category->name }}</span>
                                    </a>
                                </span>
                            @endif
                            {{-- temperory comment  --}}
                            {{-- @if ($product->review_status)
                                <div class="rating">
                                    @for ($i = 1; $i <= $product->reviews->avg('rating'); $i++)
                                        <i class="fa fa-star d-star"></i>
                                    @endfor
                                    @for ($i = 1; $i <= 5 - $product->reviews->avg('rating'); $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor

                                    @if ($product->reviews->count('id'))
                                        <a href="javascript:void(0)" id="writeReview">({{ $product->reviews->count('id') }}
                                            customer
                                            review)</a>
                                    @endif
                                </div>
                            @endif --}}
                            @if (!in_array($product->id, [25]))
                                <div class="pro-price">
                                    <span class="old-price">
                                        <del>

                                            {{-- <i class="fa fa-inr"></i> {{ $product->colors[0]->starting_price }} --}}
                                            Rs. {{ $product->colors[0]->starting_price }}
                                        </del>
                                    </span>
                                    <span class="new-price">Rs. {{ $product->colors[0]->mrp }}</span> + Free Shipping
                                    {{-- temperory comment  --}}
                                    @php
                                        // dd($product->colors[0]->starting_price);
                                        $getDiff = $product->colors[0]->starting_price - $product->colors[0]->mrp;
                                        $getOffer = round(($getDiff / $product->colors[0]->starting_price) * 100, 0);
                                    @endphp
                                    <div class="Pro-lable mt-2">
                                        <span class="p-discount"> {{ $getOffer }}% off</span>
                                    </div>
                                </div>
                            @endif
                            <!--@if ($product->description)-->
                            <!--    <div class="product-description">-->
                            <!--        {!! $product->description !!}-->
                            <!--    </div>-->
                            <!--@endif-->
                            
                            <!-- =============== read more read less btn here ============ -->
                                                        @if ($product->description)
                                <style>
                                    .desc-content-{{ $product->id }} {
                                        display: -webkit-box;
                                        -webkit-line-clamp: 5;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;
                                    }
                                    .desc-content-{{ $product->id }}.expanded {
                                        display: block;
                                        -webkit-line-clamp: unset;
                                    }
                                    .read-more-btn-{{ $product->id }} {
                                        color: #07498c; /* Matches your theme color */
                                        cursor: pointer;
                                        font-weight: 600;
                                        display: none;
                                        margin-top: 8px;
                                        text-decoration: underline;
                                        border: none;
                                        background: transparent;
                                        padding: 0;
                                    }
                                </style>
                                <div class="product-description">
                                    <div class="desc-content-{{ $product->id }}" id="descContent-{{ $product->id }}">
                                        {!! $product->description !!}
                                    </div>
                                    <button type="button" class="read-more-btn-{{ $product->id }}" id="readMoreBtn-{{ $product->id }}">Read more</button>
                                </div>
                                <script>
                                    (function() {
                                        function initReadMore() {
                                            var content = document.getElementById("descContent-{{ $product->id }}");
                                            var btn = document.getElementById("readMoreBtn-{{ $product->id }}");
                                            
                                            if (content && btn) {
                                                // Slight delay to ensure content is fully rendered before calculating height
                                                setTimeout(function() {
                                                    if (content.scrollHeight > content.clientHeight) {
                                                        btn.style.display = "inline-block";
                                                    }
                                                }, 100);
                                                
                                                btn.addEventListener("click", function() {
                                                    content.classList.toggle("expanded");
                                                    if (content.classList.contains("expanded")) {
                                                        btn.innerText = "Read less";
                                                    } else {
                                                        btn.innerText = "Read more";
                                                    }
                                                });
                                            }
                                        }
                                        
                                        if (document.readyState === "loading") {
                                            document.addEventListener("DOMContentLoaded", initReadMore);
                                        } else {
                                            initReadMore();
                                        }
                                    })();
                                </script>
                            @endif

                            
                            @if (!in_array($product->id, [25]))
                                <div class="pro-availabale">
                                    @if ($product->colors[0]->stock <= 0)
                                        <span class="available">Availability:</span>
                                        <span class="pro-instock text-danger">
                                            <i class="ti-close"></i> Out of Stock
                                        </span>
                                    @else
                                        <span class="available">Availability:</span>
                                        <span class="pro-instock text-success">
                                            <i class="ti-check-box"></i> In stock
                                            {{-- @if ($product->isCodAvailable)
                                    <span class="text-success">
                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        | Cash on Delivery Available
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                        | Cash on Delivery Not Available
                                    </span>
                                    @endif --}}
                                        </span>
                                    @endif
                                </div>
                            @endif
                            {{-- {{ dd($product) }}
                            @if (count($product->sizes) > 0)
                                <div class="pro-items">
                                    <span class="pro-size">Size:</span>
                                    <ul class="pro-wight">
                                        @foreach ($product->sizes as $key => $item)
                                            @if (!empty($product->unit))
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="size_btn {{ $key == 0 ? 'active' : '' }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{ $item->title . ' ' . $product->unit->unit }}"
                                                        data-size-id="{{ $item->size_id }}"
                                                        data-prod-id="{{ $product->id }}">
                                                        {{ $item->title . ' ' }}
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="size_btn {{ $key == 0 ? 'active' : '' }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{ $item->title . ' GM' }}"
                                                        data-size-id="{{ $item->size_id }}"
                                                        data-prod-id="{{ $product->id }}">
                                                        {{ $item->title . ' GM' }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            <style>
                                .featured_bullet {
                                    display: none;
                                }
                            </style>
                            <div class="featured_bullet">
                                <span style="min-width: 105px;
                            font-weight: 600;"
                                    class="qty">Sizecart:</span>
                                {!! $product->sizecart !!}
                            </div>

                            {{-- temperory comment  --}}
                            {{-- <div class="product-color">
                                <span class="color-label">Colors:</span>
                                <span class="color" id="colorDiv">
                                    @foreach ($product->colors as $key => $item)
                                        <a href="javascript:void(0)" class="color_btn {{ $key == 0 ? 'active' : '' }}"
                                            data-toggle="tooltip" data-placement="top" title="{{ $item->color->title }}"
                                            data-color-id="{{ $item->color_id }}" data-prod-id="{{ $product->id }}">
                                            <span style="background-color: {{ $item->color->color_code }}"></span>
                                        </a>
                                    @endforeach
                                </span>
                            </div> --}}
                            {{-- <div class="pro-qty">
                            <span class="qty">Quantity:</span>
                            <div class="plus-minus">
                                <span>
                                    <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                    <input type="text" class="quantity-input" name="qty" id="qty" value="1">
                                    <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                </span>
                            </div>
                        </div> --}}
                            <style>
                                .pro-price span {
                                    margin-right: 10px;
                                }

                                .thickness-content-container {
                                    /* background-color: red; */
                                    color: #07498c;
                                    /* height: 20px; */
                                    margin: 20px 0;
                                    overflow: hidden;
                                    transition: all 0.5s ease-in-out;
                                }

                                /* .thickness-content-container.active {
                                        height: 80px;
                                    } */

                                #selected-mattress-size {
                                    margin-bottom: 20px;
                                    cursor: pointer;
                                }

                                .thickness-selector {
                                    padding: 13px 30px 13px 13px;
                                    color: #000;
                                    font-size: 16px;
                                }

                                .select-size-content {
                                    display: flex;
                                    gap: 20px;
                                    margin-top: 20px;
                                }

                                .select-size-content div {
                                    display: flex;
                                    gap: 10px;
                                    align-items: center;
                                    margin-right: 10px
                                }

                                .select-size-content div input[type="radio"] {
                                    width: 20px;
                                    height: 20px;
                                }

                                .select-size-content div label {
                                    font-size: 16px;
                                }

                                .custom-size-container {
                                    margin-top: 30px;
                                }

                                #custom-size-input {
                                    padding: 15px;
                                    margin-bottom: 20px
                                }

                                .custom-size-container h3,
                                .select-size-content-container h3 {
                                    margin: 0 !important;
                                    color: #07498c !important;
                                    font-size: 14px;
                                }

                                .custom-size-container h3 {
                                    margin: 0 0 10px 0 !important;
                                }

                                .custom-size-container a {
                                    color: #187bcd;
                                    font-weight: 600;
                                }
                            </style>
                            {{-- <div class="product-color">
                                <span class="color-label">Colors:</span>
                                <span class="color" id="colorDiv">
                                    @foreach ($product->colors as $key => $item)
                                        <a href="javascript:void(0)" class="color_btn {{ $key == 0 ? 'active' : '' }}"
                                            data-toggle="tooltip" data-placement="top" title="{{ $item->color->title }}"
                                            data-color-id="{{ $item->color_id }}" data-prod-id="{{ $product->id }}">
                                            <span style="background-color: {{ $item->color->color_code }}"></span>
                                        </a>
                                    @endforeach
                                </span>
                            </div> --}}

                            <div
                                class="thickness-content-container active  @if (in_array($product->id, [25])) d-none @endif">
                                <div class="color" id="colorDiv">


                                    <select name="">
                                        @foreach ($product->colors as $key => $item)
                                            <option class="color_btn" data-color-id="{{ $item->color_id }}"
                                                data-prod-id="{{ $product->id }}" value="{{ $item->color->title }}">
                                                {{ $item->color->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="select-size-content-container  @if (in_array($product->id, [25])) d-none @endif">
                                <h3>
                                    Select Options please
                                </h3>

                                <div class="select-size-content">
                                    @if (count($product->sizes) > 0)
                                        @foreach ($product->sizes as $key => $item)
                                            <div>
                                                <input type="radio" class="size_btn" id="{{ $item->title }}-size"
                                                    value="{{ $item->title }}" data-size-id="{{ $item->size_id }}"
                                                    data-prod-id="{{ $product->id }}" {{ $key == 0 ? 'checked' : '' }}>
                                                <label for="{{ $item->title }}-size">{{ $item->title }}</label>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            @if (!in_array($product->id, [25]))
                                <div class="pro-btn">

                                    <a href="javascript:void(0)" class="btn shop-now-btn add-cart">
                                        <i class="fa fa-shopping-bag"></i> Add to cart
                                    </a>
                                </div>

                                <div class="custom-size-container">
                                    <input type="text" name="product-custom-size" id="custom-size-input"
                                        placeholder="Custom Size">
                                    <h3>Contact Us for Custom Size:</h3>
                                    <a href="tel:+917045945037">+91 7045945037</a>
                                </div>
                            @endif
                            {{-- @if (isset($product) && in_array($product->id, [25, 26])) --}}
                            {{-- @if (isset($product) && !in_array($product->id, [25, 26])) --}}
                            @if (in_array($product->id, [25]))
                                <div class="pro-btn">

                                    <a href="javascript:void(0)" class="btn shop-now-btn" data-bs-toggle="modal"
                                        data-bs-target="#productEnquiryModal" id="productEnquireButton"
                                        data-product-name="{{ $product->title }}">
                                        Enquire Now
                                    </a>

                                    {{-- temparory comment  --}}
                                    {{-- <a href="javascript:void(0)" class="btn btn-style1 add-cart">
                                    <i class="fa fa-shopping-bag"></i> Add to cart
                                </a> --}}
                                    {{-- <a href="javascript:void(0)" class="btn btn-style1">Buy now</a> --}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product info end -->
    <!-- product page tab start -->
    <section class="section-b-padding pro-page-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pro-page-tab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#description"
                                    id="descriptionTab">Description</a>
                            </li>
                            @if (count($product->reviews) && $product->review_status)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#review" id="reviewTab">Reviews
                                        ({{ $product->reviews->count('id') }})</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <div class="tab-1content">
                                    {!! $product->description !!}
                                </div>
                                <div class="tab-2content">
                                    <h4>Key specification</h4>
                                    @if ($product->brand)
                                        <ul class="tab-description">
                                            <li> Brand: {{ $product->brand->brand_name }}</li>
                                        </ul>
                                    @endif
                                    @if ($product->warranty)
                                        <ul class="tab-description">
                                            <li> Warranty: {{ $product->warranty->title }}</li>
                                        </ul>
                                    @endif
                                    <ul class="tab-description">
                                        @foreach ($product->custom_fields as $field)
                                            <li>{{ $field->field_name }}: {{ $field->field_value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if (count($product->reviews) && $product->review_status)
                                <div class="tab-pane fade show" id="review">
                                    {{-- <a href="#add-review" data-bs-toggle="collapse">Write a review</a> --}}
                                    <div class="review-form collapse" id="add-review">
                                        <h4>Write a review</h4>
                                        <form>
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Enter your name">
                                            <label>Email</label>
                                            <input type="text" name="mail" placeholder="Enter your Email">
                                            <label>Rating</label>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <label>Review title</label>
                                            <input type="text" name="mail" placeholder="Review title">
                                            <label>Add comments</label>
                                            <textarea name="comment" placeholder="Write your comments"></textarea>
                                        </form>
                                    </div>
                                    <div class="customer-reviews">
                                        <section class="testimonial-6 ">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="section-title3">
                                                            <h2>What Customers Say ?</h2>
                                                        </div>
                                                        <div class="testi-6 owl-carousel owl-theme">
                                                            @foreach ($product->reviews as $review)
                                                                <div class="items">
                                                                    <div class="testimonial-content">
                                                                        <div class="testimonial-area">
                                                                            <div class="testi-name">
                                                                                <span
                                                                                    class="tsti-title">{{ $review->name }}</span>
                                                                                @if ($review->rating)
                                                                                    <span>
                                                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                                                            <i
                                                                                                class="fa fa-star e-star"></i>
                                                                                        @endfor
                                                                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                                                            <i class="fa fa-star-o"></i>
                                                                                        @endfor
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <p>{{ $review->comment }}</p>
                                                                        <h6>
                                                                            {{ date('F d, Y', strtotime($review->created_at)) }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product page tab end -->
    @if (in_array($product->id, [25]))
        <section class="section-b-padding position-relative">
            <div class="container section-b-padding">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center mb-4">PROUD HISTORY AS THE FOUNDATION FOR CONTINUAL ADVANCEMENT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 order-2 order-md-1">
                        <p class="mb-2">
                            <strong>1978: Invasion of comfort foam Products</strong> <br />
                            Established in 1978 by Mr. Rashid Mansuri, Comfort Foam Products has since steadily grown
                            with the Indian Mattress industry. As a family-owned business Comfort Foam Products has over 40
                            years of expertise in producing premium natural latex foam sheets for Mattresses, Pillow,
                            Cushion &
                            Upholstery
                            Products using its proprietary formula. Over the years, Comfort Foam has built a reputation as a
                            leading latex foam manufacturer in India, consistently delivering quality and comfort.
                        </p>
                        <p class="mb-3">
                            Tody Comfort foam Products continues to satisfy the diverse demands of its clientele through
                            quality products and excellent customer service.
                        </p>
                        <p class="mb-3">
                            <strong>2000: Crossing India</strong><br />
                            Between 2000–2001, Comfort Foam Products began exploring international markets and emerged as a
                            recognized latex foam manufacturer in India. Comfort Foam gained recognition as a leading
                            manufacturer of quality latex foam products, expanding its customer base to Europe, Malaysia,
                            and South Korea.
                        </p>
                        <p class="mb-3">
                            <strong>2007: Manufacturing for other brands</strong><br />
                            In 2007, Comfort Foam began supplying its high-performance latex foam sheets to renowned
                            mattress manufacturing brands, with Comfort Latex being used as the core material in premium
                            mattress collections.
                        </p>
                        <p class="mb-3">
                            <strong>2018: Mission</strong><br />
                            Our mission is to deliver premium-quality latex foam products that provide the comfort and
                            durability our customers expect. We are committed to creating new horizons of excellence by
                            offering exclusive and innovative natural latex foam sheets at competitive prices.
                        </p>

                    </div>
                    <div class="col-md-6 order-1 order-md-2 mb-3 mb-md-0">
                        <img src="{{ asset('assets/image/card-image/natural-latex-factory.png') }}" alt="factory image"
                            class="w-100 natural-latex-sticky-img">
                    </div>
                </div>
            </div>
            <div class="container section-b-padding">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center mb-4">QUALITY: PURE AND CONSISTENT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <img src="{{ asset('assets/image/card-image/natural-latex-rubber-tree.png') }}" alt=""
                            class="w-100 natural-latex-sticky-img">
                    </div>
                    <div class="col-md-6">

                        <p class="home-about-heading">
                            Naturally Pure
                        </p>
                        <p class="mb-3">
                            <strong>Carefully Selecting the Finest Material Sources</strong> <br />
                            Comfort Foam understands that producing premium latex foam products begins with sourcing the
                            finest natural materials. That’s why we focus on procuring the best latex sap from eco-friendly
                            rubber plantations across Kerala. Each batch of natural latex is carefully selected and
                            inspected by our experts to ensure it meets the highest quality standards.
                        </p>

                        <p class="home-about-heading">
                            Consistent
                        </p>
                        <p class="mb-3">
                            <strong>Manufacturing 100% natural Latex with advance Dunlop Technology</strong><br />
                            Technology does play an important role in manufacturing high quality products. That is why at
                            Comfort Foam, our team of the best engineers have enhanced Dunlop technology with the family
                            owned proprietary recipe to successfully control the unstable natures of raw latex.

                        </p>
                        <p class="mb-3">
                            <strong>Accessibility of an in-house mechanic workshop</strong><br />
                            No request is too extreme. Comfort Foam has set up an house mechanic workshop allowing
                            flexible adjustment can be implemented in every stage of the production process: We can supply
                            our customers any kind of product shapes and sizes.

                        </p>
                        <p class="mb-3">
                            We try to remain at the service of the clients 24x7 and continuously enhancing the quality of
                            our products. Our core value stands on innovation and application of modern technology. We
                            strengthen our core values with dedication, punctuality and offering qualitative products to the
                            global market.
                        </p>

                    </div>
                </div>
            </div>
            <div class="container section-b-padding">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('assets/image/card-image/natural-latex-family-image.png') }}" alt=""
                            class="w-100">
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center mb-4">100% Natural & Organic Product</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center gap-5 flex-wrap">
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/hypoallergenic-cover.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Hypoallergenic cover
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/soft-for-the-skin.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Soft for the skin
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/orthopedic.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Orthopedic
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/pressure-equalizing.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Pressure equalizing
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/mite-resistant.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Mite resistant
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/ergonomics.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Ergonomic
                            </h4>
                        </div>
                        <div class="new-circle-card-image">
                            <img src="{{ asset('assets/image/card-image/neck-and-back-support.png') }}" alt=""
                                class="mb-2">
                            <h4 class="h5 text-center">
                                Neck and back support
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- releted product start -->
    @if (!in_array($product->id, [25]))
        <section class="section-b-padding pro-releted">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                        <div class="releted-products owl-carousel owl-theme">
                            @foreach ($related_products as $product)
                                @php
                                    // $colors = explode(',', $product->color_codes);
                                    $getDiff = $product->starting_price - $product->mrp;
                                    $getOffer = round(($getDiff / $product->starting_price) * 100, 0);
                                @endphp
                                <div class="items">
                                    <div class="tred-pro">
                                        <div class="tr-pro-img">
                                            <a href="{{ route('product', $product->slug_url) }}">
                                                <img class="img-fluid lazy" src="{!! $product->image_url !!}"
                                                    alt="{{ $product->title }}">
                                                <img class="img-fluid additional-image lazy" src="{!! $product->image_url1 !!}"
                                                    alt="{{ $product->title }}">
                                            </a>
                                        </div>
                                        <div class="Pro-lable">
                                            <span class="p-text">New</span>
                                            <span class="p-discount"> {{ $getOffer }}% off</span>
                                        </div>
                                        <div class="pro-icn">
                                            @if (auth()->check())
                                                @if (auth()->user()->id == $product->w_u_id && $product->w_product_id == $product->id)
                                                    <a href="javascript:void(0)" class="w-c-q-icn wishlist-remove"
                                                        data-w-id="{{ $product->w_id }}" title="Remove from Wishlist"><i
                                                            class="fa fa-heart"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" class="w-c-q-icn wishlist"
                                                        data-p-id="{{ $product->product_id }}"
                                                        data-c-id="{{ $product->c_id }}"
                                                        data-s-id="{{ $product->s_id }}" title="Add to Wishlist"><i
                                                            class="fa fa-heart-o"></i></a>
                                                @endif
                                            @else
                                                <a href="javascript:void(0)" class="w-c-q-icn wishlist-login"
                                                    title="Add to Wishlist"><i class="fa fa-heart-o"></i></a>
                                            @endif
                                            <a href="javascript:void(0)"
                                                onclick="addToCart('{{ $product->product_id }}', '{{ $product->stock }}', '{{ $product->c_id }}', '{{ $product->s_id }}')"
                                                class="w-c-q-icn" title="Add to Cart"><i
                                                    class="fa fa-shopping-bag"></i></a>
                                            <a href="{{ route('product', $product->slug_url) }}" class="w-c-q-icn"><i
                                                    class="fa fa-eye"></i></a>
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
                                            <div class="pro-price pull-left">
                                                <span class="new-price"><i class="fa fa-inr"></i>
                                                    {{ $product->mrp }}</span>
                                                <span class="old-price"><del><i class="fa fa-inr"></i>
                                                        {{ $product->starting_price }}</del></span>
                                            </div>
                                            @if ($product->review_status)
                                                <div class="rating pull-right">
                                                    @for ($i = 1; $i <= $product->rating; $i++)
                                                        <i class="fa fa-star b-star"></i>
                                                    @endfor
                                                    @for ($i = 1; $i <= 5 - $product->rating; $i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                            @endif
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
    <!-- releted product end -->



    <!-- Product Enquiry Modal -->
    <div class="modal fade" id="productEnquiryModal" tabindex="-1" aria-labelledby="productEnquiryLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="d-flex bg-white border border-danger border-5">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productEnquiryLabel">Enquiry for {{ $product->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('mail') }}" method="post" class="modal-body pb-0">
                        @csrf
                        <div class="mb-3">
                            <label for="name2" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name2" placeholder="Name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email2" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email2"
                                placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone2" class="form-label">Phone no.</label>
                            <input type="tel" class="form-control" name="phone" id="phone2"
                                placeholder="Phone no">
                        </div>
                        <div class="mb-3">
                            <label for="message2" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message2" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="g-recaptcha mb-5"
                                style="transform:scale(0.77);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;"
                                data-sitekey="6LeoZPsqAAAAAFfWf3hqreMIrKwSCja8gvSavudS"></div>
                        </div>
                        <input type="hidden" name="form_type" value="product_enquiry">

                        <input type="hidden" name="product_name" value="{{ $product->title }}">
                        <div class="modal-footer pt-0 border-0">
                            <button type="submit" class="btn shop-now-btn mx-auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extrajs')
    <script>
        $(document).ready(function() {


            var param = {};
            param = {
                size_id: $('.size_btn:first-child').data('size-id'),
                product_id: $('.size_btn:first-child').data('prod-id'),
                color_id: $('.color_btn:first-child').data('color-id'),
                source: 'size'
            };
            console.log('param', param);
            console.log("product id: " + param.product_id);
            getProduct(param);

            $('#writeReview').click(function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $("#reviewTab").offset().top - 250
                }, 1000);
                $('#description').removeClass('active show');
                $('#descriptionTab').removeClass('active');
                $('#reviewTab').addClass('active');
                $('#review').addClass('active show');
            });

            $('.add-cart').click(function() {
                var quantity = 1;
                var color_id = $('#cart_color_id').val();
                console.log(color_id);
                var size_id = $('#cart_size_id').val();
                console.log(size_id);
                if (color_id.length < 1) {
                    swal('Add to Cart', 'Please Choose Color', 'error');
                } else if (quantity < 1) {
                    swal('Add to Cart', 'Please Choose Atleast One Quantity to add in Cart', 'error');
                } else if (size_id.length < 1) {
                    swal('Add to Cart', 'Please Choose Size', 'error');
                } else {
                    $('#cart_qty').val(quantity);
                    $('#cartForm').submit();
                    $(this).html(
                        '<i class="fa fa-spinner fa-pulse fa-fw text-light"></i><span class="sr-only">Loading...</span>'
                    );
                }
            });

            $('.size_btn').click(function() {
                var param = {};
                param = {
                    size_id: $(this).data('size-id'),
                    product_id: $(this).data('prod-id'),
                    color_id: $('#cart_color_id').val(),
                    source: 'size'
                };
                console.log("size id: " + param.size_id);

                getProduct(param);


                $('.size_btn').prop('checked', false); // Uncheck all radio buttons
                $(this).prop('checked', true); // Check the clicked radio button


            });

            // $('#thickness-selector').on('change', function() {
            $("body").on('change', '#thickness-selector', function() { // 3rd way


                $("#thickness-selector option").removeClass("active");
                $("#thickness-selector option:selected").addClass("active");

                var param = {
                    color_id: $('.color_btn.active').data('color-id'),
                    product_id: $('.color_btn.active').data('prod-id'),
                    size_id: $('#cart_size_id').val(),
                    source: 'color'
                };
                // var param = {};
                // param = {
                //     size_id: $(this).data('size-id'),
                //     product_id: $(this).data('prod-id'),
                //     color_id: $('#cart_color_id').val(),
                //     source: 'size'
                // };
                console.log('param', param);
                // console.log("product id: " + param.product_id );
                getProduct(param);
                // attachClickListener('.color_btn');
            });

            // $('#selected-mattress-size').click(function() {
            //     $(".thickness-content-container").toggleClass("active");
            // });
            // $('input[type="radio"]').click(function() {
            //     $(".thickness-content-container").show();
            // });


            $('.add-cart').click(function() {
                $(this).html(
                    `<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>`
                );
                $('#cartForm').submit();
            });

        });

        function attachClickListener(elementName) {
            const elements = $(elementName);
            console.log("option selected");

            elements.each((index, element) => {

                element.addEventListener('click', function() {

                    var param = {};
                    param = {
                        color_id: $(element).data('color-id'),
                        product_id: $(element).data('prod-id'),
                        size_id: $('#cart_size_id').val(),
                        source: 'color'
                    };
                    console.log(param);

                    getProduct(param);

                    var ac = $(elementName).hasClass('active');
                    if (ac == true) {
                        $(elementName).removeClass('active');
                    }
                    $(element).addClass('active');

                });
            });
        }

        function getProduct(param) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('get.sizes') }}",
                type: 'POST',
                data: param,
                success: function(result) {
                    if (result.success) {
                        var data = result.success[0];
                        // console.log(result.success);
                        // console.log(data);
                        var mrp = data.mrp;
                        var starting_price = data.starting_price;
                        var getDiff = starting_price - mrp;
                        getOffer = Math.round((getDiff / starting_price) * 100, 0);
                        $('.p-discount').html(getOffer + "% off");
                        // $('.new-price').html('<i class="fa fa-inr"></i> ' + mrp);
                        $('.new-price').html('Rs. ' + mrp);
                        // $('.old-price').html('<del><i class="fa fa-inr"></i> ' + starting_price + '</del>');
                        $('.old-price').html('<del> Rs. ' + starting_price + '</del>');
                        $('#cart_prod_id').val(param.product_id);
                        $('#cart_qty').val($('#qty').val());
                        $('#cart_color_id').val(data.color_id);
                        $('#cart_size_id').val(data.size_id);
                        $('.wishlist').attr('data-p-id', param.product_id);
                        $('.wishlist').attr('data-c-id', data.color_id);
                        $('.wishlist').attr('data-s-id', data.size_id);
                        setImages(result.images);

                        if (result.source == "size") {
                            setColor(result.available_colors);
                        }
                        checkStock(data.stock);
                    }
                }
            });
        }

        function setImages(images) {
            var large_image = '';
            var thumb_image = '';
            var path = "{!! asset('storage/images/multi-products') !!}";
            images.forEach((element, index) => {
                var active = index == 0 ? 'show active' : '';
                var thumb_active = index == 0 ? 'active' : '';
                large_image += `<div class="tab-pane fade ${active}" id="image-${element.id}">
                <a href="javascript:void(0)" class="long-img">
                    <figure class="zoom" onmousemove="zoom(event)"
                        style="background-image: url(${element.image_url})">
                        <img src="${element.image_url}"
                        class="img-fluid" alt="{{ $product->title }}">
                        </figure>
                        </a>
                        </div>`;

                thumb_image += `<li class="nav-item items">
                <a class="thumb_image_active nav-link ${thumb_active}" data-bs-toggle="tab" href="#image-${element.id}"><img
                        src="${element.image_url}"
                        class="img-fluid" alt="{{ $product->title }}"></a>
                </li>`;
            });

            $('.large_image').html(large_image);
            $('.thumb_image').html(thumb_image);

            $('.thumb_image').trigger('destroy.owl.carousel');
            $('.thumb_image').owlCarousel({
                items: images.length,
                nav: false,
                loop: true,
                margin: 5
            });

            $('.thumb_image_active').click(function() {
                $('.thumb_image_active').removeClass('active');
                $(this).addClass('active');
            });
        }

        function setColor(available_colors) {

            if (available_colors.length > 0) {
                var color_html = '';
                color_html += `<select name="asdasdsa"  id="thickness-selector" >`;
                available_colors.forEach((item, index) => {
                    //     color_html += `<a href="javascript:void(0)" class="color_btn ${index==0 ? 'active' : ''}"
                //     data-toggle="tooltip" data-placement="top" title="${item.color.title}"
                //     data-color-id="${item.color_id}" data-prod-id="${item.product_id}">
                //     <span style="background-color: ${item.color.color_code}"></span>
                // </a>`;

                    color_html +=
                        `
                      <option class="color_btn" data-color-id="${item.color_id}" data-prod-id="${item.product_id}" value="${item.color.title}">${item.color.title}</option>`;
                    console.log(item.color_id);

                })
                color_html += `</select>`;

                $('#colorDiv').html(color_html);

                attachClickListener('.color_btn');
            }
        }

        function zoom(e) {
            var zoomer = e.currentTarget;
            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
            e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
            x = offsetX / zoomer.offsetWidth * 100
            y = offsetY / zoomer.offsetHeight * 100
            zoomer.style.backgroundPosition = x + '% ' + y + '%';
        }

        function checkStock(params) {
            if (params <= 0) {
                $('.add-cart').addClass('disabled', 'disabled');
                $('.pro-availabale').html(
                    `<span class="available">Availability:</span><span class="pro-instock text-danger"><i class="ti-close"></i> Out of Stock </span>`
                );
            } else {
                $('.add-cart').removeClass('disabled');
                $('.pro-availabale').html(
                    `<span class="available">Availability:</span><span class="pro-instock text-success"><i class="ti-check-box"></i> In Stock </span>`
                );
            }
        }
    </script>
@endsection
