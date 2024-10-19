<!DOCTYPE html>
<html lang="en">
    <head>
        @include('portal.includes.doctype')
    </head>
    <?php $url = url('/'); ?>
    <script>
        var SITE_PATH   = "{{ $url }}";
        var csrftoken   = "{{ csrf_token() }}";
        var PUBLIC_PATH = "{{ $url.'/public/' }}";
    </script>
    <body class="cbp-spmenu-push">
        <!--  ==== ||** HEADER **|| ====  -->
            @include('portal.includes.header') 
        <!--  ==== ||** PAGE CONTAINER **|| ====  -->
        <!--  ==== ||** SIDEBAR **||====  -->
            @include('portal.includes.sidebar')
        <!--  ==== ||** SIDEBAR **|| ====  -->

        <div class="page-container">
            <!--  ==== ||** PAGE CONTAINER **|| ====  -->
                        
                        @yield('innercontent')
                        
            <!--  ==== **||PAGE CONTAINER **||====  -->
        </div>

        @include('portal.includes.footer')
    
    </body>
</html>