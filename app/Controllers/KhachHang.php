<?php

namespace App\Controllers;

use App\Models\ChiTietDonHangModel;
use App\Models\ChiTietGioHangModel;
use App\Models\DonHangModel;
use App\Models\GioHangModel;
use App\Models\HangHoaModel;
use App\Models\KhachHangModel;
use \Firebase\JWT\JWT;

class KhachHang extends BaseController
{

    protected $key = "this is a secret!!!";

    private function redirectDangNhap()
    {
        if (!isset($_COOKIE['dadangnhap'])) {
            echo "<script>document.location.href = '/khachhang/dangnhap';</script>";
            return;
        }
    }

    private function getTaiKhoanCookie()
    {
        $decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
        $decoded_array = (array) $decoded;
        $taikhoan = $decoded_array['usr'];
        return $taikhoan;
    }

    private function getdsidhanghoaCookie()
    {
        if (!isset($_COOKIE['dsidhanghoa'])) {
            echo "<script>document.location.href = '/KhachHang/giohang';</script>";
            return;
        }

        return $_COOKIE['dsidhanghoa'];
    }

    public function dangki()
    {
        if (isset($_POST['taikhoan']) && isset($_POST['matkhau']) && isset($_POST['hokh']) && isset($_POST['tenkh'])
            && isset($_POST['gioitinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])) {

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

    public function dangnhap()
    {
        if (!isset($_POST['taikhoan']) || !isset($_POST['matkhau'])) {
            if (isset($_COOKIE['dadangnhap'])) {
                $jwt = $_COOKIE['dadangnhap'];
                $decoded = JWT::decode($jwt, $this->key, array('HS256'));
                $decoded_array = (array) $decoded;
                if ($decoded_array['role'] === 'khachhang') {
                    echo "<script>document.location.href = '/';</script>";
                    return;
                }
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
                        'role' => 'khachhang',
                        'usr' => $taikhoan,
                    );
                    $jwt = JWT::encode($payload, $key);

                    setcookie($cookie_name, $jwt, time() + (86400 * 30), "/"); // 86400 = 1 day
                    echo "<script>document.location.href = '/';</script>";
                    return;
                };
            }
        }

        echo view('UserPage/dangnhap');
    }
    public function myaccount()
    {
        $this->redirectDangNhap();
        $taikhoan = $this->getTaiKhoanCookie();
        $donhangmodel = new DonHangModel();
        $dsdonhang = $donhangmodel->getdsdonhangtheotaikhoan($taikhoan);
        $data["dsdonhang"] = $dsdonhang;

        foreach ($dsdonhang as $key => $donhang) {
            $iddonhang = $donhang['id'];
            $chitietdonhangModel = new ChiTietDonHangModel();
            $chitietdonhang = $chitietdonhangModel->getChiTietDonHang($iddonhang);

            $data["dschitiet"][] = $chitietdonhang;
            foreach ($chitietdonhang as $key => $chitiet) {
                $hanghoaModel = new HangHoaModel();
                $hanghoa = $hanghoaModel->getHangHoaTheoMa($chitiet['idhanghoa']);
                $data["dshanghoa"][] = $hanghoa;
            }

        }

        echo view("UserPage/myaccount", $data);

    }

    public function dangxuat()
    {
        $cookie_name = 'dadangnhap';
        setcookie($cookie_name, '', time(), "/");
        echo "<script>document.location.href = '/';</script>";
    }

    public function giohang()
    {
        $this->redirectDangNhap();

        /* POST */
        if (isset($_POST['idhanghoa'])) {
            header('Content-Type: application/json');
            $taikhoan = $this->getTaiKhoanCookie();
            $idhanghoa = $_POST['idhanghoa'];

            // tim gio hang cua tai khoan
            $giohangModel = new GioHangModel();
            $idgiohang = $giohangModel->findGioHang($taikhoan)['id'];

            $hanghoa = new HangHoaModel();
            $gia = $hanghoa->getHangHoaTheoMa($idhanghoa)['gia'];

            $chitietgiohang = new ChiTietGioHangModel();
            $chitietgiohang->createChiTietGioHang($idgiohang, $idhanghoa, 1, $gia);

            $json_array = [
                "status" => "success",
            ];
            echo json_encode($json_array);
            return;
        }

        /* GET */
        $taikhoan = $this->getTaiKhoanCookie();
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
                "tongsoluong" => $hanghoa["soluong"],
                "thanhtien" => $row['soluong'] * $hanghoa['gia'],
            ];
            $tongtien += $row['soluong'] * $hanghoa['gia'];
            $data["dschitiet"][] = $array_chitiet;
        }
        $data["tongtien"] = $tongtien;
        return view("UserPage/giohang", $data);
    }

    public function donhang()
    {
        $this->redirectDangNhap();

        // POST
        if (isset($_POST['dsidhanghoa'])) {
            setcookie("dsidhanghoa", $_POST['dsidhanghoa'], time() + (86400 * 30), "/"); // 86400 = 1 day
            $json_array = [
                "status" => "success",
            ];
            echo json_encode($json_array);
            return;
        }
        // GET
        $dshanghoa = $this->getdsidhanghoaCookie();
        $decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
        $decoded_array = (array) $decoded;
        $taikhoan = $decoded_array['usr'];
        $giohangModel = new GioHangModel();
        $idgiohang = $giohangModel->findGioHang($taikhoan)['id'];
        $chitietgiohangModel = new ChiTietGioHangModel();
        $dschitiet = $chitietgiohangModel->getChitietGiohang($idgiohang);

        $hanghoaModel = new HangHoaModel;

        $data["dschitiet"] = [];
        $dshanghoa = explode("|", $dshanghoa);

        $dsidhanghoa = [];
        foreach ($dshanghoa as &$row) {
            $dsidhanghoa[] = json_decode($row)->idhanghoa;
        }

        $tongtien = 0;
        foreach ($dschitiet as &$row) {
            if (!in_array($row['idhanghoa'], $dsidhanghoa)) {
                continue;
            }

            $soluong = 0;
            foreach ($dshanghoa as &$h) {
                if (json_decode($h)->idhanghoa === $row["idhanghoa"]) {
                    $soluong = json_decode($h)->soluong;
                }
            }

            $hanghoa = $hanghoaModel->getHangHoaTheoMa($row['idhanghoa']);
            $array_chitiet = [
                "idgiohang" => $row['idgiohang'],
                "idhanghoa" => $row['idhanghoa'],
                "tenhanghoa" => $hanghoa['tenhanghoa'],
                "image" => $hanghoa['image'],
                "gia" => $hanghoa['gia'],
                "soluong" => $soluong,
                "thanhtien" => $soluong * $hanghoa['gia'],
            ];
            $tongtien += $row['soluong'] * $hanghoa['gia'];
            $data["dschitiet"][] = $array_chitiet;
        }
        $data["tongtien"] = $tongtien;

        // Lay thong tin khach hang
        $khachhangmodel = new KhachHangModel();
        $rowKH = $khachhangmodel->getKhachHang($taikhoan);

        $data['hoten'] = $rowKH['hokh'] . " " . $rowKH['tenkh'];
        $data['sdt'] = $rowKH['sdt'];
        $data['diachi'] = $rowKH['diachi'];

        return view("UserPage/donhang", $data);
    }

    public function deletePhantuGiohang()
    {
        $this->redirectDangNhap();

        $decoded = JWT::decode($_COOKIE['dadangnhap'], $this->key, array('HS256'));
        $decoded_array = (array) $decoded;
        $idkhachhang = $decoded_array['usr'];
        $giohangModel = new GioHangModel();
        $idgiohang = $giohangModel->findGioHang($idkhachhang)['id'];

        if (isset($_POST['idhanghoa'])) {
            $chitietgiohangModel = new ChiTietGioHangModel();
            $chitietgiohangModel->deleteHanghoa($idgiohang, $_POST['idhanghoa']);
            $json_array = [
                "status" => "success",
            ];
            echo json_encode($json_array);
        }
    }

    public function taodonhang()
    {
        $this->redirectDangNhap();

        $taikhoan = $this->getTaiKhoanCookie();
        $dshanghoa = $this->getdsidhanghoaCookie();

        if (!isset($_POST["chuthich"]) && !isset($_POST["dsgiasanpham"]) && !isset($_POST["dssoluong"])) {
            $json_array = [
                "status" => "fail",
            ];
            echo json_encode($json_array);
            return;
        }

        $dshanghoa = explode("|", $dshanghoa);
        $chuthichdonhang = $_POST['chuthich'];
        $dsgiasanpham = explode(",", $_POST['dsgiasanpham']);
        $dssoluong = explode(",", $_POST['dssoluong']);

        // tao dsidhanghoa
        $dsidhanghoa = [];
        foreach ($dshanghoa as &$row) {
            $dsidhanghoa[] = json_decode($row)->idhanghoa;
        }

        // tao don hang
        $donhangmodel = new DonHangModel();
        $iddonhang = $donhangmodel->createDonHang($taikhoan, 0, 'Chờ Duyệt', $chuthichdonhang);

        // tao chi tiet don hang
        $chitietdonhangModel = new ChiTietDonHangModel();
        for ($i = 0; $i < count($dsgiasanpham); $i++) {
            $chitietdonhangModel->createChiTietDonHang(
                $iddonhang,
                $dsidhanghoa[$i],
                $dssoluong[$i],
                $dsgiasanpham[$i] * $dssoluong[$i]);
        }

        setcookie('dsidhanghoa', '', time(), "/");
        $giohangModel = new GioHangModel();
        $idgiohang = $giohangModel->findGioHang($taikhoan)['id'];

        for ($i = 0; $i < count($dsidhanghoa); $i++) {
            $chitietgiohangModel = new ChiTietGioHangModel();
            $chitietgiohangModel->deleteHanghoa($idgiohang, $dsidhanghoa[$i]);
        }

        $json_array = [
            "status" => "success",
            "iddonhang" => $iddonhang,
        ];

        echo json_encode($json_array);
    }

    public function laythongtinkhachhang()
    {
        $this->redirectDangNhap();
        $taikhoan = $this->getTaiKhoanCookie();
        $khachhangmodel = new KhachHangModel();
        $kh = $khachhangmodel->getKhachHang($taikhoan);
        $json_array = [
            "status" => "success",
            "khachhang" => $kh,
        ];

        echo json_encode($json_array);
    }

    public function capnhatthongtin()
    {
        $this->redirectDangNhap();
        $taikhoan = $this->getTaiKhoanCookie();

        if (isset($_POST['ho']) && isset($_POST['ten']) && isset($_POST['gioitinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])) {
            $khachhangmodel = new KhachHangModel();
            $kh = $khachhangmodel->capnhatthongtin($taikhoan, $_POST['ho'], $_POST['ten'], $_POST['gioitinh'], $_POST['sdt'], $_POST['diachi']);
            $json_array = [
                "status" => "success",
                "idkhachhang" => $taikhoan,
                "phai" => $_POST['gioitinh'],
            ];
            echo json_encode($json_array);

        }

    }

    public function huydonhang()
    {
        $this->redirectDangNhap();
        if (isset($_POST['iddonhang'])) {
            $donhangmodel = new DonHangModel();
            $chitietdonhangModel = new ChiTietDonHangModel();
            $dschitiet = $chitietdonhangModel->getChiTietDonHang($_POST['iddonhang']);

            foreach ($dschitiet as $row) {
                if ($row['trangthai'] != 'Đã Xóa') {
                    $chitietdonhangModel->delete_single_ChiTiet($row['iddonhang'], $row['idhanghoa']);
                }
            }

            $donhangmodel->updateTrangThai($_POST['iddonhang'], 'Đã Xóa');
            echo json_encode([
                "status" => "success",
            ]);
        }
    }

    public function xoamotchitietdonhang()
    {
        $this->redirectDangNhap();
        if (isset($_POST['iddonhang']) && isset($_POST['idhanghoa'])) {
            $chitietdonhangmodel = new ChiTietDonHangModel();
            $chitietdonhangmodel->delete_single_ChiTiet($_POST['iddonhang'], $_POST['idhanghoa']);
            echo json_encode([
                "status" => "success",
            ]);
        }
    }

    public function capnhatdonhang()
    {
        $this->redirectDangNhap();
        if (isset($_POST['iddonhang']) && isset($_POST['idhanghoa']) && isset($_POST['soluong']) && isset($_POST['thanhtien'])) {
            $chitietdonhangmodel = new ChiTietDonHangModel();
            $kq = $chitietdonhangmodel->updateSoLuongChiTiet($_POST['iddonhang'], $_POST['idhanghoa'], $_POST['soluong'], $_POST['thanhtien']);

            echo json_encode([
                "status" => $kq,
            ]);
        }
    }
}
