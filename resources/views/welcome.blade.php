<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- favicon
      -->
    <link rel="icon" href="{{ asset('front_end_assets') }}/images/logo/logo.png">
    <!-- css link  -->
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/css/style.css">
    <title>Multidisciplinary impact press</title>
    <!-- font awesome link  -->
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/fontawesome-free-6.5.2-web/css/all.css">
    <script src="{{ 'front_end_assets' }}/js/jquery-3.7.1.min.js"></script>
    <script></script>
</head>

<body>

    @include('front_end.layouts.header')

    @include('front_end.layouts.sidebar')

    <!-- Hero Section -->
    <header id="home" class="hero-section">
        <div class="overlay">
            <div class="container text-center">
                <div class="hero-content">
                    <h1>Where scientists empower society</h1>
                    <p>Creating solutions for healthy lives on a healthy planet</p>
                    <button class="btn"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </div>
            </div>
            <!-- <div class="hero-div">
                <p>9.4 millions <br> citations</p>
                <p>2.8 billions <br> article views and downloads</p>
            </div> -->
        </div>
    </header>

    <section id="user-type" class="mt-5 container">
        <div class="filter-button-area mb-4">
            <button class="btn b1 filter-btn" data-filter="author">Authors</button>
            <button class="btn b2 filter-btn" data-filter="editor">Editors and Reviewers</button>
            <button class="btn b3 filter-btn" data-filter="collaborators">Collaborators</button>
        </div>
        <!-- mobile  -->
        <div class="filter-button-mobile mb-4">
            <select name="filter-mobile" id="filter-mobile">
                <option class="btn b1 filter-btn" data-filter="authors" value="author">Authors</option>
                <option class="btn b1 filter-btn" data-filter="editors" value="editors">Editor and Reviewers</option>
                <option class="btn b1 filter-btn" data-filter="collaborators" value="collaborators">Collaborators
                </option>
            </select>
        </div>

        <!-- <div class="row flex-wrap">
            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="author">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img1.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Find a Journal</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis
                            incidunt inventore, suscipit ea eaque minima? Iusto cupiditate magni neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="editor">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img2.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Submit your research</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="collaborators">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img3.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Author guideliness</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="author">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img5.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Find a Journal</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="editor">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img4.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Peer Review</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="collaborators">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img5.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Fee policy</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="author">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img3.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Author guideliness</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 user-type-item" data-category="author">
                <div class="card h-100">
                    <img src="{{ 'front_end_assets' }}assets/images/img2.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Submit your research</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Blanditiis incidunt inventore,
                            suscipit ea eaque minima?
                            Iusto cupiditate magni
                            neque, veniam quidem
                            possimus doloribus!</p>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="custom-grid">
            <div class="card-item user-type-item" data-category="author">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img1.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Find a Journal</h5>
                        <p class="card-text">
                            We have a home for your research. Our community led journals cover more than 1,500 academic
                            disciplines and are some of the largest and most cited in their fields.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item user-type-item" data-category="author">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img2.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Submit your research</h5>
                        <p class="card-text">
                            Start your submission and get more impact for your research by publishing with us.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="author">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img3.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Author guidelines</h5>
                        <p class="card-text">
                            Ready to publish? Check our author guidelines for everything you need to know about
                            submitting, from choosing a journal and section to preparing your manuscript.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="author">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img4.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Peer Review</h5>
                        <p class="card-text"> Our efficient collaborative peer review means you’ll get a decision on
                            your
                            manuscript in an average of 61 days. </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="editor">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img5.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Fee policy</h5>
                        <p class="card-text">
                            Article publishing charges (APCs) apply to articles that are accepted for publication by our
                            external and independent editorial boards
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item user-type-item" data-category="author">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img6.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">How we publish</h5>
                        <p class="card-text">
                            All Frontiers journals are community-run and fully open access, so every research article we
                            publish is immediately and permanently free to read.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="editor">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img7.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Editor Guidelines</h5>
                        <p class="card-text">
                            Reviewing a manuscript? See our guidelines for everything you need to know about our peer
                            review process.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="editor">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img8.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Become an editor</h5>
                        <p class="card-text">
                            Apply to join an editorial board and collaborate with an international team of carefully
                            selected independent researchers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="editor">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img9.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">My assignments</h5>
                        <p class="card-text">
                            It’s easy to find and track your editorial assignments with our platform, 'My Frontiers' –
                            saving you time to spend on your own research.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="collaborators">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img10.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Press Office</h5>
                        <p class="card-text">
                            Join more than 555 institutions around the world already benefiting from an institutional
                            membership with Frontiers, including CERN, Max Planck Society, and the University of Oxford.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="collaborators">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img11.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Institutional Partnerships</h5>
                        <p class="card-text">
                            Join more than 555 institutions around the world already benefiting from an institutional
                            membership with Frontiers, including CERN, Max Planck Society, and the University of Oxford.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="collaborators">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img12.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Publishing Partnership</h5>
                        <p class="card-text">
                            Partner with Frontiers and make your society’s transition to open access a reality with our
                            custom-built platform and publishing expertise.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item  user-type-item" data-category="collaborators">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img13.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Policy Labs</h5>
                        <p class="card-text">
                            Connecting experts from business, science, and policy to strengthen the dialogue between
                            scientific research and informed policymaking.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-item user-type-item" data-category="author editor collaborators">
                <div class="card">
                    <img src="{{ 'front_end_assets' }}/images/img6.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">How we publish</h5>
                        <p class="card-text">
                            All Frontiers journals are community-run and fully open access, so every research article we
                            publish is immediately and permanently free to read.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Repeat for other cards -->
        </div>
    </section>

    <!-- news section  -->
    <h3 class="heading">NEWS</h3>


    <section id="featured-card">
        <div class="card-container">
            <img src="{{ 'front_end_assets' }}/images/card6.png" alt="Card Image" class="card-image">
            <div class="card-content">
                <h2 class="card-title">Explore the Future</h2>
                <p class="card-text">
                    Discover cutting-edge innovations and insights in the field of technology.
                    Join our platform to unlock endless possibilities and stay ahead in the race of progress.
                </p>
                <a href="#" class="card-button">Read More</a>
            </div>
        </div>
        <!--
        <div class="card-container news news-card-container">

            <div class="card">
                <img src="{{ 'front_end_assets' }}a`ssets/images/img1.png" alt="Card Image" />
                <div class="card-content">
                    <h3>Card Title 1</h3>
                    <p>This is a description for card 1.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ 'front_end_assets' }}/images/img2.png" alt="Card Image" />
                <div class="card-content">
                    <h3>Card Title 2</h3>
                    <p>This is a description for card 2.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ 'front_end_assets' }}/images/img3.png" alt="Card Image" />
                <div class="card-content">
                    <h3>Card Title 3</h3>
                    <p>This is a description for card 3.</p>
                </div>
            </div>
        </div> -->
    </section>

    <section id="horizontal-cards">
        <div class="card">
            <img src="{{ 'front_end_assets' }}/images/card3.png" alt="Card 1" class="card-image">
            <div class="card-content">
                <span class="card-category">OPEN SCIENCE</span>
                <span class="card-date">Published on 10 Jan 2024</span>
                <h3 class="card-title">Safeguarding peer review to ensure quality at scale</h3>
                <p class="card-description">
                    Making scientific research open has never been more important. Facing a rise in fraudulent science,
                    Frontiers has increased its focus on safeguarding quality.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ 'front_end_assets' }}/images/card5.png" alt="Card 2" class="card-image">
            <div class="card-content">
                <span class="card-category">PRESS RELEASE</span>
                <span class="card-date">Published on 03 Dec 2024</span>
                <h3 class="card-title">Experts reveal how revolutionary technological advances could use the sun to
                    source hydrogen fuel</h3>
                <p class="card-description">
                    Crucial advances in technology could allow us to harness the power of the sun to split water into
                    renewable fuel.
                </p>
            </div>
        </div>

        <!-- Add more cards as needed -->
    </section>

    <section id="news-cards">
        <div class="container">
            <div class="card">
                <img src="{{ 'front_end_assets' }}/images/card1.png" alt="Card 1" class="card-image">
                <div class="card-content">
                    <span class="card-category">OPEN SCIENCE</span>
                    <span class="card-date">Published on 10 Jan 2024</span>
                    <h3 class="card-title">Safeguarding peer review to ensure quality at scale</h3>
                    <p class="card-description">
                        Making scientific research open has never been more important. Facing a rise in fraudulent
                        science, Frontiers has increased its focus on safeguarding quality.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="{{ 'front_end_assets' }}/images/card2.png" alt="Card 2" class="card-image">
                <div class="card-content">
                    <span class="card-category">PRESS RELEASE</span>
                    <span class="card-date">Published on 03 Dec 2024</span>
                    <h3 class="card-title">Experts reveal how revolutionary technological advances could use the sun to
                        source hydrogen fuel</h3>
                    <p class="card-description">
                        Crucial advances in technology could allow us to harness the power of the sun to split water
                        into renewable fuel.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="{{ 'front_end_assets' }}/images/card3.png" alt="Card 2" class="card-image">
                <div class="card-content">
                    <span class="card-category">PRESS RELEASE</span>
                    <span class="card-date">Published on 03 Dec 2024</span>
                    <h3 class="card-title">Experts reveal how revolutionary technological advances could use the sun to
                        source hydrogen fuel</h3>
                    <p class="card-description">
                        Crucial advances in technology could allow us to harness the power of the sun to split water
                        into renewable fuel.
                    </p>
                </div>
            </div>



            <!-- Add more cards as needed -->
        </div>
        <button class="see-more-btn">See more news →</button>
    </section>
    <!--
    <section id="contact-us">
        <div class="container">
            <h2>Contact Us</h2>
            <p>We’d love to hear from you! Fill out the form below, and we’ll get back to you as soon as possible.</p>

            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section> -->

    <footer id="footer">
        <div class="footer-container">
            <!-- Guidelines Section -->
            <div class="footer-column">
                <h3>Guidelines</h3>
                <ul>
                    <ul>
                        <li><a href="#">Author guidelines</a></li>
                        <li><a href="#">Editor guidelines</a></li>
                        <li><a href="#">Policies and publication ethics</a></li>
                        <li><a href="#">Fee policy</a></li>
                    </ul>
            </div>

            <!-- Explore Section -->
            <div class="footer-column">
                <h3>Explore</h3>
                <ul>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Research Topics</a></li>
                    <li><a href="#">Journals</a></li>
                    <li><a href="#">How we publish</a></li>
                </ul>
            </div>

            <!-- Outreach Section -->
            <div class="footer-column">
                <h3>Outreach</h3>
                <ul>
                    <li><a href="#">Frontiers Forum</a></li>
                    <li><a href="#">Frontiers Policy Labs</a></li>
                    <li><a href="#">Frontiers for Young Minds</a></li>
                    <li><a href="#">Frontiers Planet Prize</a></li>
                </ul>
            </div>

            <!-- Connect Section -->
            <div class="footer-column">
                <h3>Connect</h3>
                <ul>
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Emails and alerts</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Submit</a></li>
                    <li><a href="#">Career opportunities</a></li>
                </ul>
            </div>

            <!-- Follow Us Section -->
            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Your Website Name. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="{{ 'front_end_assets' }}/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

    <script src="{{ 'front_end_assets' }}/js/script.js?"></script>
    {{-- <script src="{{ 'front_end_assets' }}/js/script.js?{{ date('Y-m-d') }}"></script> --}}

</body>

</html>
