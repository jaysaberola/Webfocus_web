@extends('theme.main')

@section('pagecss')
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <style>
        /* Match home page body styling */
        body {
            background: #fff;
            font-family: 'Inter', sans-serif;
        }

        /* Pop Animation Styles */
        .pop-animate {
            opacity: 0;
            transform: scale(0.8) translateY(30px);
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .pop-animate.animate {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        /* Stagger animation for multiple elements */
        .pop-animate.stagger-1 { transition-delay: 0.1s; }
        .pop-animate.stagger-2 { transition-delay: 0.2s; }
        .pop-animate.stagger-3 { transition-delay: 0.3s; }
        .pop-animate.stagger-4 { transition-delay: 0.4s; }
        .pop-animate.stagger-5 { transition-delay: 0.5s; }

        /* Different animation types */
        .pop-animate.slide-up {
            transform: translateY(50px);
        }

        .pop-animate.slide-up.animate {
            transform: translateY(0);
        }

        .pop-animate.slide-left {
            transform: translateX(-50px);
        }

        .pop-animate.slide-left.animate {
            transform: translateX(0);
        }

        .pop-animate.slide-right {
            transform: translateX(50px);
        }

        .pop-animate.slide-right.animate {
            transform: translateX(0);
        }

        .pop-animate.rotate {
            transform: rotate(-10deg) scale(0.8);
        }

        .pop-animate.rotate.animate {
            transform: rotate(0deg) scale(1);
        }

        /* Hero Section - matching home page hero */
        .contact-hero {
            background: transparent;
            color: #333;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .contact-hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contact-hero h1 .circle-draw {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .contact-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }
        .contact-hero h1 .circle-draw span {
            position: relative;
            z-index: 1;
        }
        .contact-hero p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        .contact-container { padding: 4rem 0; }

        /* Contact Details - matching home page section styling */
        .contact-info {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .contact-info h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .contact-info p {
            color: #666;
            line-height: 1.8;
        }
        .contact-items {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        .contact-item {
            flex: 1 1 250px;
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .contact-item:hover {
            transform: translateY(-2px);
        }
        .contact-item i {
            font-size: 2rem;
            color: var(--cnvs-themecolor);
            margin-right: 1rem;
            min-width: 40px;
            text-align: center;
        }
        .contact-item .contact-text span {
            font-weight: 600;
            color: #333;
        }
        .contact-item .contact-text p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
            word-break: break-word;
        }

        /* Map */
        #contactMap {
            width: 100%;
            height: 400px;
            border-radius: 1rem;
            margin-top: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        /* Contact Form - matching home page form styling */
        .contact-form {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .contact-form h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
            text-align: center;
        }
        .contact-form p.note {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .contact-form .form-group { margin-bottom: 1.5rem; }
        .contact-form label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            color: #333;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 0.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .contact-form input:focus, .contact-form textarea:focus {
            border-color: var(--cnvs-themecolor);
            box-shadow: 0 0 0 0.2rem rgba(var(--cnvs-themecolor-rgb), 0.25);
            outline: none;
        }
        .contact-form button {
            background: var(--cnvs-themecolor);
            border: none;
            color: #fff;
            padding: 0.75rem 2rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 0.5rem;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            transition: all 0.3s ease;
        }
        .contact-form button:hover {
            background: var(--cnvs-themecolor);
            transform: translateY(-2px);
        }

        /* Success/Error Messages */
        .message-box {
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .message-box.success { background: #d4edda; color: #155724; }
        .message-box.error { background: #f8d7da; color: #721c24; }
        .message-box i { margin-right: 0.5rem; }

        @media(max-width: 992px) {
            .contact-items { flex-direction: column; }
        }
    </style>
@endsection

@section('content')
<section id="content" class="bg-transparent">
    <div class="content-wrap overflow-visible pb-0">
        <!-- Hero Background -->
        <div class="position-absolute vh-100 w-100 top-0 start-0 overflow-hidden">
            <img src="{{ asset('images/landing-2/images/hero-bg.svg') }}" alt="Hero Background" class="hero-bg">
        </div>

        <div class="position-relative">
            <!-- Hero Header -->
            <div class="contact-hero mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <h1 class="display-4 fw-bold pop-animate slide-left">Contact <span class="circle-draw"><span>Us</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h3 class="pop-animate slide-left stagger-1">Get in touch with us for support or inquiries</h3>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"We're here to help you with any questions or concerns. Reach out to us and we'll get back to you as soon as possible."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container contact-container">
            <!-- Contact Details -->
            <div class="contact-info pop-animate slide-up">
                <h2>Contact Details</h2>
                <p>Get in touch with us via any of the following ways. Our team is happy to assist you!</p>

                <div class="contact-items">
                    <div class="contact-item pop-animate stagger-1">
                        <i class="bi bi-envelope"></i>
                        <div class="contact-text">
                            <span>Email</span>
                            <p>Sales: sales@webfocus.ph</p>
                            <p>Marketing: marketing@webfocus.ph</p>
                            <p>Billing: billing@webfocus.ph</p>
                            <p>Customer Care: customercare@webfocus.ph</p>
                            <p>Tech Support: support@webfocus.ph</p>
                        </div>
                    </div>
                    <div class="contact-item pop-animate stagger-2">
                        <i class="bi bi-telephone"></i>
                        <div class="contact-text">
                            <span>Telephone</span>
                            <p>+63 (2) 8706-6144</p>
                            <p>+63 (2) 8706-5796</p>
                            <p>+63 (2) 8511-0528</p>
                            <p>+63 (2) 8709-8061</p>
                            <p>+63 (2) 8806-5201</p>
                        </div>
                    </div>
                    <div class="contact-item pop-animate stagger-2">
                        <i class="bi bi-phone"></i>
                        <div class="contact-text">
                            <span>Mobile</span>
                            <p>+63 908 869 4069 (Smart)</p>
                            <p>+63 917 569 7380 (Globe)</p>
                            <p>+63 922 330 8373 (Sun Cellular)</p>
                        </div>
                    </div>
                    <div class="contact-item pop-animate stagger-3">
                        <i class="bi bi-geo-alt"></i>
                        <div class="contact-text">
                            <span>Our Office</span>
                            <p>Unit 907-909 Antel Global Corporate Center, Julia Vargas Avenue, Ortigas Center, Pasig City, Philippines</p>
                        </div>
                    </div>
                </div>

                <!-- Map under Our Office -->
                <div id="contactMap" class="pop-animate stagger-4"></div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form pop-animate slide-up">
                @if(session()->has('success'))
                    <div class="message-box success">
                        <i class="bi bi-check-circle"></i> {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="message-box error">
                        <i class="bi bi-exclamation-circle"></i> {{ session()->get('error') }}
                    </div>
                @endif

                <h3>Leave Us a Message</h3>
                <p class="note"><strong>Note:</strong> Please do not leave required fields (*) empty.</p>

                <form id="contactUsForm" action="{{ route('contact-us') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="fullName" name="name" placeholder="First and Last Name" required/>
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Email <span class="text-danger">*</span></label>
                        <input type="email" id="emailAddress" name="email" placeholder="hello@example.com" required/>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number <span class="text-danger">*</span></label>
                        <input type="text" id="contactNumber" name="contact" placeholder="+1 234 567 890" required/>
                    </div>
                    <div class="form-group">
                        <label for="message">Message <span class="text-danger">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>
                    </div>
                    <div class="form-group">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <div class="g-recaptcha" data-sitekey="{{ \Setting::info()->google_recaptcha_sitekey }}"></div>
                        <label class="control-label text-danger" id="catpchaError" style="display:none;font-size: 14px;">Captcha is required.</label>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pagejs')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('contactMap').setView([14.5821, 121.0616], 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var redIcon = L.icon({
        iconUrl: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
        iconSize: [32, 32],
        iconAnchor: [16, 32]
    });

    L.marker([14.5821, 121.0616], {icon: redIcon})
        .addTo(map)
        .bindPopup('<b>WebFocus Office</b><br>Unit 907-909 Antel Global Corporate Center, Julia Vargas Avenue, Ortigas Center, Pasig City, Philippines')
        .openPopup();
});

$('#contactUsForm').submit(function (evt) {
    let recaptcha = $("#g-recaptcha-response").val();
    if (recaptcha === "") {
        evt.preventDefault();
        $('#catpchaError').show();
        return false;
    }
});

$(document).ready(function () {
    $('#contactNumber').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode;
        if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    });

    // Pop Animation on Scroll
    function animateOnScroll() {
        $('.pop-animate').each(function() {
            var $this = $(this);
            var elementTop = $this.offset().top;
            var elementBottom = elementTop + $this.outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            // Check if element is in viewport
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $this.addClass('animate');
            }
        });
    }

    // Run animation check on scroll and on page load
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Run once on page load
});
</script>
@endsection
