<?php

use Model\Travel;
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
                if(($username === 'ct310' && md5($password) === 'a6cebbf02cc311177c569525a0f119d7') || ($username === 'jtperea' && md5($password) === 'f869ce1c8414a264bb11e14a2c8850ed') )
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

                $content = View::forge('travel/logout');

                return $content;
        }

//			FOR ADMIN CONTROL		//
        public function action_view($id)
        {
                $session = Session::instance();
                $username = $session->get('username');

		//only viewable by admin accounts
                if($username === 'ct310' || $username === 'jtperea')
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

		if($username === 'ct310' || $username === 'jtperea')
		{
                	$layout = View::forge('southdakota/layoutfull');

        	        $content = View::forge('southdakota/adminIndex');
	
                	$travels = travel::getAll();

        	        $content->set_safe('travels', $travels);

	                $layout->content = Response::forge($content);

                	return $layout;
		}
		//else shows nothing
        }

	       public function get_addEdit($id = null)
        {
                $session = Session::instance();
                $username = $session->get('username');

                if($username === 'ct310' || $username === 'jtperea')
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
	
                if($username === 'ct310' || $username === 'jtperea')
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

                if($username === 'ct310' || $username === 'jtperea')
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
