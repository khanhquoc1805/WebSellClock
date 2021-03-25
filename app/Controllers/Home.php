<?php

namespace App\Controllers;

use App\Models\HangHoaModel;

class Home extends BaseController
{
	public function index()
	{
		$model = new HangHoaModel();
		$dshanghoa = $model->getHangHoa();

		$data["dsdongho"] = $dshanghoa;

		echo view('main', $data);
	}
}
