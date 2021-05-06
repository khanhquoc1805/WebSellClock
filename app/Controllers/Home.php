<?php

namespace App\Controllers;

use App\Models\HangHoaModel;
use \Firebase\JWT\JWT;

class Home extends BaseController
{
	protected $key = "this is a secret!!!";

	public function index()
	{
		if (isset($_COOKIE['dadangnhap'])) {
			$jwt = $_COOKIE['dadangnhap'];
			$decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
        	$decoded_array = (array) $decoded;
        	if ($decoded_array['role'] === 'admin') {
				echo "<script>document.location.href = '/Admin/home';</script>";
				return;
			}
		}

		$model = new HangHoaModel();
		$dshanghoa = $model->getHangHoa();

		$data["dsdongho"] = $dshanghoa;

		echo view('main', $data);
	}

	
}
