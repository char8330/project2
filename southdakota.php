<?php
use Model\Travel;
use Model\ormtravel; //new
use Model\ormbrochure; 
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
	 

	 //new
	 
	 
	 
	 public function action_indexc()
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');
		
		//load the view
		$content = View::forge('southdakota/indexc'); //TODO: change this later to commentes/badlands
                
                
		//get all courses using the ORM object
		$courses = Ormtravel::find('all');

		$CoursesString;
		$JustComments;

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['id']." ".$course['user'].": ".$course['comm']; //add attraction col
			$JustComments[$key] = " ".$course['comm'];
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $CoursesString); //demos? 
		$content->set_safe('demos_comms', $JustComments);

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
		
	}

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

	public function post_indexc() //prev post add
	{
	 $session = Session::instance();
	$username = $session->get('username');
	if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin'){
	
                $result = DB::select ('comm')->from('comments')->execute(); // TODO: check if empty/no previous comments
                $count = sizeof($result);
	        $name = $count ; //mt_rand() / mt_getrandmax();
	        
	
		//extract course name, number and assignments from the input parameters
		//$name = $_POST['id'];
		//$number = $username; // $_POST['name']; // make user 
		$assignments = $_POST['comment2'];

		//create a new ORM object and populate it
		$new = new ormtravel();
		$new->id = $name; //TODO: don't specify - autoincrement
		$new->user = $username;
		$new->comm = $assignments;

		//save the ORM object
		$new->save();

		//reload the index page with the newly saved view
		Response::redirect('index.php/southdakota/indexc.php');
		
		}else{  Response::redirect('index.php/southdakota/login.php');} // make another view to add line: "Login to make comments"
	}
	 

	 
	 
	 
	 
	 
	 ///brochure
	 
	 
	 
	 
	 
	 
	 
	  public function action_indexbrochure()
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');
		
		//load the view
		$content = View::forge('southdakota/indexbrochure'); //TODO: change this later to commentes/badlands
                
                
		//get all courses using the ORM object
		$courses = Ormbrochure::find('all');

		$CoursesString;

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['id']." ".$course['user'].": ".$course['quantity']; //add attraction col
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $CoursesString); //demos? 

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
		
	}

	public function get_add() //not in use atm 
	{
		//load the layout
		$layout = View::forge('southdakota/layoutfull');

		//load the view
		$content = View::forge('southdakota/add');

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_add() //prev post add
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
		$new = new ormtravel();
		$new->id = $name;
		$new->user = $username;
		$new->quantity = $assignments;

		//save the ORM object
		$new->save();

		//reload the index page with the newly saved view
		Response::redirect('index.php/southdakota/indexbrochure.php');
		
		}else{ echo "Login to order brochures"; Response::redirect('index.php/southdakota/login.php');}
	}
	 
	 
	 
	
	 
	 
	 
	 
	 
	
	 
	 //end new
	 
	 
	 
	 
	 
	 
	 
	  public function get_commented() //TODO: MOVE CODE FROM commented.php to these 2 methods?? 
	{
                $session = Session::instance();
                $username = $session->get('username');
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                { echo "Make comments here";
                        $layout = View::forge('southdakota/layoutfull');
                        $content = View::forge('southdakota/attraction1');
                        $tr = new travel($id);
                        $content->set_safe('tr', $tr);
                        $layout->content = Response::forge($content);
                        return $layout;
                }//else{echo "Login to make comments";}
                //else shows statement "login to make comments" 
                 
        }
        public function post_commented($id = null)
        {
                $session = Session::instance();
                $username = $session->get('username');
	
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                {
                	$tr = new travel($id);
	                $tr->id = $_POST['id'];
          	        $tr->name = $_POST['name'];
                	$tr->save();
	                Response::redirect('index.php/southdakota/attraction1');
		}
		//else shows nothing
        }
	 public function action_attraction1()
	{
		$layout = View::forge('southdakota/layoutfull');
		$content = View::forge('southdakota/attraction1');
		//$content = View::forge('southdakota/commented');
		$session = Session::instance();
                $username = $session->get('username');
                $id = $session->get('userid');
		$travels = travel::getAll();
		$content->set_safe('travels', $travels);
		//KEEPS USER LOGGED IN
                if(isset($username) && isset($id))
                {       //allow comments
                        //echo "YOU ARE LOGGED IN AND CAN MAKE COMMENTS";
                        $content->set_safe('username',$username);
                        $content->set_safe('id',$id);
			$layout->content = Response::forge($content);
                        return $layout;
                }//else{echo "LOGIN TO MAKE COMMENTS";} //block comments
		//RETURN NORMAL LAYOUT
		$layout->content = Response::forge($content);
		return $layout;
	}
	 
	 
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
        public function action_view($id)
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
        public function post_addEdit($id = null)
        {
                $session = Session::instance();
                $username = $session->get('username');
	
                if($username === 'ct310' || $username === 'jtperea' || $username === 'cjh' || $username === 'aaronadmin')
                {
                	$tr = new travel($id);
	                $tr->id = $_POST['id'];
          	        $tr->name = $_POST['name'];
                	$tr->save();
	                Response::redirect('index.php/southdakota/adminIndex');
		}
		//else shows nothing
        }
        public function action_delete($id)
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
