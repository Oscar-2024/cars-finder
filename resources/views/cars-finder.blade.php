<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de coches</title>
    @vite(['resources/scss/styles.scss'])
</head>
<body>
    <div class="container-fluid">
        @livewire('cars-finder')
    </div>
</body>
</html>
