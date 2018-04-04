<h2>
	Shop:
	<span class="floatRight">
		<a href="<?=Uri::create('index.php/southdakota/add'); ?>">+ Add Brochure</a>
	</span>
	<span class="floatClear"></span>
</h2>

<h2>CT-310 Example</h2>

<div class="h2Content">
	<?php foreach($demos as $demo): ?>
			<?=$demo; ?><br>
	<?php endforeach; ?>
</div>
