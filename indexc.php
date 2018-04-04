
<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">Badlands National Park</h1>
</header>
</br>

    
    
<!-- SHOP -->
<h2>
	Shop:
	<span class="floatRight">
		<a href="<?=Uri::create('index.php/southdakota/add'); ?>">+ Add Brochure</a>
	</span>
	<span class="floatClear"></span>
</h2>

<!--<h2>Your Cart:</h2> 

<div class="h3Content">
       <?php foreach($demos as $demo): ?> 
			<?=$demo; ?><br>
	<?php endforeach; ?>
</div>
-->


<div>
  <!-- BODY TEXT- populate with db vars -->
The Badlands is a National Park in the southern part of the state. The area contains striking and jagged rock formations as well as a multitude of fossil beds. Many ancient mammals are thought to have roamed this area once, such as saber-toothed tigers. Today you can spot bison, prairie dogs and many bird species throughout it's flowing plains. There are many popular trails and day hikes for all abilities and ages in the Badlands National Park as well as two campgrounds and park ranger services and tours. The park spans over 200,000 acres and attracts around 1 million visitors each year. The park and campgrounds are open year-round. Don't forget your camera as there are many beautiful natural sight you will want to capture!
<br>
<br>
</div>

<!-- IMAGES -->
<div>
    <?php echo Asset::img('badlands_page.jpg', array('class' => 'center-image')) ?>
        <a class = 'citation-link' href="https://www.goodfreephotos.com/united-states/south-dakota/badlands-national-park/">
            <cite>Badlands National Park via goodfreephotos</cite>
        </a>
    </img>
</div>

</br>



<!-- COMMENT - if customer just list all, else edit in boxes  -->
<h2>
	Comment Here:

</h2>
	<div class="h2Content">
	Add Comment
	<form method="post">
		
		<input type="text" name="comment2" />
		<br />
		<input type="submit" value="Add Comment" />
	</form>
        </div>

	<br>
	<br>
	
</div>
<h4>Past Comments: </h4>




<div class="h2Content">

        <?php $session = Session::instance();
        $cat = 5;
        $username = $session->get('username');
        if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin' || $username === 'cjh' || $username === 'aaronadmin')
                { //TODO:  change to only work for customers?>
                <!-- COMMENT - if customer just list all, else edit in boxes  -->
                <?php foreach($demos as $demo): ?>
			<?=$demo; ?><br>
                <?php endforeach; }?>
                

	

        <?php $session = Session::instance();
        $username = $session->get('username');
        if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin' || $username === 'cjh' || $username === 'aaronadmin')
                { //TODO:  change to only work for admin ?> 
                
                <h4>Edit or Delete </h4>
                <div class="h2Content">
                <br>
                <br>
                <?php foreach($demos_comms as $demo): ?>
                	<form method="post">
                	 
			<input type="text" value="<?php echo $demo;?>">
			<input type="submit" value="Save Edits" />
			<input type="submit" value="Delete" />
			 <br>
                <?php endforeach; }?>
	
	
                <br>
</div>	
