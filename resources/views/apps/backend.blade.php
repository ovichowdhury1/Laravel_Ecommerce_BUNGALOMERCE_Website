<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>

    @include('include.backend.css')
    @yield('css')
</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('include.backend.header')
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        @include('include.backend.head')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('include.backend.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('main')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('include.backend.footer')
        <!--**********************************
            Footer end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('include.backend.scripts')
    <script>
        function JobickCarousel() {

            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 30,
                nav: true,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                autoWidth: true,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: true,
                navText: ['', ''],
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1
                    },

                    767: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                JobickCarousel();
            }, 1000);
        });
    </script>
    @yield('scripts')
</body>

</html>
