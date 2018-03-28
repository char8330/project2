<?php echo $header ?>

<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">Badlands National Park</h1>
</header>
</br>
<div>
  <!-- BODY TEXT -->
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

<!-- COMMENTS -->
<div class='comments'>
    <p>Comments</p>
    <?php $session = Session::instance(); 
    $authorized = $session->get('authorized');
    if(isset($authorized)){
        echo "Make comments here";
    }else{ echo "Login to make comments"; }?>
    <?php if (isset($_POST) && !empty($_POST) && isset($authorized)): ?> 
        <?=$_POST['test']; ?>
    <?php else: ?>
        <form method= "post">
            <textarea name = "test"></textarea>
            <input type = "submit" value = "Add" />
        </form>
    <?php endif; ?>
</div>


<?php echo $footer ?>
