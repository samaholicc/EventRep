<!DOCTYPE html>
<html>
<head>
    <title>Créer un événement</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <h1>Créer un événement</h1>
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <div>
                <label>Nom</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Date</label>
                <input type="datetime-local" name="date" required>
            </div>
            <div>
                <label>Lieu</label>
                <input type="text" name="location" required>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>
            <div>
                <label>Capacité maximale</label>
                <input type="number" name="max_capacity" min="1" required>
            </div>
            <button type="submit">Créer</button>
        </form>
    </div>
</body>
</html>