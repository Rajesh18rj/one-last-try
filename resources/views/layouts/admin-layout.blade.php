<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>One Last Try</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/[email protected]/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/[email protected]/dist/flatpickr.min.js"></script>



    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: '{{ $errors->first() }}',
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true
        });
        @endif

    });
</script>


@yield('scripts')

<!-- Page Content -->
<main>
        @yield('content')

</main>


</body>
</html>
