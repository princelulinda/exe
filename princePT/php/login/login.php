<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form action="loginLogic.php" method="post">
        <h2>Connexion</h2>
        <div class="champ">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="champ">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password"  required>
        </div>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>