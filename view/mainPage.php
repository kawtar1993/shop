<?php

$shop=new ShopController();
//get all the shops
$shops=$shop->getShops($_SESSION['id']);
//get preferred shops
$pshops=$shop->getPreferredShops($_SESSION['id']);
?>
<div class="col-md-12 shops">
	<h1>Shop</h1>
	<?php foreach($shops as $shop){ ?>
	<div class="col-md-3">
		<p><?php echo $shop->getName(); ?></p>
		<p><img src="images/<?php echo $shop->getImage(); ?>" /></p>
		<p>Distance:<?php echo $shop->getDistance(); ?></p>
		<button type="button" class="btn btn-danger" onclick="document.getElementById('dislike-form<?php echo $shop->getId(); ?>').submit();">Dislike</button>
		<form id="dislike-form<?php echo $shop->getId(); ?>" action="treatment.php" method="POST">
            <input type="hidden" name="disshop" value="<?php echo $shop->getId(); ?>" />
        </form>
		<p></p>
		<button type="button" class="btn btn-success" onclick="document.getElementById('like-form<?php echo $shop->getId(); ?>').submit();">Like</button>
		<form id="like-form<?php echo $shop->getId(); ?>" action="treatment.php" method="POST">
            <input type="hidden" name="shop" value="<?php echo $shop->getId(); ?>" />
        </form> 
    </div>
    <?php } ?>		
</div>
<div class="col-md-12 shops pshops">
	<h1>Preferred shops</h1>
	<?php foreach($pshops as $shop){ ?>
	<div class="col-md-3">
		<p><?php echo $shop->getName(); ?></p>
		<p><img src="images/<?php echo $shop->getImage(); ?>" /></p>
		<p>Distance:<?php echo $shop->getDistance(); ?></p>
		<button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form<?php echo $shop->getId(); ?>').submit();">Remove</button> 
		<form id="delete-form<?php echo $shop->getId(); ?>" action="treatment.php" method="POST" style="display: none;">
            <input type="hidden" name="delshop" value="<?php echo $shop->getId(); ?>" />
        </form>
    </div>
    <?php } ?>		
</div>