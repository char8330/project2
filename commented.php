
<div class='comments'>
    <p>Comments</p>
<!-- A. Loads comments from prev sessions-->


</br>
<!-- A. END: attempt to add prev comments-->
    <?php $session = Session::instance();
      $username = $session->get('username');
      if($username === 'ct310' || $username === 'jtperea')
                {      //add comments from previous sessions (all admin)
                $result = DB::select ('comm')->from('comments')->execute(); // TODO: check if empty/no previous comments
                $result2 = DB::select ('user')->from('comments')->execute(); // TODO: check if empty/no previous comments
                $count = sizeof($result);

                
                for($x = 0; $x <= $count; $x++){ 
                $c1 = $result[$x]['comm'];
                $user1 = $result2[$x]['user'];
                print($c1); print($user1);?>
                <br>
                <br>
                <?php } ?>
                <br>
                <br>

               <?php echo "Make comments here";
      }else{ echo "Login to make comments"; }?>
      
      
    <?php if (isset($_POST) && !empty($_POST) && ($username === 'ct310' || $username === 'jtperea')): ?>
    <?=$_POST['test'];$test=$_POST['test'];?>
       <!-- $test variable stores current comment, TODO: currently admin can only add one comment per session-->

    <?php
    
    
//TODO: create column for which attraction the comment is on? Connect this to the correct page when loading
    list($insert_id, $rows_affected) = DB::insert('comments')->set(array( //adds 1 comment to db
    	'id' => 5, //TODO: make this update for each new comment???
    	'user' => $username, 
    	'comm' => $test,
    ))->execute();
    ?>

    <?php else: ?>
        <form method= "post">
            <textarea name = "test"></textarea>
            <input type = "submit" value = "Add" />
        </form>
    <?php endif; ?>
</div>
