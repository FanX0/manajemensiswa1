<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    {{-- style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>

<body>
    {{-- navbar (sidebar) --}}
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')



    {{-- script --}}
    @stack('before-script')
    <script src="/DataTables/datatables.js"></script>
    @include('includes.script')
    @stack('after-script')
    @stack('scripts')
</body>

</html>