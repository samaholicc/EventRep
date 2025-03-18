<!DOCTYPE html>
<html>
<head>
    <title>EventSync</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4 bg-gray-100">
        <h1 class="text-2xl font-bold text-gray-800">Événements à venir</h1>
        @if (session('success'))
            <div class="alert alert-success mt-4">{{ session('success') }}</div>
        @endif
        <a href="{{ route('events.create') }}" class="btn btn-primary mt-4">Créer un événement</a>
        <ul class="mt-4">
            @foreach ($events as $event)
                <li class="my-2">
                    {{ $event->name }} - {{ $event->date }} - {{ $event->location }}
                    <a href="{{ route('registrations.create', $event->id) }}" class="text-blue-500 hover:underline">S'inscrire</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>