<div class="container">
    <footer class="footer text-center text-lg-start text-white fixed-bottom" id="myFooter" style="background-color: #45526e; display: none;">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Glyndwr Timetable
                        </h6>
                        <p>
                            Welcome to the timetable! For questions about the platform please contact your tutor
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none"/>

                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none"/>

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Useful links
                        </h6>
                        <p>
                            <a class="text-white">Your Account</a>
                        </p>
                        <p>
                            <a class="text-white">Become an Affiliate</a>
                        </p>
                        <p>
                            <a class="text-white">Help</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none"/>

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->


            <!-- Section: Copyright -->

            <!-- Section: Copyright -->
        </div>
        <section class="d-flex justify-content-center border-top pt-3">
            <div>
                <div>
                    © 2024 Copyright:
                </div>
            </div>
        </section>


    </footer>

</div>

<script>
    var lastScrollPosition = 0;

    window.addEventListener('scroll', function () {
        var footer = document.getElementById('myFooter');
        var scrollPosition = window.innerHeight + window.scrollY;

        if (scrollPosition >= document.body.scrollHeight) {
            if (scrollPosition > lastScrollPosition) {
                // User is scrolling down at the bottom
                footer.style.display = 'block';
                footer.style.transition = 'opacity 0.5s ease-in-out';
                footer.style.opacity = '1';
            } else {
                // User is scrolling up
                footer.style.opacity = '0';
                setTimeout(function () {
                    footer.style.display = 'none';
                }, 500); // Delay hiding the footer after opacity transition
            }
        } else {
            footer.style.display = 'none';
        }

        lastScrollPosition = scrollPosition;
    });
</script>

