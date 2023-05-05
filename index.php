<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devoir PHP 3</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/master.css"/>
</head>
<body>
    <header>
        <div class="page_title"><h1>Devoir de PHP 3</h1></div>
    </header>
    <form action="./script/login.php" method="post">
        <label>
            <input class="text_input" type="text" name="username" placeholder="Username" required/>
        </label>
        <label>
            <input class="text_input" type="password" name="password" placeholder="Password" required/>
        </label>
        <input class="button" type="submit" value="Connection"/>
    </form>
</body>
</html>
