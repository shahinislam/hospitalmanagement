<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Nurse area</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/design.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/MainContent.css') }}">
	@yield('styles')
</head>
<body>
    @include('includes_nurse.nurse-header')
    @include('includes_nurse.nurse-navigation')
    @include('section-header')
    <div class="main-content">
        @yield('content')
    </div>
    
    @include('footer')

    <script type="text/javascript">
    	var baseUrl="{{ URL::to('/') }}";
    </script>
    @yield('scripts')
    </body>
</html>