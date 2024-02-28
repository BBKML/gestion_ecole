<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <!-- Les liens vers les styles CSS, les scripts JavaScript, etc., peuvent être ajoutés ici -->
</head>
<body>

    <header>
        <!-- Votre en-tête (barre de navigation, titre, etc.) peut être placé ici -->
    </header>

    <main>
        @yield('content') <!-- C'est où le contenu spécifique de chaque page sera injecté -->
    </main>

    <footer>
        <!-- Votre pied de page peut être placé ici -->
    </footer>

</body>
</html>
