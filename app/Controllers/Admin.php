<?php

namespace App\Controllers;

use App\Models\ChiTietDonHangModel;
use App\Models\DonHangModel;
use App\Models\HangHoaModel;
use App\Models\QuanTriModel;
use App\Models\ThuongHieuModel;
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
                $donhangModel = new DonHangModel();
                $data["dsdonhang"] = $donhangModel->getDsDonHang();
                $thuonghieu = new ThuongHieuModel();
                $data['dsthuonghieu'] = $thuonghieu->getThuongHieu();
                $hanghoaModel = new HangHoaModel();
                $data['dshanghoa'] = $hanghoaModel->getHangHoa();
                $chitietdonhangModel = new ChiTietDonHangModel();

                for ($i = 0; $i < count($data['dsdonhang']); $i++) {
                    $donhang = $data['dsdonhang'][$i];
                    $data['dschitietdonhang'][] = $chitietdonhangModel->getChiTietDonHang($donhang['id']);
                }

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

    public function capnhattrangthaidonhang()
    {
        if (!isset($_COOKIE['dadangnhap'])) {
            echo view("Admin/dangnhap");
            return;
        }

        if (!isset($_POST['iddonhang']) || !isset($_POST['trangthai'])) {
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

    public function themthuonghieu()
    {
        // kiem tra da dang nhap
        if (isset($_COOKIE['dadangnhap'])) {
            $key = $this->key;
            $jwt = $_COOKIE['dadangnhap'];
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $decoded_array = (array) $decoded;
            $data['username'] = $decoded_array['usr'];
            if ($decoded_array['role'] === 'admin') {
                if (isset($_POST['idthuonghieu']) && isset($_POST['tenthuonghieu']) && isset($_FILES['logo'])) {
                    $idthuonghieu = $_POST['idthuonghieu'];
                    $tenthuonghieu = $_POST['tenthuonghieu'];
                    $target_dir = "images/thuonghieu/";
                    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                    //Lấy phần mở rộng của file (jpg, png, ...)
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    ////Những loại file được phép upload
                    $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
                    if (!in_array($imageFileType, $allowtypes)) {
                        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                        return;
                    }
                    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        $themthuonghieu = new ThuongHieuModel();
                        $themthuonghieu->addThuongHieu($idthuonghieu, $tenthuonghieu, $target_file);
                        echo "<script>document.location.href='/Admin/home?status=thuonghieu'</script>";
                    }
                }
            }
        }

    }

    public function xoathuonghieu()
    {
        // kiem tra da dang nhap
        if (isset($_COOKIE['dadangnhap'])) {
            $key = $this->key;
            $jwt = $_COOKIE['dadangnhap'];
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $decoded_array = (array) $decoded;
            $data['username'] = $decoded_array['usr'];
            if ($decoded_array['role'] === 'admin') {
                if (isset($_POST['idthuonghieu'])) {
                    $idthuonghieu = $_POST['idthuonghieu'];
                    $thuonghieuModel = new ThuongHieuModel();
                    unlink($thuonghieuModel->getThuongHieu($idthuonghieu)['logo']);
                    $thuonghieuModel->deleteThuongHieu($idthuonghieu);
                    $json_array = [
                        "status" => "success",
                        "idthuonghieu" => $idthuonghieu,
                    ];
                    echo json_encode($json_array);
                }
            }
        }
    }

    public function themsanpham()
    {
        // kiem tra da dang nhap
        if (isset($_COOKIE['dadangnhap'])) {
            $key = $this->key;
            $jwt = $_COOKIE['dadangnhap'];
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $decoded_array = (array) $decoded;
            $data['username'] = $decoded_array['usr'];
            if ($decoded_array['role'] === 'admin') {
                if (isset($_POST['idthuonghieu']) && isset($_POST['idsanpham']) && isset($_FILES['image'])
                    && isset($_POST['tensanpham']) && isset($_POST['phai']) && isset($_POST['giasanpham']) && isset($_POST['soluongsanpham'])) {
                    $idthuonghieu = $_POST['idthuonghieu'];
                    $idsanpham = $_POST['idsanpham'];
                    $tensanpham = $_POST['tensanpham'];
                    $phai = $_POST['phai'];
                    $giasanpham = $_POST['giasanpham'];
                    $soluong = $_POST['soluongsanpham'];

                    $target_dir = "images/hanghoa/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

                    if (!in_array($imageFileType, $allowtypes)) {
                        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                        return;
                    }
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $themhanghoa = new HangHoaModel();
                        $themhanghoa->themHangHoa($idthuonghieu, $idsanpham, $tensanpham, $phai, $giasanpham, $soluong, $target_file);
                        echo "<script>document.location.href='/Admin/home?status=sanpham'</script>";
                    }
                }
            }
        }
    }

    public function xoasanpham()
    {
        // kiem tra da dang nhap
        if (isset($_COOKIE['dadangnhap'])) {
            $key = $this->key;
            $jwt = $_COOKIE['dadangnhap'];
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $decoded_array = (array) $decoded;
            $data['username'] = $decoded_array['usr'];
            if ($decoded_array['role'] === 'admin') {
                if (isset($_POST['idsanpham'])) {
                    $idsanpham = $_POST['idsanpham'];
                    $hanghoaModel = new HangHoaModel();
                    unlink($hanghoaModel->getHangHoaTheoMa($idsanpham)['image']);
                    $hanghoaModel->deleteHangHoa($idsanpham);
                    $json_array = [
                        "status" => "success",
                        "idhanghoa" => $idsanpham,
                    ];
                    echo json_encode($json_array);
                }
            }
        }
    }

}
