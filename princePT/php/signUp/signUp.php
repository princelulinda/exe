<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="signUpLogic.php" method="post">
        <h2>Inscription</h2>

        <div class="champ">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="name" required>
        </div>

        <div class="champ">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="champ">
            <label for="password">Password :</label>
            <input type="password" id="Password" name="password"  required>
        </div>

        <div class="champ">
            <label for="confirmPassword">confirm Password :</label>
            <input id="confirmPassword" name="confirmPassword" rows="5" type="password" required></input>
        </div>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>