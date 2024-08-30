
<div class="navbar">
    <i class='bx bx-menu'></i>
    <div class="logo"><a href="#">
        <img width="100px" src="{{ asset('assets/images/logo.png') }}" alt="logo" />
    </a></div>
    <div class="nav-links">
        <div class="sidebar-logo">
            <span class="logo-name">
            <img width="100px" src="{{ asset('assets/images/logo.png') }}" alt="logo" />
            </span>
            <i class='bx bx-x'></i>
        </div>
        <ul class="links">
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('home') }}">Home</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('who-we-are') }}">Who we are</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('dry-cargo') }}">Dry Cargo</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('reefer-cargo') }}">Reefer Cargo</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('liquid-cargo') }}">Liquid Cargo</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('project-cargo') }}">Project Cargo</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('container-haulage') }}">Container Haulage</a></li>
            <li><a class="text-gray-700 transition hover-text-secondary" href="{{ url('contact-us') }}">Contact Us</a></li>

            {{-- <li>
                <a href="#">HTML & CSS</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                <ul class="htmlCss-sub-menu sub-menu">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Login Forms</a></li>
                    <li><a href="#">Card Design</a></li>
                    <li class="more">
                        <span><a href="#">More</a>
                            <i class='bx bxs-chevron-right arrow more-arrow'></i>
                        </span>
                        <ul class="more-sub-menu sub-menu">
                            <li><a href="#">Neumorphism</a></li>
                            <li><a href="#">Pre-loader</a></li>
                            <li><a href="#">Glassmorphism</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
    <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
            <input type="text" placeholder="Search...">

            <p class="mt-4 text-lg font-medium text-gray-900">Our Services</p>

            <ul class="mt-3 space-y-4 text-sm">
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('automotive-shipping') }}">
                        Automotive Shipping 
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('dangerous-good-shipping') }}">
                        Dangerous Good Shipping 
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('cargo-storage-solutions') }}">
                        Cargo Storage Solutions 
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('exworks-solutions') }}">
                        Exworks Solutions 
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('container-trading') }}">
                        Container Trading 
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('container-bl-tracking') }}">
                        Container / BL Tracking
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('client-reg-login') }}">
                        Client Reg / Login
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('freight-rate') }}">
                        Freight Rate Page
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('get-quote') }}">
                        Get a Quote Page
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('general-tariff') }}">
                        General Tariff Page
                    </a>
                </li>
                <li>
                    <a class="text-gray-700 transition hover-text-secondary" href="{{ url('quick-payment') }}">
                        Quick Payment Page
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>