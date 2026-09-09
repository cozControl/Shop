@extends('layouts.app')

@push('styles')
<style>
    .product-section {
        background-color: #f8f8f8;
        padding: 60px 0;
    }

    .main-product-img {
        width: 100%;
        aspect-ratio: 3/4;
        object-fit: cover;
        background-color: #eee;
    }

    .product-title {
        font-size: 28px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #111111;
        margin-bottom: 8px;
    }

    .product-price {
        font-size: 22px;
        font-weight: 700;
        color: #BE1E2D;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .product-desc {
        font-size: 14px;
        color: #555555;
        line-height: 2;
        letter-spacing: 1px;
        margin-bottom: 24px;
    }

    .size-label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #111;
        margin-bottom: 10px;
    }

    .size-btn {
        width: 44px;
        height: 44px;
        border: 2px solid #111111;
        background: transparent;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        cursor: pointer;
        margin-right: 8px;
        transition: all 0.2s;
    }

    .size-btn:hover,
    .size-btn.active {
        background-color: #111111;
        color: #fff;
    }

    .divider {
        border: none;
        border-top: 1px solid #ddd;
        margin: 24px 0;
    }

    .whatsapp-order-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: #25D366;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 18px;
        border: none;
        cursor: pointer;
        width: 100%;
        text-decoration: none;
        transition: background 0.2s;
        margin-top: 16px;
    }

    .whatsapp-order-btn:hover {
        background-color: #1ebe57;
        color: #fff;
    }

    .whatsapp-order-btn i {
        font-size: 20px;
    }

    .email-order-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: transparent;
        color: #111111;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 18px;
        border: 2px solid #111111;
        width: 100%;
        text-decoration: none;
        transition: all 0.2s;
        margin-top: 12px;
    }

    .email-order-btn:hover {
        background-color: #111111;
        color: #fff;
    }

    .back-link {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #111;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 32px;
    }

    .back-link:hover {
        color: #BE1E2D;
    }

    .product-meta {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #aaa;
        margin-bottom: 4px;
    }

    .section-accent {
        width: 14px;
        height: 28px;
        background-color: #BE1E2D;
        border-radius: 3px;
        display: inline-block;
        margin-bottom: 8px;
    }
</style>
@endpush

@section('content')

    <section class="product-section">
        <div class="container">

            <a href="{{ route('shop') }}" class="back-link">
                <i class="fa fa-arrow-left"></i> Back to Shop
            </a>

            <div class="row g-5">

                <div class="col-12 col-md-6">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="main-product-img mb-3">
                </div>

                <div class="col-12 col-md-6">

                    <div class="section-accent"></div>
                    <p class="product-meta">Cozcontrol{{ $product->category ? ' — '.$product->category : '' }}</p>
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <p class="product-price">{{ $product->formattedPrice() }}</p>

                    <p class="product-desc">
                        {{ $product->description }}
                        @if ($product->material)
                            <br>{{ $product->material }}
                        @endif
                    </p>

                    <hr class="divider">

                    <p class="size-label">Select Size</p>
                    <div class="mb-4" id="sizeSelector">
                        <button class="size-btn" onclick="selectSize(this)">S</button>
                        <button class="size-btn" onclick="selectSize(this)">M</button>
                        <button class="size-btn" onclick="selectSize(this)">L</button>
                        <button class="size-btn" onclick="selectSize(this)">XL</button>
                    </div>

                    <hr class="divider">

                    <a id="whatsappBtn" href="#" target="_blank" class="whatsapp-order-btn">
                        <i class="fab fa-whatsapp"></i> Order via WhatsApp
                    </a>
                    <a id="emailBtn" href="#" class="email-order-btn">
                        <i class="fa fa-envelope"></i> Order via Email
                    </a>

                    <p style="font-size: 11px; color: #aaa; text-align: center; margin-top: 12px; letter-spacing: 1px; text-transform: uppercase;">
                        Select a size to place your order
                    </p>

                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    var selectedSize = '';
    var phone = '255693363601';
    var productName = @json($product->name);
    var price = @json($product->formattedPrice());

    function selectSize(btn) {
        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedSize = btn.textContent;
        updateOrderLinks();
    }

    function updateOrderLinks() {
        var message = 'Hi Cozcontrol! I would like to order:\n\nProduct: ' + productName + '\nSize: ' + selectedSize + '\nPrice: ' + price + '\n\nPlease confirm availability.';
        document.getElementById('whatsappBtn').href = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(message);

        var emailSubject = 'Order: ' + productName;
        var emailBody = 'Hi Cozcontrol,\n\nI would like to order:\n\nProduct: ' + productName + '\nSize: ' + selectedSize + '\nPrice: ' + price + '\n\nMy delivery address:\n[Please fill in your address]';
        document.getElementById('emailBtn').href = 'mailto:cozcontrool@gmail.com?subject=' + encodeURIComponent(emailSubject) + '&body=' + encodeURIComponent(emailBody);
    }
</script>
@endpush
