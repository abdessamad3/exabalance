<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exa balance</title>
        <script src="/exabalance/jquery-3.7.1.min.js"></script>
        <script defer src="/exabalance/bootstrap/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link rel='icon' type="image/png" href='/exabalance/asset/siof_logo.png'/>
        <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"-->
        <link href="/exabalance/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="/exabalance/style.css" rel="stylesheet">

    </head>
        
    <body id="homepage"<?= (isset($_SESSION['user_id'])? "onload='set_interval()' onmousemove='reset_interval()' onclick='reset_interval()' onkeypress='reset_interval()' onscroll='reset_interval()'" : '')?> >
        
        <main class="main">
            <?php if (isset($_SESSION["user_id"])) {
                include('menu.php');
            }
            ?>