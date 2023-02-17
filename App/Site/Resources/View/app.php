<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= resource("css\\foxy-style.css") ?>">
</head>

<body>
    <header>
        <?php include_once "App\\Site\\Resources\\View\\base\\header.php"; ?>
    </header>
    <main>
        <?php include_once "App\\Site\\Resources\\View\\" . $view . ".php"; ?>
    </main>
    <footer>
        <?php include_once "App\\Site\\Resources\\View\\base\\footer.php"; ?>
    </footer>

    <script src="<?= resource("js\\icon.js") ?>"></script>
</body>

</html>