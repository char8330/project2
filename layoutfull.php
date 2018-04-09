<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Travel Site</title>
                <?php echo Asset::css('southdakota.css'); ?>
                 
        </head>
        <div class="top-navbar">
                <h1>
                        <ul>
                                <li><a href="<?=Uri::create('index.php/southdakota/index'); ?>">Home</a></li>
                                <!--<br>-->

                                <li><a href="<?=Uri::create('index.php/southdakota/login'); ?>">Login</a></li>
                                <!--<br>-->
                                <li><a href="<?=Uri::create('index.php/southdakota/about'); ?>">About Us</a></li>
                                <!--<br>-->

                                <li><a href="<?=Uri::create('index.php/southdakota/adminIndex'); ?>">Admin</a></li>
                                <!--<br>-->
                                
                                
                                 <li><a href="<?=Uri::create('index.php/southdakota/allattractions'); ?>"> All Attractions</a></li>
                                <!--<br>-->
                                
                                 <li><a href="<?=Uri::create('index.php/southdakota/indexbrochure'); ?>"> Cart</a></li>
                                <!--<br>-->
                              
                                
                                
                        </ul> 
                        </h1>
                </div>
        <body>
                <div id="header">
                    <h1>Travel Site
                        <div id="logo">
                            <?php echo Asset::img("SC_Logo.png",array("width" => "90"));?>
                </div></h1>

                </div> 
                <!--$content is called by the controller located in fuel/app/classes/controller-->

                <div id="body">
                        <?=$content; ?>
                </div>
               <br>
                <div id="footer">
                        This site is part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project <a href="<?=Uri::create('index.php/southdakota/logout'); ?>">Logout</a></li>
            
                </div>
        </body>
</html>
