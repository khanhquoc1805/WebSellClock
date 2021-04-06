<?php

namespace App\Controllers;

use App\Models\HangHoaModel;
use App\Models\KhachHangModel;
use App\Models\GioHangModel;
use App\Models\ChiTietGioHangModel;
use \Firebase\JWT\JWT;

class KhachHang extends BaseController
{

	protected string $key = "this is a secret!!!";


	private function redirectDangNhap() {
		if (!isset($_COOKIE['dadangnhap'])) {
			echo "<script>document.location.href = '/khachhang/dangnhap';</script>";
			return;
		}
	}
	 
    public function dangki(){
        if(isset($_POST['taikhoan']) && isset($_POST['matkhau']) && isset($_POST['hokh']) && isset($_POST['tenkh'])
        && isset($_POST['gioitinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])){

            $taikhoan = $_POST['taikhoan'];
            $matkhau = $_POST['matkhau']; 
            $hokh = $_POST['hokh']; 
            $tenkh = $_POST['tenkh'];
            $gioitinh = $_POST['gioitinh']; 
            $sdt = $_POST['sdt']; 
            $diachi = $_POST['diachi'];
            $model = new KhachHangModel();
            $model->themTaiKhoan($taikhoan, $matkhau, $hokh, $tenkh, $gioitinh, $sdt, $diachi);

			// tạo mới giỏ hàng cho người dùng
			$gh = new GioHangModel();
			$gh->createGioHang($taikhoan);

            echo "<script>
            alert('Bạn đã đăng kí thành công!');
            document.location.href = '/KhachHang/dangnhap'
            </script>
            ";
        } else {
            echo view('UserPage/dangki');
        }
    }

    public function dangnhap(){
		if (!isset($_POST['taikhoan']) || !isset($_POST['matkhau'])) {
			if (isset($_COOKIE['dadangnhap'])) {
				echo "<script>document.location.href = '/';</script>";
				return;
			}
			echo view('UserPage/dangnhap');
			return;
		}
		// POST request handle
		$username = $_POST['taikhoan'];
		$password = $_POST['matkhau'];

		$model = new KhachHangModel();
		$dskhachhang = $model->getKhachHang();
		foreach ($dskhachhang as $row) {
			$taikhoan = $row["taikhoan"];
			$matkhaubam = $row["matkhau"];
			if ($username == $taikhoan) {
				// check password
				if (password_verify($password, $matkhaubam)) {
					$cookie_name = 'dadangnhap';
					$key = $this->key;
					$payload = array(
						'usr' => $taikhoan
					);
					$jwt = JWT::encode($payload, $key);

					setcookie($cookie_name, $jwt, time() + (86400 * 30), "/"); // 86400 = 1 day
					echo "<script>document.location.href = '/';</script>";
					return;
				};
			}
		}

        echo view ('UserPage/dangnhap');
	}


	public function dangxuat(){
		$cookie_name = 'dadangnhap';
		setcookie($cookie_name, '', time(), "/");
		echo "<script>document.location.href = '/';</script>";
	}


	public function giohang(){
		$this->redirectDangNhap();
		
		/* POST */
		if (isset($_POST['idhanghoa'])){
			header('Content-Type: application/json'); 
			$decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
			$decoded_array = (array) $decoded;

			$taikhoan = $decoded_array['usr'];
			$idhanghoa = $_POST['idhanghoa'];

			// tim gio hang cua tai khoan
			$giohangModel = new GioHangModel();
			$idgiohang = $giohangModel->findGioHang($taikhoan)['id'];

			$hanghoa = new HangHoaModel();
			$gia = $hanghoa->getHangHoaTheoMa($idhanghoa)['gia'];

			$chitietgiohang = new ChiTietGioHangModel();
			$chitietgiohang->createChiTietGioHang($idgiohang,$idhanghoa,1,$gia);

			$json_array = [
				"status" => "success"
			];
			echo json_encode($json_array);
			return;
		}

		/* GET */
		$decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
		$decoded_array = (array) $decoded;
		$taikhoan = $decoded_array['usr'];
		$giohangModel = new GioHangModel();
		$idgiohang = $giohangModel->findGioHang($taikhoan)['id'];
		$chitietgiohangModel = new ChiTietGioHangModel();
		$dschitiet = $chitietgiohangModel->getChitietGiohang($idgiohang);

		$hanghoaModel = new HangHoaModel;

		$data["dschitiet"] = [];

		$tongtien = 0;
		foreach ($dschitiet as &$row) {
			$hanghoa = $hanghoaModel->getHangHoaTheoMa($row['idhanghoa']);
			$array_chitiet = [
				"idgiohang" => $row['idgiohang'],
				"idhanghoa" => $row['idhanghoa'],
				"tenhanghoa" => $hanghoa['tenhanghoa'],
				"image" => $hanghoa['image'],
				"gia" => $hanghoa['gia'],
				"soluong" => $row['soluong'],
				"thanhtien" => $row['soluong'] * $hanghoa['gia'],
			];
			$tongtien += $row['soluong'] * $hanghoa['gia'];
			$data["dschitiet"][] = $array_chitiet;
		}
		$data["tongtien"] = $tongtien;
		return view("UserPage/giohang", $data);
	}

	public function donhang(){
		$this->redirectDangNhap();

		// POST
		if (isset($_POST['dsidhanghoa'])) {
			setcookie("dsidhanghoa", $_POST['dsidhanghoa'], time() + (86400 * 30), "/"); // 86400 = 1 day
			$json_array = [
				"status" => "success"
			];
			echo json_encode($json_array);
			return;
		}
		// GET
		if (!isset($_COOKIE['dsidhanghoa'])) {
			echo "<script>document.location.href = '/KhachHang/giohang';</script>"; 
		}

		$dsidhanghoa = explode(",", $_COOKIE['dsidhanghoa']);

		$decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
		$decoded_array = (array) $decoded;
		$taikhoan = $decoded_array['usr'];
		$giohangModel = new GioHangModel();
		$idgiohang = $giohangModel->findGioHang($taikhoan)['id'];
		$chitietgiohangModel = new ChiTietGioHangModel();
		$dschitiet = $chitietgiohangModel->getChitietGiohang($idgiohang);

		$hanghoaModel = new HangHoaModel;

		$data["dschitiet"] = [];

		$tongtien = 0;
		foreach ($dschitiet as &$row) {
			if (!in_array($row['idhanghoa'], $dsidhanghoa)) {
				continue;
			}
			$hanghoa = $hanghoaModel->getHangHoaTheoMa($row['idhanghoa']);
			$array_chitiet = [
				"idgiohang" => $row['idgiohang'],
				"idhanghoa" => $row['idhanghoa'],
				"tenhanghoa" => $hanghoa['tenhanghoa'],
				"image" => $hanghoa['image'],
				"gia" => $hanghoa['gia'],
				"soluong" => $row['soluong'],
				"thanhtien" => $row['soluong'] * $hanghoa['gia'],
			];
			$tongtien += $row['soluong'] * $hanghoa['gia'];
			$data["dschitiet"][] = $array_chitiet;
		}
		$data["tongtien"] = $tongtien;
		return view("UserPage/donhang", $data);
	}

	public function deletePhantuGiohang(){
		$this->redirectDangNhap();

		$decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
		$decoded_array = (array) $decoded;
		$idkhachhang = $decoded_array['usr'];
		$giohangModel = new GioHangModel();
		$idgiohang = $giohangModel->findGioHang($idkhachhang)['id'];

		if(isset($_POST['idhanghoa'])) {
			$chitietgiohangModel = new ChiTietGioHangModel();
			$chitietgiohangModel->deleteHanghoa($idgiohang, $_POST['idhanghoa']);
			$json_array = [
				"status" => "success",
			];
			echo json_encode($json_array);
		}
	}
}

	

?>