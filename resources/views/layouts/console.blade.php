<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.doctype')
    </head>
    <?php $url = url('/'); ?>
    <script>
        var SITE_PATH   = "{{ $url }}";
        var csrftoken   = "{{ csrf_token() }}";
        var PUBLIC_PATH = "{{ $url.'/public/' }}";
    </script>
    <body>

        <div class="page-container">
            <!--  ==== **||PAGE CONTAINER **||====  -->
                        
                        @yield('innercontent')
                        
            <!--  ==== **||PAGE CONTAINER **||====  -->
        </div>

        @include('includes.footer')
        
        <!-- move top -->
            <button onclick="topFunction()" id="movetop" title="Go to top">
                <span class="fa fa-long-arrow-up"></span>
            </button>
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function () {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("movetop").style.display = "block";
                    } else {
                        document.getElementById("movetop").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
        <!-- /move top -->
    </body>
</html>