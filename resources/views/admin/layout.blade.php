
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>Admin Panel</title>


@include('admin.components.header_scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('admin.components.nav')
        @include('admin.components.sidebar')



        @yield('main')



    </div>
</div>

@include('admin.components.footer_scripts')

</body>
</html>
