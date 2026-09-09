@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <section class="py-5" style="background-color: #BE1E2D;">
        <div class="container text-center">
            <h1 class="text-white fw-bold" style="letter-spacing: 2px;">SHOP</h1>
        </div>
    </section>

    <section class="py-5" style="background-color: #f8f8f8;">
        <div class="container">
            @if ($products->isEmpty())
                <p class="text-center py-5">No products yet — check back soon.</p>
            @else
                <div class="row g-4">
                    @foreach ($products as $product)
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

                <div class="mt-5">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection
