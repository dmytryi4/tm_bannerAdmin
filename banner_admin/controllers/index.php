<?php
class Controller_Index Extends Controller_Base {
	
	public $layouts = "template";
	//создаем action
	function index() {
		$this->template->view('index');
	}

	function templates() {
		$this->template->view('templates');
	}

	function search() {
		$this->template->view('search');
	}

	function category() {
		$this->template->view('category');
	}

	function contact() {
		$this->template->view('contact');
	}

	function login() {
		$this->template->view('login');
		$model = new Model_Users();
		$userInfo = $model->getUser();
	}

	function logout() {
		Session::init();
		Session::destroy();
	  	header('Location:/login');
	}
	
	function admin() {
		$model = new Model_Admin();
		$check= $model->checkSession();
	
		$create = $model->createBanner();
		$getbanner = $model->getBanner();
		$this->template->vars('getbanners', $getbanner);

		$this->template->view('admin');
	}

	function editform() {
		$model = new Model_Admin();
		$editform= $model->get_edit_banner_form();
		$this->template->vars('banner', $editform);
		$this->template->view('edit');
	}

	function update() {
		$model = new Model_Admin();
		$update= $model->update_item();
	}

	function delete() {
		$model = new Model_Admin();
		$delete= $model->delete_item();
	}
}