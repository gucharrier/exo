<?php
include ('inc/header.php');
include ('lib/functions.php');

// RESET
if(isset($_GET['reset'])){
    unset($_SESSION['tombola']);
    $page = $_SERVER['PHP_SELF'];
    header('Location: '.$page);
    exit;
}

// INITIALISATION 
if(!isset($_SESSION['tombola'])){
    $_SESSION['tombola']['bankroll'] = 500;
    $_SESSION['tombola']['ticketsAvaible'] = 0;
}

$_SESSION['tombola']['ticketsAvaible'] = $_POST['userQuantity'] ?? $_SESSION['tombola']['ticketsAvaible'];

$tickets = tickets($_SESSION['tombola']['ticketsAvaible']);
$tirages=tirages();
$results=(results($tickets , $tirages));
$gains = gains($results);
$_SESSION['tombola']['bankroll'] = bankroll($_SESSION['tombola']['ticketsAvaible'],$gains);
$_SESSION['tombola']['ticketsAvaible'] = quantity($_SESSION['tombola']['ticketsAvaible'] , $_SESSION['tombola']['bankroll'] );



?>
<div class="main">
    <section class="bank">
        <div class="red">
            <h3>Bankroll</h3>
            <p><?= $_SESSION['tombola']['bankroll']." €" ;?></p>
        </div>

        <div class="form blue">
                <form action="" method="POST">
                    <label for="userQuantity" id="userQuantity">Achat de tickets (2€):</label>
                    <input type="number" name="userQuantity">
                    <input type="submit" value="Jouer">
                </form>
        </div>
    </section>
    

<?php if(isset($_POST['userQuantity']) && $_POST['userQuantity'] != null ):?>

    <div>

        <h3>Tickets</h3>
        <div class="tickets">
            <?php foreach($tickets as $ticket):?>
                <span class="ticket 
                <?php foreach($tirages as $tirage):?>
                    <?= $tirage == $ticket ? "win" : ""; ?>
                <?php endforeach ?>
                "><?= $ticket ; ?></span>
            <?php endforeach ?>
        </div>
    </div>
    <div>
        <h3>Tirage</h3>
            <div class="tirages">
                <?php foreach($tirages as $index => $value):?>
                    <span class="tirage"><?= $value ; ?></span>
                <?php endforeach ?>
            </div>
    </div>

    <div class="column">
        <div>
            <h3>Gains</h3>
            <pre><?php print_r($gains." €");?></pre>
        </div>
        <a href="?reset">reset</a>
    </div>    
<?php endif ; ?>


</div>

<?php
include ('inc/footer.php');
?>