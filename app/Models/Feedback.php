<?php

namespace App\Models;

use CodeIgniter\Model;

class Feedback extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'feedback';
	protected $primaryKey           = 'feedback_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	//protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['feedback_body', 'sender_name', 'sender_email'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	//protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'feedback_body' => 'required|min_length[4]',
		'sender_email'	=> 'required|valid_email'
	];

	protected $validationMessages   = [
		'feedback_body' => [
			'required' => 'Your valuable feedback is required',
		],
		'sender_email' => [
			'valid_email' => 'Email not valid',
			'required'	=> 'We need your email'
		]
	];

	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	/*
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	*/
}
