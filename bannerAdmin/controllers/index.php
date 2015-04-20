<?php
class Controller_Index Extends Controller_Base {
	
	public $layouts = "template";
	//создаем action
	public function index() {
		$this->template->view('index');
	}

	public function templates() {
		$this->template->view('templates');
	}

	public function search() {
		$this->template->view('search');
	}

	public function category() {
		$this->template->view('category');
	}

	public function contact() {
		$this->template->view('contact');
	}

	public function login() {
		$this->template->view('login');
		$model = new Model_Users();
		$userInfo = $model->getUser();
	}

	public function logout() {
		Session::init();
		Session::destroy();
	  	header('Location:/login');
	}
	
	public function admin() {
		$model = new Model_Admin();
		$check= $model->checkSession();
	
		$create = $model->createBanner();
		$getbanner = $model->getBanner();
		$this->template->vars('getbanners', $getbanner);

		$this->template->view('admin');
	}

	public function editform() {
		$model = new Model_Admin();
		$editform= $model->get_edit_banner_form();
		$this->template->vars('banner', $editform);
		$this->template->view('edit');
	}

	public function update() {
		$model = new Model_Admin();
		$update= $model->update_item();
	}

	public function delete() {
		$model = new Model_Admin();
		$delete= $model->delete_item();
	}
}