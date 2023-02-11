<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>@yield('title','dos')</title>


    <!-- ==== Document Meta ==== -->
    <meta name="author" content="Dose">
    <meta name="description" content="Dose">
    <meta name="keywords"
        content="Dose">

   @include('frontend.layouts._style')
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('frontend.layouts._navbar')

        @yield('content')

        @include('frontend.layouts._footer')
        @include('frontend.layouts._leftside')
        @include('frontend.layouts._rightside')

    </div>
    <!-- Wrapper End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#" class="btn"><i class="fa fa-caret-up"></i></a>
    </div>
    <!-- Back To Top Button End -->
    @include('frontend.layouts._script')

</body>


</html>
