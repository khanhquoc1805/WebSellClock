<?php

namespace App\Controllers;

use App\Models\DonHangModel;
use App\Models\HangHoaModel;
use App\Models\QuanTriModel;
use \Firebase\JWT\JWT;

class Admin extends BaseController
{

    private $key = 'this is a secret!!!';

    public function home()
    {
        // kiem tra da dang nhap
        if (isset($_COOKIE['dadangnhap'])) {
            $key = $this->key;
            $jwt = $_COOKIE['dadangnhap'];
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $decoded_array = (array) $decoded;
            $data['username'] = $decoded_array['usr'];
            if ($decoded_array['role'] === 'admin') {
                $donhang = new DonHangModel();
                $data["dsdonhang"] = $donhang->getDsDonHang();
                echo view('Admin/admin', $data);
                return;
            }
        }
        echo view("Admin/dangnhap");
    }

    public function dangnhap()
    {
        if (!isset($_POST['taikhoan']) || !isset($_POST['matkhau'])) {
            if (isset($_COOKIE['dadangnhap'])) {
                echo "<script>document.location.href = '/admin/home';</script>";
                return;
            }
            echo view('Admin/dangnhap');
            return;
        }
        // POST request handle
        $username = $_POST['taikhoan'];
        $password = $_POST['matkhau'];

        $model = new QuanTriModel();
        $dsadmin = $model->getAdmin();
        foreach ($dsadmin as $row) {
            $taikhoan = $row["taikhoan"];
            $matkhaubam = $row["matkhau"];
            if ($username == $taikhoan) {
                // check password
                if (password_verify($password, $matkhaubam)) {
                    $cookie_name = 'dadangnhap';
                    $cookie_value = true;
                    $key = $this->key;
                    $payload = array(
                        'role' => 'admin',
                        'usr' => $taikhoan,
                    );
                    $jwt = JWT::encode($payload, $key);

                    setcookie($cookie_name, $jwt, time() + (86400 * 30), "/"); // 86400 = 1 day
                    echo "<script>document.location.href = '/admin/home';</script>";
                    return;
                };
            }
        }
        // fail login
        echo view('/admin/dangnhap');

    }

    public function add_product()
    {
        if (!isset($_POST['masanpham'])
            || !isset($_POST['tensanpham'])
            || !isset($_POST['gia'])
            || !isset($_POST['hinhanh'])) {
            echo view("Admin/add");
        } else {
            $ma = $_POST['masanpham'];
            $ten = $_POST['tensanpham'];
            $gia = $_POST['gia'];
            $hinhanh = $_POST['hinhanh'];
            // add to db
            $model = new HangHoaModel();
            $model->themHangHoa($ma, $ten, $gia, $hinhanh);

            $data['ketqua'] = 'success';
            echo view("Admin/add", $data);
        }
    }

    // domain/admin/delete_product/$ma
    public function delete_product($ma = 'default')
    {
        if ($ma == 'default') {
            // lay danh sach dong ho
            $model = new HangHoaModel();
            $dongho = $model->getHangHoa();
            $data["dsdongho"] = $dongho;
            echo view("Admin/delete", $data);
        } else {
            $model = new HangHoaModel();
            $model->xoaHangHoa($ma);
            $data['madongho'] = $ma;
            echo view("Admin/delete_single_item", $data);
        }
    }

    public function logout()
    {
        $cookie_name = "dadangnhap";
        $cookie_value = false;
        setcookie($cookie_name, $cookie_value, time() + 1, "/");
        echo "<script>document.location.href = '/admin/dangnhap';</script>";
    }

    public function donhang()
    {
        // kiem tra da dang nhap
        if (!isset($_COOKIE['dadangnhap'])) {
            echo view("Admin/dangnhap");
            return;
        }

        $key = $this->key;
        $jwt = $_COOKIE['dadangnhap'];
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        $data['username'] = $decoded_array['usr'];
        if ($decoded_array['role'] === 'admin') {
            $donhang = new DonHangModel();
            $data["dsdonhang"] = $donhang->getDsDonHang();
            echo view('Admin/admin', $data);
            return;
        }
    }

    public function capnhattrangthaidonhang() {
        if (!isset($_COOKIE['dadangnhap'])) {
            echo view("Admin/dangnhap");
            return;
        }
        
        if (!isset($_POST['iddonhang']) || !isset($_POST['trangthai'])){
            return;
        }
        $iddonhang = $_POST['iddonhang'];
        $trangthai = $_POST['trangthai'];
        
        $donHangModel = new DonHangModel();
        $donHangModel->updateTrangThai($iddonhang, $trangthai);

        $json_array = [
            "status" => "success",
            "iddonhang" => $iddonhang,
        ];
        echo json_encode($json_array);
    }
}
