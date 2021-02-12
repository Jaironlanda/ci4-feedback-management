<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Models\Feedback;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	/**
	 * Login
	 * @return void
	 */
	public function login()
	{
		$data['title'] = "Admin area";
		
		if($this->request->getMethod() == 'post'){
			if($this->validate('login')){
				
				$modelUser = new User();
			
				$login_data = [
					'email' => esc($this->request->getPost('email')),
					'pswd'  => esc($this->request->getPost('pswd')),
				];

				$login = $modelUser->authenticate($login_data);

				if($login != false){
					$this->session->set('logged_in', $login);
					$this->session->setFlashdata('message_noti', 'Welcome Back!');
					return redirect()->to('/dashboard');
				}else {
					$this->session->setFlashdata('message_error', 'Invalid email or password');
				}

			}else {
				$data['validation'] = $this->validator;
			}
		}
		return view('admin/login', $data);
	}

	/**
	 * Logout
	 * @return void
	 */
	public function logout()
	{
		unset($_SESSION['logged_in']);
		return redirect()->to('/login')->with('message_noti', 'Success Logout');
	}

	/**
	 * List of feedback
	 * @return void
	 */
	public function index()
	{
		//check session
		if(!$this->session->has('logged_in')){
			$this->session->setFlashdata('message_error', 'Access Deny.');
			return redirect()->to('/login');
        }

		$modelFeedback = new Feedback();
		$data['title'] = "Admin Dashboard: Index";
		$data['total_feedback'] = $modelFeedback->countAll();
		$data['feedback_list'] = $modelFeedback->select('feedback_id, feedback_body, sender_name, sender_email, created_at')->findAll();

		return view('admin/dashboard', $data);

	}

	/**
	 * View feedback
	 * @param int feedback id
	 * @return void
	 */
	public function view(int $feedback_id)
	{
		//check session
		if(!$this->session->has('logged_in')){
			$this->session->setFlashdata('message_error', 'Access Deny.');
			return redirect()->to('/login');
        }

		$modelFeedback = new Feedback();
		$data['title'] = "View Feedback";

		if(!is_null($modelFeedback->find($feedback_id))){
			$data['feedback'] = $modelFeedback->find($feedback_id);
		}else {
			$this->session->setFlashdata('message_error', 'Feedback not exist!');
			return redirect()->to('/dashboard');
		}
		return view('admin/view_feedback', $data);

	}

	/**
	 * Delete feedback
	 * @param int feedback id
	 * @return void
	 */
	public function delete(int $feedback_id)
	{
		if(!$this->session->has('logged_in')){
			$this->session->setFlashdata('message_error', 'Access Deny.');
			return redirect()->to('/login');
        }

		$modelFeedback = new Feedback();
		if(!is_null($modelFeedback->find($feedback_id))){
			$modelFeedback->delete(['feedback_id'=> $feedback_id]);
			$this->session->setFlashdata('message_noti', 'Success delete feedback!');
		}else {
			$this->session->setFlashdata('message_error', 'Feedback not exist!');
		}
		return redirect()->to('/dashboard');
	}

}