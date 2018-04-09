<h2>
	Shopping Cart
	<span class="floatClear"></span>
</h2>

<div class="h2Content">
	<?php foreach($brochures as $b):  //TODO: ONLY GET ELEMENTS FROM 1 USER who is LOGGED in - check logged in too -- CURRENTLY BEING BAD?>
	
	
	                <form method="post">
	                <?php echo $b['attraction'].": Quantity" ;?>
			<input type="text" value="<?php echo $b['quantity'];?>">
			<a href="<?=Uri::create('index.php/southdakota/deleteb/'.$b['id']); ?>"
		   onclick="return confirm('Are you sure you want to delete this?');">&#x1f5d1; Delete</a>
		   <a href="<?=Uri::create('index.php/southdakota/editb/'.$b['id']); ?>">&#x270E; Save Edits</a>
		   <br>
		   
		   
	<?php endforeach; ?>
	<br>
	<br>
	
	<div class="h2Content">
		<a href="<?=Uri::create('index.php/southdakota/order/'.$b['id']); ?>"
		   onclick="return confirm('Are you sure you want to place this order?');">ORDER NOW</a>
	</form> 
</div>
</div>
