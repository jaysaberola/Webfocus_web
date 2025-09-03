
<header id="header" class="header-size-md bg-white border-0">
    <div id="header-wrap">
        <div class="container">

            <!-- Flex row: logo left, trigger + button right -->
            <div class="header-row d-flex align-items-center justify-content-between">

                <!-- Left Side: Logo + Menu -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ url('/') }}" class="standard-logo"
                           data-dark-logo="{{ asset('images/landing-2/images/' . (Setting::getFaviconLogo()->company_logo ?? 'default-logo.png')) }}">
                            <img src="{{ asset('images/landing-2/images/' . (Setting::getFaviconLogo()->company_logo ?? 'default-logo.png')) }}"
                                 alt="{{ Setting::info()->company_name ?? 'Company Name' }}">
                        </a>
                    </div>

                    <!-- Desktop Navigation Menu -->
                    <nav id="desktop-menu" class="primary-menu with-arrows d-none d-lg-block">
                        @include('theme.layouts.menu')
                    </nav>
                </div>

                <!-- Right Side: Learn More + Mobile Trigger -->
                <div class="d-flex align-items-center">
                    <!-- Learn More Button -->
                    <a href="{{ url('/services') }}" class="btn-learnmore d-none d-lg-inline-flex">
                        Subcriptions <span class="arrow">→</span>
                    </a>

                    <!-- Mobile Menu Trigger -->
                    <div id="primary-menu-trigger" class="d-lg-none me-3">
                        <svg class="svg-trigger" viewBox="0 0 100 100">
                            <path class="line line1" d="m 30,33 h 40 c 3.7,0 7.5,3.1 7.5,8.6
                                                         0,5.5-2.7,8.4-7.5,8.4 h-20"></path>
                            <path class="line line2" d="m 30,50 h 40"></path>
                            <path class="line line3" d="m 70,67 h-40 c 0,0-7.5-0.8-7.5-8.4
                                                         0-7.6 7.5-8.6 7.5-8.6 h20"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu-dropdown" class="mobile-menu d-lg-none mt-2">
                <nav class="mobile-primary-menu mb-3">
                    @include('theme.layouts.menu')
                </nav>
                <!-- Mobile Learn More Button -->
                <a href="{{ url('/services') }}" class="btn-learnmore w-100 text-center d-lg-none">
                    Subscriptions <span class="arrow">→</span>
                </a>
            </div>

        </div>
    </div>
</header>

<style>
/* ===== Header Base ===== */
#header {
    position: relative;
    width:100%;
    z-index:999;
    transition:all 0.3s ease;
    background:#fff !important;
}
#header-wrap { padding:10px 0; transition:all 0.3s ease; }
#logo img {
    height:12px;
    width:auto;
    transition:height 0.3s ease;
    max-width: 120px;
}

/* Mobile logo adjustments */
@media (max-width: 768px) {
    #header-wrap { padding:8px 0; }
    #logo img {
        height:10px;
        max-width: 100px;
    }
}

@media (max-width: 576px) {
    #logo img {
        height:8px;
        max-width: 80px;
    }
}

/* Desktop Menu Buttons */
.primary-menu ul li a {
    display:inline-block; padding:12px 20px; min-width:120px; text-align:center; border-radius:30px;
    transition:all 0.3s ease; color:#000; font-weight:400; font-size:14px; white-space:nowrap;
}
.primary-menu ul li a:hover { background:#f7f7f7; box-shadow:0 4px 10px rgba(0,0,0,0.15); transform:translateY(-2px);}
.primary-menu ul li.active > a { background:#f39625; color:#fff !important; box-shadow:0 2px 5px rgba(0,0,0,0.2); }

/* Learn More Button */
.btn-learnmore {
    background:#f39625; color:#fff; font-weight:600; font-size:14px;
    padding:10px 22px; border-radius:30px; display:inline-flex; align-items:center; gap:6px;
    text-decoration:none; transition:all 0.3s ease; position:relative; overflow:hidden;
}
.btn-learnmore .arrow { transition: transform 0.3s ease; }
.btn-learnmore:hover { background:#d97f12; box-shadow:0 6px 12px rgba(0,0,0,0.15); }
.btn-learnmore:hover .arrow { transform: translateX(4px); }

/* ===== Mobile SVG Trigger ===== */
.svg-trigger { cursor:pointer; transition: all 0.4s ease; width:28px; height:28px; }
.svg-trigger .line { fill:none; stroke:#f39625; stroke-width:6; stroke-linecap:round; transition: all 0.4s ease; }
/* Animate to X */
.svg-trigger.active .line1 { transform: rotate(45deg); transform-origin:50% 50%; }
.svg-trigger.active .line2 { opacity:0; }
.svg-trigger.active .line3 { transform: rotate(-45deg); transform-origin:50% 50%; }

/* ===== Mobile Menu ===== */
.mobile-menu {
    display:none;
    background:rgba(255,255,255,0.98);
    padding:12px;
    border-radius:8px;
    margin-top:8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.mobile-menu.active { display:block; }
.mobile-primary-menu ul { display:flex; flex-direction:column; gap:8px; }
.mobile-primary-menu ul li a {
    display:block;
    padding:12px;
    border-radius:6px;
    color:#000;
    text-decoration:none;
    background:#f7f7f7;
    transition:all 0.3s ease;
    font-size: 14px;
}
.mobile-primary-menu ul li a:hover { background:#f39625; color:#fff !important; }

/* Mobile header improvements */
@media (max-width: 768px) {
    .header-row {
        padding: 0 10px;
    }

    #primary-menu-trigger {
        margin-left: auto;
    }

    .mobile-menu {
        margin: 8px 10px 0 10px;
    }
}

/* ===== Body Padding (removed) ===== */
body { padding-top:0; }

</style>

<script>
document.addEventListener("DOMContentLoaded", function(){
    const trigger = document.getElementById("primary-menu-trigger");
    const menuDropdown = document.getElementById("mobile-menu-dropdown");
    const learnMoreButtons = document.querySelectorAll(".btn-learnmore");

    // Mobile Toggle SVG Hamburger
    trigger.addEventListener("click", function(){
        trigger.querySelector('svg').classList.toggle("active");
        menuDropdown.classList.toggle("active");
    });

    // Debug Learn More button clicks
    learnMoreButtons.forEach(button => {
        button.addEventListener("click", function(e) {
            console.log("Learn More clicked, href:", button.getAttribute("href"));
        });
    });
});
</script>

