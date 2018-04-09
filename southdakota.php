<?php
use Model\Travel;
use Model\ormtravel; //new
use Model\ormbrochure; 
use Model\ormattraction;
/**
 * Travel Controller
 * use public function name() to add a page
 * shares $layout = View::forge('southdakota/layoutfull'); with all pages
 * checks if username and password is set on all pages
 */
class Controller_SouthDakota extends Controller
{
	/**
	 * Shows a list of all travel items
	 */
	 
	 
	       public function get_addEdit($id = null)
        {
                $session = Session::instance();
                $username = $session->get('username');
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                {
                        $layout = View::forge('southdakota/layoutfull');
                        $content = View::forge('southdakota/addEdit');
                        $tr = new travel($id);
                        $content->set_safe('tr', $tr);
                        $layout->content = Response::forge($content);
                        return $layout;
                }
                //else shows nothing
        }
                public function post_addEdit()
        {
                $session = Session::instance();
                $username = $session->get('username');
	
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                {
                
                $result = DB::select ('attID')->from('a')->execute(); // TODO: check if empty/no previous comments
                $count = sizeof($result);
	        $name = $count ; //mt_rand() / mt_getrandmax();
	        
                	$tr = new ormattraction();
	                $tr->attID = $name;
	                $tr->firstName = $_POST['att_title'];
          	        $tr->descriptionName = $_POST['att_description'];
                	$tr->save();
	                Response::redirect('index.php/southdakota/allattractions');
		}
		//else shows nothing
        }

	        public function action_adminIndex()
        {
		$session = Session::instance();
                $username = $session->get('username');
		if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
		{
                	$layout = View::forge('southdakota/layoutfull');
        	        $content = View::forge('southdakota/adminIndex');
	
                	$travels = travel::getAll();
        	        $content->set_safe('travels', $travels);
	                $layout->content = Response::forge($content);
                	return $layout;
                	
                	
                	
                	
                	
                	
		}else{echo "You must be an admin to access this page! Please login with your admin id";}
		//else shows nothing
        }
	 
	 
	 //all attractions
	  public function action_allattractions()
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');
		
		//load the view
		$content = View::forge('southdakota/allattractions'); //TODO: change this later to commentes/badlands
                
                
		//get all courses using the ORM object
		$courses = Ormattraction::find('all');

		$AttractionString;
		$JustTitle;
		

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$AttractionString[$key] = $course['attID']." ".$course['firstName'].": ".$course['descriptionName'].": ".$course['img']; //add attraction col
			$JustTitle[$key] = " ".$course['firstName'];
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $AttractionString); //demos? 
		$content->set_safe('demos_title', $JustTitle);
		
		$content->set_safe('att', $courses);
		
		//$content->set_safe('demos', $courses);
		

		//forge inner view
		$layout->content = Response::forge($content);
		
		
		
		 //loop through attractions and add
                 //$exists = File::exists('/s/bach/k/under/char8330/fuel/app/views/southdakota/', 'testthisone123.php');
	         //if($exists === false){
                //foreach($JustTitle as $demo){
                     //echo $demo;}
			//File::create(DOCROOT, $demo+'.php', 'Contents for file.');}
                //endforeach; }
		
		

		return $layout;
		
	}
	
	//end all attractions 
	 
	 
	 public function action_indexc($id)
	{

		//load the layout
		$layout = View::forge('southdakota/layoutfull');
		
		//load the view
		$content = View::forge('southdakota/indexc'); //TODO: change this later to commentes/badlands
                $demo = Ormattraction::find($id); //extract attraction from id 
		$content->set_safe('attractioninfo', $demo);
                
		//get all courses using the ORM object
		//$courses = Ormtravel::find('all'); //this is the array
                $courses = ormtravel::find('all', array('where' => array('attraction' => $demo['firstName'])));
                $content->set_safe('att', $courses);
                if ($courses == NULL) {		
                        echo 'it is null'; $layout->content = Response::forge($content);
                        return $layout;
                        }else{
                        
		$CoursesString;
		$JustComments;

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['user'].": ".$course['comm']; //add attraction col
			//$CoursesString[$key] = $course['id']." ".$course['user'].": ".$course['comm']; //add attraction col
			$JustComments[$key] = " ".$course['comm'];
			$JustIds[$key] = $course['id'];
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $CoursesString); //demos? 
		$content->set_safe('demos_comms', $JustComments);
		$content->set_safe('demos_ids', $JustIds);
		
		$content->set_safe('att', $courses);

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;}
		
	}
	
	
// 	
	//public function get_add() //not in use atm 
	//{
		//load the layout
	//	$layout = View::forge('southdakota/layoutfull');

		//load the view
	//	$content = View::forge('southdakota/add');

		//forge inner view
	//	$layout->content = Response::forge($content);

	//	return $layout;
	//}
	
	
                public function post_edit()
	{ 
                        $entry = ormtravel::find( $_POST['id']);
                        //$entry->user = $username; //TODO: edits keep name of org poster or admin who edited? 0- attach to each $demo
                        $att_name = $_POST['attraction_name'];
                        $newcomment = $_POST['textcomms'];
                        
                        $courses = ormattraction::find('first', array('where' => array('firstName' => $att_name)));
                        
                        $entry->comm = $newcomment;
                        $entry->save();
                // attach urls to correct attraction index ....indexc/attractionttitle ideally 
                Response::redirect('index.php/southdakota/indexc/'.$courses['attID']);
	}
	
	
		public function action_delete($id)
	{      // if (isset($_POST['delete'])) {
		$a = ormtravel::find($id);
		//$gone = $demo->__toString();
		$a->delete();
		//Session::set_flash('flash', array('msg' => "Demo $gone Deleted!", 'type' => 'success'));
		//}
		Response::redirect('index.php/southdakota/allattractions');
		
		
	}
	
	//brochure delete/edit
	
	
                public function action_editb($id)
	{ 
                        $b = ormbrochure::find($id);
                        //$entry->id = 'My first edit';
                        //$entry->user = $username; //TODO: edits keep name of org poster or admin who edited? 0- attach to each $demo 
                        $b->quantity = 0;
                        $b->save();
                // attach urls to correct attraction index ....indexc/attractionttitle ideally 
                Response::redirect('index.php/southdakota/indexbrochure');
	}
	
	
		public function action_deleteb($id)
	{      // if (isset($_POST['delete'])) {
		$b = ormbrochure::find($id);
		//$gone = $demo->__toString();
		$b->delete();
		//Session::set_flash('flash', array('msg' => "Demo $gone Deleted!", 'type' => 'success'));
		//}
		Response::redirect('index.php/southdakota/indexbrochure');
		
		
	}

	public function post_indexc($id) //prev post add
	{
	
	
	 $session = Session::instance();
	$username = $session->get('username');
	//if logged in 
	if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin'){
	
                $result = DB::select ('comm')->from('comments')->execute(); // TODO: check if empty/no previous comments
                $count = sizeof($result);
	        $name = $count ; //mt_rand() / mt_getrandmax();
	        
	
		//extract course name, number and assignments from the input parameters
		//$name = $_POST['id'];
		//$number = $username; // $_POST['name']; // make user 
		if (isset($_POST['comment2'])) {
		$assignments = $_POST['comment2'];

		//create a new ORM object and populate it
		$new = new ormtravel();
		$new->id = $name; //TODO: don't specify - autoincrement
		$new->user = $username;
		$new->comm = $assignments;
				
		
		$att= ormattraction::find($id);
		$new->attraction = $att['firstName'];

		//save the ORM object
		$new->save();
		}
		
		
		
   
		//reload the index page with the newly saved view
		Response::redirect('index.php/southdakota/indexc/'.$id);
		
		}else{  Response::redirect('index.php/southdakota/login');} // make another view to add line: "Login to make comments"
	}
	 

	 
	 
	 
	 
	 
	 ///brochure
	 
	 
	       public function action_order($id)
	{       $session = Session::instance();
                $username = $session->get('username');
                $courses = ormbrochure::find('all', array('where' => array('user' => $username)));// find brochure related to specific attraction 
                // attach urls to correct attraction index ....indexc/attractionttitle ideally 
                
                //delete entire list of brcoochures
 
		//this loop converts all courses to a single string and stores them in $CoursesString
		
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['attraction'].": ".$course['quantity'].",\n "; //add attraction col
		
		}
                $msg=implode(" ",$CoursesString);
		//set the courses to the view for printing
		//$content->set_safe('demos', $CoursesString); //demos? 
		
		//$content->set_safe('att', $courses);
		
		
                $session = Session::instance();
                $username = $session->get('username');
                if ($username === 'cjh'){
		mail("cassidyharless95@gmail.com","Your Recent Brochure Order",$msg);
		}
                if ($username === 'jtperea'){
		mail("jtperea@rams.colostate.edu","Your Recent Brochure Order",$msg);
		}
                
                
                //$used = ormtravel::find('all', array('where' => array('attraction' => $demo['firstName'])));
                // prepare a delete statement// prep 
                //$query = DB::delete('user');

                // Set the table to delete from
               // $query->table('brochure')->execute();
                
                //$b = ormbrochure::find($id);
		//$gone = $demo->__toString();
		//$b->delete();
                
                Response::redirect('index.php/southdakota/indexbrochure');
	}
	 
	 
	 
	 
	  public function action_indexbrochure()
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');
		
		//load the view
		$content = View::forge('southdakota/indexbrochure'); //TODO: change this later to commentes/badlands
                
                
                $session = Session::instance();
                $username = $session->get('username');
	
		//get all courses using the ORM object - change to get ALL from ONE USER ---username 
		//$courses = Ormbrochure::find('all');
		
		// find all articles from category 1 order descending by date
		
                $courses = ormbrochure::find('all', array('where' => array('user' => $username)));
                
                $content->set_safe('brochures', $courses); //demos? 

                

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
		
	}
	
	public function post_indexbrochure($id) //prev post add
	{
	
	
	 $session = Session::instance();
	$username = $session->get('username');
	//if logged in 
	if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin'){
	
		if (isset($_POST['comment2'])) {
		$assignments = $_POST['comment2'];

		
		}

		//reload the index page with the newly saved view
		Response::redirect('index.php/southdakota/indexc/'.$id);
		
		}else{  Response::redirect('index.php/southdakota/login');} // make another view to add line: "Login to make comments"
	}
	 

	public function get_add($attid) //not in use atm 
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');

		//load the view
		$content = View::forge('southdakota/add');

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_add($attid) //prev post add
	{
	 $session = Session::instance();
	$username = $session->get('username');
	if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin'){
	
                $result = DB::select ('quantity')->from('brochure')->execute(); // TODO: check if empty/no previous comments
                $count = sizeof($result);
	        $name = $count ; //mt_rand() / mt_getrandmax();
	
		//extract course name, number and assignments from the input parameters
		//$name = $_POST['id'];
		//$number = $username; // $_POST['name']; // make user 
		$assignments = $_POST['quantity'];


		//create a new ORM object and populate it
		$new = new ormbrochure();
		$new->id = $name;
		$new->user = $username;
		$new->quantity = $assignments;
		
		//find attraction
		$att_name = ormattraction::find($attid);
		$new->attraction = $att_name['firstName'];

		//save the ORM object
		$new->save();

		//reload the index page with the newly saved view
		Response::redirect('index.php/southdakota/indexbrochure.php');
		
		}else{ echo "Login to order brochures"; Response::redirect('index.php/southdakota/login.php');}
	}
	 
	 
	 
	
	 
	 
	 
	 
	 
	
	 
	 //end new
	 
	 
	 
	 
	 
	 
//		INDEX PAGE		//
	public function action_index()
	{
		$layout = View::forge('southdakota/layoutfull');
		$content = View::forge('southdakota/index');
		$session = Session::instance();
                $username = $session->get('username');
                $id = $session->get('userid');
		$travels = travel::getAll();
		$content->set_safe('travels', $travels);
		//KEEPS USER LOGGED IN
                if(isset($username) && isset($id))
                {
                        $content->set_safe('username',$username);
                        $content->set_safe('id',$id);
			$layout->content = Response::forge($content);
                        return $layout;
                }
		//RETURN NORMAL LAYOUT
		$layout->content = Response::forge($content);
		return $layout;
	}
	
//		ABOUT SECTION		//
                public function action_about()
        {
                $layout = View::forge('southdakota/layoutfull');
                $content = View::forge('southdakota/about');
                $session = Session::instance();
                $username = $session->get('username');
                $id = $session->get('userid');
                $travels = travel::getAll();
                $content->set_safe('travels', $travels);
		//KEEPS USERS LOGGED IN
                if(isset($username) && isset($id))
                {
                        $content->set_safe('username',$username);
                        $content->set_safe('id',$id);
                        $layout->content = Response::forge($content);
                        return $layout;
                }
		//RETURNS NORMAL LAYOUT
                $layout->content = Response::forge($content);
                return $layout;
        }

            //		SEND EMAIL FOR PASSWORD RESET		//
        	public function action_forgot()
	{
		$layout = View::forge('southdakota/layoutfull');
		$content = View::forge('southdakota/forgot');
		$session = Session::instance();
		$username = $session->get('username');
		$id = $session->get('userid');
		$travels = travel::getAll();
		$content->set_safe('travels', $travels);
		//RETURN NORMAL LAYOUT
		$layout->content = Response::forge($content);
		return $layout;
	}

	       //			PASSWORD RESET			//
        	public function action_reset()
	{
		$layout = View::forge('southdakota/layoutfull');
		$content = View::forge('southdakota/reset');
		$session = Session::instance();
		$username = $session->get('username');
		$id = $session->get('userid');
		$travels = travel::getAll();
		$content->set_safe('travels', $travels);
		//RETURN NORMAL LAYOUT
		$layout->content = Response::forge($content);
		return $layout;
	}

//		LOGIN SECTION		//
	public function action_login()
        {
                $layout = View::forge('southdakota/layoutfull');
		$status = 'success';
                $content = View::forge('southdakota/login');;
                $travels = travel::getAll();
                $content->set_safe('travels', $travels);
		$content->set_safe('status', $status);
                $layout->content = Response::forge($content);
         
                return $layout;
        }
//		CHECKS SUCCESSFUL LOGIN			//
        public function action_checkLogin()
        {
		$layout = View::forge('southdakota/layoutfull');
                $username = Input::post('username');
                $password = Input::post('password');
		//hardcoded users & passwords
                if(($username === 'ct310' && md5($password) === 'a6cebbf02cc311177c569525a0f119d7') || ($username === 'jtperea' && md5($password) === 'f869ce1c8414a264bb11e14a2c8850ed') || ($username === 'cjh' && md5($password) === '20ee80e63596799a1543bc9fd88d8878'))
                {
                        Session::create();
                        Session::set('username', $username);
                        Session::set('userid', 12345);
                        $content = View::forge('southdakota/index');
			$travels = travel::getAll();
	                $content->set_safe('travels', $travels);
			$layout->content = Response::forge($content);
                        return $layout;
                }
                else
                {
			$content = View::forge('southdakota/login');
			$travels = travel::getAll();
                        $content->set_safe('travels', $travels);
                        $content->set_safe('status','error');
			$layout->content = Response::forge($content);
                        return $layout;
                }
        }
//			LOGOUT PAGE		//
        public function action_logout()
        {
                $session = Session::instance();
                $session->destroy();
                $content = View::forge('southdakota/logout');
                return $content;
        }
//			FOR ADMIN CONTROL		//
        public function action_view2($id)
        {
                $session = Session::instance();
                $username = $session->get('username');
		//only viewable by admin accounts
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                {		
                	$layout = View::forge('southdakota/layoutfull');
	                $content = View::forge('southdakota/view');
        	        $tr = new travel($id);
                	$content->set_safe('tr', $tr);
	                $layout->content = Response::forge($content);
        	        return $layout;
		}
		//else show nothing
        }
	 
	 
        public function action_delete2($id)
        {
                $session = Session::instance();
                $username = $session->get('username');
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
		{
                	$tr = new travel($id);
	                $tr->delete();
        	        Response::redirect('index.php/southdakota/adminIndex');
		}
		//else shows nothing
        }
//			END OF ADMIN CONTROL		//
//			ERROR PAGE			//
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
