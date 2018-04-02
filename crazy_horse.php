<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">Crazy Horse Memorial</h1>
</header>
</br>
<div>
    <!-- BODY TEXT -->
    Crazy Horse Memorial is located in the Black Hills of South Dakota. It is currently still under construction and has been in the works since 1948. Though remaining far from completion this carving is an impressive site to see. The height of the head of Crazy Horse stands even taller than those of the president's at Mount Rushmore, spanning 87 feet. Also at the site are the Indian Museum of North America and a Native American Cultural Center for visitors to explore and learn more about the areas history and culture. Crazy Horse was a leader of the Oglala Lakota. He led Native Americans into battle at the Battle of Little Bighorn and the Fetterman Fight. The sculptor was Korczak Ziolkowski who worked alongside Lakota Chief Henry Standing Bear to begin the carving in 1948.
    <br>
    <br>
</div>

<!-- IMAGES -->
<div>
    <?php echo Asset::img('crazy_horse_page.jpg', array('class' => 'center-image')) ?>
        <a class = 'citation-link' href="https://pixabay.com/en/crazy-horse-usa-mountains-mountain-2646548/">
            <cite>Crazy Horse Monument via pixabay</cite>
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
