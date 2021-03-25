<?php

namespace App\Controllers;

use App\Models\HangHoaModel;

class DongHo extends BaseController
{
	public function index()
	{
		return view('dongho/home');
	}

	public function donghonam() {
		return view('dongho/donghonam');
	}

	// localhost:8080/dongho/info/$ma
	public function info($ma) {
		// get data on database
		$model = new HangHoaModel();
		$dongho = $model->getHangHoaTheoMa($ma);

		$data["dongho"] = $dongho;

		echo view("dongho/info", $data);
	}

}
