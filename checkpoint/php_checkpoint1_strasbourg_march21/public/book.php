<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <link rel="stylesheet" media="screen" href="css/book.css" type="text/css" />
    <title>Checkpoint PHP 1</title>
</head>
<body>

<?php include 'header.php'; ?>

<main class="container">

    <section class="desktop">
        
        <img src="image/whisky.png" alt="a whisky glass" class="whisky"/>
        <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky"/>
        <div class="pages">
            <div class="page leftpage">
                Add a bribe
                <!-- TODO : Form -->
                <form method="post">
                <input type="text" name="name" placeholder="name" maxlength="45">
                <input type="number" name="payment" placeholder="payment" >
                <input type="submit" name="submit" value="valider">
                </form>
            
            </div>








            <div class="page rightpage">
                <!-- TODO : Display bribes and total paiement -->
                <?php

require_once '../connec.php';
require_once 'requete.php';



                ?>

<table>
    <thead>
    <tr>
        <td>Name</td>
        <td>Payment</td>
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            <?php foreach ($recipes as $bri)
{echo $bri['name'].'<br>';}?>
</td>
        <td>
            <?php foreach ($recipes as $bri)
{echo $bri['payment'].'€'.'<br>';}?>
</td>
    </tr>
</tbody>
<tfoot>
<tr><td>
<?php
        $totalValue = $connection->query("SELECT SUM(payment) FROM bribe")->fetch();
        echo $totalValue[0]."€" ;
        ?>
        </td></tr>
<tfoot>
</table>



            </div>
        </div>
        
        <img src="image/inkpen.png" alt="an ink pen" class="inkpen"/>

    </section>
</main>
</body>
</html>
