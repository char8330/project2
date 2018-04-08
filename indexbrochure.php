<h2>
	Shop:
	<span class="floatClear"></span>
</h2>

<h2>Cart</h2>

<div class="h2Content">
	<?php foreach($brochures as $b):  //TODO: ONLY GET ELEMENTS FROM 1 USER who is LOGGED in - check logged in too -- CURRENTLY BEING BAD?>
	
	                <?php $session = Session::instance();
                        $username = $session->get('username'); 
                        $usercheck = $b['user']; ?>
                        <?php if ($username = $usercheck): ?>
	
	                <form method="post">
	                <?php echo $b['attraction'].": Quantity" ;?>
			<input type="text" value="<?php echo $b['quantity']." ".$usercheck." ".$username;?>">
			<a href="<?=Uri::create('index.php/southdakota/deleteb/'.$b['id']); ?>"
		   onclick="return confirm('Are you sure you want to delete this?');">&#x1f5d1; Delete</a>
		   <a href="<?=Uri::create('index.php/southdakota/editb/'.$b['id']); ?>">&#x270E; Save Edits</a>
		   <br>
		   <?php else: echo 'cart empty'?>
		   <?php endif ?>
	<?php endforeach; ?>
</div>
