<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inscription à {{ $event->name }}</h1>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('registrations.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div>
                <label>Prénom</label>
                <input type="text" name="first_name" required>
            </div>
            <div>
                <label>Nom</label>
                <input type="text" name="last_name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>