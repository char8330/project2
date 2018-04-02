<h2>
	Index of Attractions
	<span class="floatRight">
		<a href="<?=Uri::create('index.php/southdakota/addEdit'); ?>">+ Add Attraction</a>
	</span>
	<span class="floatClear"></span>
</h2>
	<?php foreach($travels as $travel): ?>
		<a href="<?=Uri::create('index.php/southdakota/view/'.$travel->id); ?>">
			<?=$travel; ?>
		</a><br />
	<?php endforeach; ?>
</div>
