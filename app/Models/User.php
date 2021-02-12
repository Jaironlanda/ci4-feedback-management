<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'user';
	protected $primaryKey           = 'user_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['username', 'email', 'pswd'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	//protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'email' => 'required|valid_email',
		'pswd' 	=> 'required'
	];
	protected $validationMessages   = [
		'email' => [
			'required'		=> 'Email is required!',
			'valid_email' 	=> 'Please input valid email'
		],
		'pswd' => [
			'required' => 'Password is required!'
		]
	];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	
	// Callbacks
	
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	public function authenticate(array $data)
	{
		$builder = $this->db->table('user');
		$builder->select('username, email, pswd');
		$builder->where('email', $data['email']);
		$query = $builder->get();
		
		if(isset($query)){
			$row = $query->getRowArray();
			if(password_verify($data['pswd'], $row['pswd'])){

				//save to session
				$userSession = [
					'username' => $row['username'],
					'email'	=> $row['email'],
				];

				return $userSession;
			}else {
				return false;
			}
			//check password
			//save to session
			
			return $query->getResultArray();
		}else {
			return false;
		}
		
	}
}
