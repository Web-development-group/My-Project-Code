
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Doctor House</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/images/logo.png')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('assets/css/styles/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

    @yield('layout_content')

<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/js/admin.js')}}"></script>


<script src="{{ asset('assets/js/table.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>
</body>

</html>
