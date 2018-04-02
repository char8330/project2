<div class="h2Content">
	Add or Edit
	<form method="post">
                <label for="id">ID: </label>
                <input type="text" name="id" value="<?=isset($travel->id)?$travel->id:''; ?>" />
                <br />
		<label for="name">Attraction Name:</label>
		<input type="text" name="name" value="<?=isset($travel->name)?$travel->name:''; ?>" />
		<br />
		<input type="submit" value="Add/Edit" />
	</form>
</div>
