<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">Pick an Attraction to View!</h1>
</header>
</br>

  <?php foreach($att as $a): ?>
			<?php //$exists = File::exists('/s/bach/k/under/char8330/fuel/app/views/southdakota/'.$demo.".php"); ?>
			<?php //if($exists === false){ 
                                     //File::create('/s/bach/k/under/char8330/fuel/app/views/southdakota/', $demo.".php", 'Contents for file.'); } ?>
                                     
                                <div class="sidebar">
                <h1>
                        <ul>
                               <!-- <?php  //<li><a href="<?=Uri::create('index.php/southdakota/attractiontemplate'); ?>"> <?php //echo $demo?> </a></li> ?> -->
                                <li><a href="<?=Uri::create('index.php/southdakota/indexc/'.$a['attID']); ?>"> <?php echo $a['firstName']?> </a></li>
                                <br>

                              
                                
                                
                        </ul>   
                        </h1>
                </div>        
                                     
                                     
                                     
                                     
                <?php endforeach; //TODO: List links for each page with title ?>
                
                
                
                
                
