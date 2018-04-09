
<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C"><?php echo $attractioninfo['firstName']?></h1>
</header>
</br>

    
    
<!-- SHOP -->
<h2>
	Shop:
	<span class="floatRight">
		<a href="<?=Uri::create('index.php/southdakota/add/'.$attractioninfo['attID']); ?>">+ Add Brochure</a>
	</span>
	<span class="floatClear"></span>
</h2>

<!--<h2>Your Cart:</h2> 

<div class="h3Content">
       <?php //foreach($demos as $demo): ?> 
			//<?//=$demo; ?><br>
	<?php //endforeach; ?>
</div>
-->


<div>

<?php echo $attractioninfo['descriptionName']?>
  <!-- BODY TEXT- populate with db vars -->

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


<?php if (isset($att)|| $att!= NULL): //IF DB is empty ?> 	
                       

<div class="h2Content">

        <?php $session = Session::instance();
        $cat = 5;
        $username = $session->get('username');
        if($username === 'ct310' || $username === 'jtperea' || $username === 'aaronadmin' || $username === 'cjh' || $username === 'aaronadmin'|| $username === 'bobross')
                { //TODO:  change to only work for customers?>
                <!-- COMMENT - if customer just list all, else edit in boxes  -->

                <?php foreach($att as $a): ?>
			<?=$a['user'].": ".$a['comm']; ?><br>
                <?php endforeach; }?>
                

	

        <?php $session = Session::instance();
        $username = $session->get('username');
        if($username === 'ct310' || $username === 'jtperea' || $username === 'aaronadmin' || $username === 'cjh' || $username === 'aaronadmin')
                { //TODO:  change to only work for admin ?> 
                
                <h4>Edit or Delete </h4>
                <div class="h2Content">
                <br>
                <br>
                <?php foreach($att as $a): ?>
                	<form method="post">
			<input type="text" name="textcomms" value="<?php echo $a['comm'];?>">
			<a href="<?=Uri::create('index.php/southdakota/delete/'.$a['id']);  ?>"
		   onclick="return confirm('Are you sure you want to delete this?');">&#x1f5d1; Delete</a>
		   <a href="<?=Uri::create('index.php/southdakota/edit/'.$a['id']); ?>">&#x270E; Save Edits</a>
		   
			
			 <br>
                <?php endforeach; }?>
	
	
                <br>
</div>	
<?php endif;?>
