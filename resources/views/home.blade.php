@extends('layouts.app')

@section('content')

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel" style="background-color: #BE1E2D;">

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-color: #BE1E2D;">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img src="{{ asset('assets/img/banner_img_01.png') }}" alt="" style="width: 100%; height: 450px; object-fit: cover; object-position: center; display: block;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-color: #BE1E2D;">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img src="{{ asset('assets/img/banner_img_02.png') }}" alt="" style="width: 100%; height: 450px; object-fit: cover; object-position: center; display: block;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-color: #BE1E2D;">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img src="{{ asset('assets/img/banner_img_03.png') }}" alt="" style="width: 100%; height: 450px; object-fit: contain; object-position: center; display: block;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>

        <div class="text-center py-4" style="background-color: #BE1E2D;">
            <a href="{{ route('shop') }}" style="display: inline-block; background-color: transparent; color: #fff; border: 2px solid #fff; border-radius: 16px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 3px; padding: 12px 36px; text-decoration: none;">SHOP NOW</a>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="coz-red-section" style="padding-top: 60px; padding-bottom: 160px;">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><img src="{{ asset('assets/img/logo2.png') }}" alt="CTRL" style="height: 80px;"></h1>
                <p>
                    OWN THE CHAOS, KEEP YOUR COOL
                </p>
            </div>
        </div>
        <p class="mt-4 text-center" style="color: #fff; font-size: 13px; line-height: 2; letter-spacing: 1px; max-width: 700px; margin: 0 auto; padding: 0 20px;">
            Cozcontrol is more than a clothing brand — it's a mindset!
            Born from the streets of Dar es Salaam, we embody the balance between awareness, control, and effortless coolness. Every piece we create carries a message. Stay grounded, Stay unshaken, Stay in command — without ever losing your comfort or authenticity. Own the chaos. Keep your cool.
            CTRL.
        </p>
    </section>
    <!-- End Categories of The Month -->
    <!-- Red spacer bridge -->
    <div style="background-color: #BE1E2D; height: 80px;"></div>

    <!-- Start Featured Product -->
    <section class="py-5" style="background-color: #f8f8f8;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <div style="width: 14px; height: 28px; background-color: #BE1E2D; border-radius: 3px;"></div>
                    </div>
                    <h2 class="fw-bold mb-0" style="font-size: 28px;">Explore Our Products</h2>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($featuredProducts as $product)
                    <div class="col-12 col-md-4">
                        <div class="coz-product-card">
                            <div class="coz-product-img-wrap">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="coz-product-img">
                                </a>
                                <div class="coz-product-overlay">
                                    <button class="coz-add-to-cart">Add To Cart</button>
                                </div>
                                <div class="coz-product-icons">
                                    <button class="coz-icon-btn" title="Wishlist"><i class="far fa-heart"></i></button>
                                    <button class="coz-icon-btn" title="Quick View"><i class="far fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="coz-product-info">
                                <p class="coz-product-price">{{ $product->formattedPrice() }}</p>
                                <h5 class="coz-product-name"><a href="{{ route('shop.show', $product->slug) }}" style="text-decoration:none; color:inherit;">{{ $product->name }}</a></h5>
                                <p class="coz-product-desc">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('shop') }}" class="coz-view-all-btn">View All Products</a>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

@endsection
