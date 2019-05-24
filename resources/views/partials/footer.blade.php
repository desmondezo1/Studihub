<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row" style="
        margin-top: 50px;
        padding: 30px 10px 10px 10px;
        background: linear-gradient(1deg, #061c3e, #dc3545);
        box-shadow: 0px -5px 15px #ccc;
        ">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3" style="color: #fff;">

                <!-- Content -->
               
                <img class="img-responsive" style="max-height:150px" src="{{ asset('img/logo.png') }}" alt="studihub logo">
                <h5 class="text-uppercase">STUDIHUB</h5>
                <p>Helping students learn better!</p>
            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3" style="color: #e8d7d7;">

                <!-- Links -->
                <h5 class="text-uppercase" style="text-decoration: underline;">Quick Links</h5>

                <ul class="list-unstyled footer-list">
                    <li>
                        <a href="#!">Login</a>
                    </li>
                    <li>
                        <a href="#!">Register</a>
                    </li>
                    <li>
                        <a href="#!">Blog</a>
                    </li>
                    <li>
                        <a href="#!">Practice</a>
                    </li>
                    <li>
                        <a href="#!">Studihub Careers</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.choices.create') }}">Become a Tutor</a>
                    </li>
                    <li>
                        <a href="#!">Hire a Private Tutor</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3" style="color: #e8d7d7;">

                <!-- Links -->
                <h5 class="text-uppercase" style="text-decoration: underline;">Socials</h5>

                <ul class="list-unstyled footer-list">
                    <li>
                        <a href="#!">Instagram</a>
                    </li>
                    <li>
                        <a href="#!">Facebook</a>
                    </li>
                    <li>
                        <a href="#!">Twitter</a>
                    </li>
                    <li>
                        <a href="#!">Youtube</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background: #061c3e;color: #ccc;">
        <a href="{{ route('home') }}" style="color: #e9ecef;"> STUDIHUB EDUCATION SERVICES</a> &copy; {{ "2018" != date("Y")  ? "2018 - " . date("Y") : "2018" }}
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
