<?php

class Helpers {
	public $errors;

	public function accepts($request_type = 'POST') {
		$request = $_SERVER['REQUEST_METHOD'];

		if($request != $request_type) {
			http_response_code(400);
			echo json_encode(['message' => 'Request type not allowed.']);
			exit;
		}
	}

	public function input($name) {
		$post = json_decode(file_get_contents('php://input'), true);
		return (isset($post[$name]) ? $post[$name] : null);
	}

	public function validator(array $data, array $rules) {
		$err = [];
		foreach($rules as $k => $datas) {
			foreach($datas as $rules) {
				switch ($rules) {
					case 'required':
						// dd(empty(Helpers::input($k)));
						if(empty(Helpers::input($k))):
							 $err[$k] = "$k field is required";
						endif;

						break;
					
					default:
						# code...
						break;
				}
			}
		}

		$this->errors = $err;
		return (count($err) == 0 ? true : false);

	}

	public function inputs() {
		return json_decode(file_get_contents('php://input'), true);
	}
}


function dd($data) {
	return die(var_dump($data));
}
?>