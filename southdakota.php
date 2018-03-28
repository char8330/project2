<?php
/**
 * The South Dakota Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_SouthDakota extends Controller
{


//TEST comm w/ db


   public function action_printCustomer()
       {
      
       
       $result = DB::select ('firstName')->from('students')->where('age',19)->execute();
       $firstName = $result[0]['firstName'];
       print($firstName);
       
       //return View::forge('southdakota/db', $views);
       }

//end TEST comm w/ db


	/**
	 * Index Page
	 *
	 * @access  public
	 * @return  View
	 */
	public function action_index() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/index', $views);
    }

    /**
	 * Login Page
	 *
	 * @access  public
	 * @return  View
	 */
    public function action_login() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/login', $views);
    }

    /**
	 * Mt Rushmore Page
	 *
	 * @access  public
	 * @return  View
	 */
    public function action_mt_rushmore() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/mt_rushmore', $views);
    }

    /**
    * Badlands National Park Page
    *
    * @access  public
    * @return  View
    */
    public function action_badlands() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/badlands', $views);
    }

    /**
     * Crazy Horse Page
     *
     * @access  public
     * @return  View
     */
    public function action_crazy_horse() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/crazy_horse', $views);
    }

    /**
	 * About Page
	 *
	 * @access  public
	 * @return  Response
	 */
    public function action_about() {
        $views = array();
        $views['header'] = View::forge('southdakota/header')->render();
        $views['footer'] = View::forge('southdakota/footer')->render();
        return View::forge('southdakota/about', $views);
    }

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404() {
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
