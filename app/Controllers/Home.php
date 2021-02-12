<?php

namespace App\Controllers;

use App\Models\Feedback;

class Home extends BaseController
{
	
	public function index()
	{
		return view('welcome_message');
	}

	public function feedback()
	{
		$data['title'] = "User Feedback";
		
		$modelFeedback = new Feedback();
		
		if($this->request->getMethod() == 'post'){
			
			$feedback_data = [
				'feedback_body' => esc($this->request->getPost('feedback_body')),
				'sender_name'	=> esc($this->request->getPost('sender_name')),
				'sender_email'	=> esc($this->request->getPost('sender_email'))
			];
			
			if($modelFeedback->save($feedback_data) === false){
				$data['errors'] = $modelFeedback->errors();
				// return view('main_feedback', $data);
			}
		}
		return view('main_feedback', $data);
	}
}
