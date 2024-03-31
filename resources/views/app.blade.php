<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <!-- Navigation bar and other common elements -->

    <!-- Content section -->
    @yield('content')

    <!-- Chatbot component -->
    <div id="app">
        <chatbot></chatbot>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
