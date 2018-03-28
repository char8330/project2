<?php echo $header ?>

<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">Mount Rushmore</h1>
</header>
</br>
<div>
    <!-- BODY TEXT -->
 Mount Rushmore is located in the Black Hills of South Dakota. It is best known for Mount Rushmore National Memorial, the large carvings of the president's faces (George Washington, Thomas Jefferson, Theodore Roosevelt, and Abraham Lincoln) that adorn the rock face. The faces span 60 feet tall and the width of a single eye is about 11 feet. The work of carving the faces lasted from 1927 to 1941, taking a total of 14 years to complete. A skilled sculpture named Gutzon Borglum is the creator of the monolithic piece, and he chose the faces to carve there as a celebration of America's 150 years as a free country. The faces are made of granite and well worth visiting, attracting around 3 million visitors annually.
<br>
<br>
The memorial is open from 5 A.M. - 11:30 P.M. most days of the year. Entry is free however the parking fee is $10 for private vehicles. 
<br>
<br>
</div>

<!-- IMAGES -->
<div>
    <?php echo Asset::img('mt_r_page_pic.jpg', array('class' => 'center-image')) ?>
        <a class = 'citation-link' href="https://pixabay.com/en/mount-rushmore-monument-america-2268636/">
            <cite>Mount Rushmore via pixabay</cite>
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
