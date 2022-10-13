<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./style.css">


    <title> <?php if (isset($titre)) {
            echo $titre;
        } else {
            echo 'Mon site';
        } ?> </title>
</head>
<body>
<header>
    <nav>
        <h2>Mon site</h2>
        <ul>

            <li>
                <a href="index.php?page=home">Home</a>
            </li>
            <li>
                <a href="index.php?page=contact">Contact</a>
            </li>
        </ul>
    </nav>
</header>



