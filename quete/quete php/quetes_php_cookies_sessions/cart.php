<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
    <?php 
            foreach($_SESSION['cart'] as $carts){
                echo $carts .'</br>';
                
            }
         ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
