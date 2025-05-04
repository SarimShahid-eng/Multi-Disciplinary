<header class="header-main navbar-expand-lg fixed-top">
    <!-- Website logo -->
    <a href="index.html" class="logo">
        <img src="{{ 'front_end_assets' }}/images/logo.png" alt="">
    </a>


    <!-- Navigation bar -->
    <nav id="navbar" class="navbar">
        <ul class="menu-category-list">
            <li class="menu-category">
                <a href="index.html" class="menu-title">Home</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">About us</a>
                <div class="dropdown-panel">
                    <ul class="dropdown-panel-list">
                        <li class="menu-title"><a href="#">Who we are</a></li>
                        <li class="panel-list-item"><a href="#">Mission and values</a></li>
                        <li class="panel-list-item"><a href="#">History</a></li>
                        <li class="panel-list-item"><a href="#">Leadership</a></li>
                        <li class="panel-list-item"><a href="#">Awards</a></li>
                    </ul>

                    <ul class="dropdown-panel-list">
                        <li class="menu-title"><a href="#">Impact and progress</a></li>
                        <li class="panel-list-item"><a href="#">Frontier's Impact</a></li>
                        <li class="panel-list-item"><a href="#">Progress Report 2022</a></li>
                        <li class="panel-list-item"><a href="#">All progress reports</a></li>
                    </ul>

                    <ul class="dropdown-panel-list">
                        <li class="menu-title"><a href="#">Publishing model</a></li>
                        <li class="panel-list-item"><a href="#">Suits and Kurties</a></li>
                        <li class="panel-list-item"><a href="#">Frocks & Jeans</a></li>
                        <li class="panel-list-item"><a href="#">How we publish</a></li>
                        <li class="panel-list-item"><a href="#">Open access</a></li>
                        <li class="panel-list-item"><a href="#">Fee policy</a></li>
                        <li class="panel-list-item"><a href="#">Peer Review</a></li>
                        <li class="panel-list-item"><a href="#">Research integrity</a></li>
                        <li class="panel-list-item"><a href="#">Research Topics</a></li>

                    </ul>

                    <ul class="dropdown-panel-list">
                        <li class="menu-title"><a href="#">Services</a></li>
                        <li class="panel-list-item"><a href="#">Societies</a></li>
                        <li class="panel-list-item"><a href="#">National consortia</a></li>
                        <li class="panel-list-item"><a href="#">Computer mice</a></li>
                        <li class="panel-list-item"><a href="#">Chairs</a></li>
                        <li class="panel-list-item"><a href="#">Institutional partnership</a></li>
                        <li class="panel-list-item"><a href="#">Collaborators</a></li>
                    </ul>

                    <ul class="dropdown-panel-list">
                        <li class="menu-title"><a href="#">More from Us</a></li>
                        <li class="panel-list-item"><a href="#">Forum</a></li>
                        <li class="panel-list-item"><a href="#">Planet Prize</a></li>
                        <li class="panel-list-item"><a href="#">Press office</a></li>
                        <li class="panel-list-item"><a href="#">Sustainability</a></li>
                        <li class="panel-list-item"><a href="#">Career opportunities</a></li>
                        <li class="panel-list-item"><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </li>

            <!-- Journals category with dropdown -->
            <li class="menu-category">
                <a href="#" class="menu-title">All Journals</a>
            </li>

            <!-- All Articles menu items -->
            <li class="menu-category">
                <a href="#" class="menu-title">All Articles</a>
            </li>

            <a href="{{ route('submission.reset_manuscript') }}" class="btn nav-btn">Submit Your Research</a>
        </ul>
    </nav>
    <a href="{{ route('login') }}" class="login btn">Log in</a>
</header>
<div class="mobile-nav">

    <a href="index.html" class="logo"> <img src="{{ 'front_end_assets' }}/images/logo.png"></a>

    <div class="mobile-menu-icon">
        <i class="fas fa-bars"></i>
    </div>
</div>
