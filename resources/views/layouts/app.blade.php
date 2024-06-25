<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваш заголовок страницы</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Дополнительные стили -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Возможно, другие стили и скрипты -->
</head>
<body>
    <div class="container">
        @yield('content') <!-- Здесь будет вставлен контент из других Blade-шаблонов -->
    </div>

    <!-- Подключение Bootstrap JS и ваших собственных скриптов -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Ваши собственные скрипты -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
