@extends('layouts.app')

@push('styles')
<style>
    .community-hero {
        background-color: #BE1E2D;
        padding: 80px 0 60px;
        text-align: center;
    }
    .community-hero h1 {
        font-size: 48px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 4px;
        color: #fff;
        margin-bottom: 12px;
    }
    .community-hero p {
        color: rgba(255,255,255,0.85);
        font-size: 15px;
        letter-spacing: 1px;
        line-height: 2;
        max-width: 560px;
        margin: 0 auto;
    }
    .whatsapp-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background-color: transparent;
        color: #25D366;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 16px 40px;
        text-decoration: none;
        border: 2px solid #25D366;
        transition: all 0.2s;
        margin-top: 32px;
    }
    .whatsapp-btn:hover {
        background-color: #25D366;
        color: #fff;
    }
    .whatsapp-btn i {
        font-size: 20px;
    }
    .register-section {
        background-color: #f8f8f8;
        padding: 80px 0;
    }
    .register-section .section-label {
        width: 14px;
        height: 28px;
        background-color: #BE1E2D;
        border-radius: 3px;
        display: inline-block;
        margin-bottom: 8px;
    }
    .register-section h2 {
        font-size: 28px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #111111;
        margin-bottom: 8px;
    }
    .coz-form input {
        border: 2px solid #111111;
        border-radius: 0;
        padding: 14px 16px;
        font-size: 14px;
        letter-spacing: 1px;
        margin-bottom: 16px;
        width: 100%;
        background: #fff;
        outline: none;
    }
    .coz-form input:focus {
        border-color: #BE1E2D;
        box-shadow: none;
    }
    .coz-form input::placeholder {
        color: #aaa;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 2px;
    }
    .coz-submit-btn {
        background-color: #BE1E2D;
        color: #fff;
        border: none;
        padding: 16px 48px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
        cursor: pointer;
        transition: background 0.2s;
        width: 100%;
    }
    .coz-submit-btn:hover {
        background-color: #111111;
    }
    .divider-line {
        border: none;
        border-top: 2px solid #eee;
        margin: 32px 0;
    }
</style>
@endpush

@section('content')

    <!-- Community Hero -->
    <section class="community-hero">
        <div class="container">
            <img src="{{ asset('assets/img/logo2.png') }}" alt="CTRL" style="height: 60px; margin-bottom: 20px;">
            <p>Sign up for new updates, exclusive drops, and everything Cozcontrol.</p>
            <a href="https://whatsapp.com/channel/0029Vb6plulJ93wYqKUzXG16" target="_blank" class="whatsapp-btn">
                <i class="fab fa-whatsapp"></i> WhatsApp Community
            </a>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="register-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="section-label"></div>
                    <h2>Stay In The Loop</h2>

                    <form class="coz-form" action="https://api.web3forms.com/submit" method="POST">
                        <input type="hidden" name="access_key" value="590c8308-312e-4901-99f9-bf917512366a">
                        <input type="hidden" name="subject" value="New Community Registration – Cozcontrol">
                        <input type="hidden" name="redirect" value="{{ route('contact', ['success' => 'true']) }}">

                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <button type="submit" class="coz-submit-btn">Register Now</button>
                    </form>

                    <hr class="divider-line">
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'true') {
        const form = document.querySelector('.coz-form');
        form.innerHTML = '<div style="background:#111;color:#fff;padding:24px;text-align:center;letter-spacing:2px;text-transform:uppercase;font-size:13px;">You\'re in! Welcome to the Cozcontrol community. CTRL.</div>';
    }
</script>
@endpush
