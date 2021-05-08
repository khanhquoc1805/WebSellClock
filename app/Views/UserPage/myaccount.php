<?php echo view("header.php") ?>

<div class="header-myaccount">
    <button
        type="button"
        class="btn btn-default btn-lg"
        id="btn_thong_tin_ca_nhan"
    >
        <i class="icon-cw" role="presentation" aria-label="reset password"></i
        >Thông Tin Cá Nhân
    </button>
    <button
        type="button"
        class="btn btn-default btn-lg"
        style="margin: 0 2em"
        id="btn_don_hang_cua_ban"
    >
        <i class="icon-cw" role="presentation" aria-label="reset password"></i
        >Đơn Hàng Của Bạn
    </button>

    <button
        type="button"
        class="btn btn-default btn-lg"
        id="btn_lich_su_mua_hangs"
    >
        <i class="icon-cw"></i
        >Lịch Sử Mua Hàng
    </button>
</div>

<div
    style="width: 60%; margin: 0 auto"
    class="<?=isset($_GET['donhangcuaban']) ? 'hidden' : ''?>"
    id="thongtincanhan_container"
>
    <div class="content" style="padding: 2em">
        <img
            src="https://cdn-img.thethao247.vn/upload/kienlv/2020/09/11/tuyen-thu-dt-viet-nam-cong-khai-ban-gai-xinh-nhu-mong1599795990.png"
            alt=""
            style="
                width: 20em;
                height: 20em;
                border-radius: 50%;
                display: block;
                margin: 0 auto;
            "
        />
        <label class="hidden" id="nhanhoten">Họ Tên: </label><br />
        <input
            type="text"
            disabled
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle"
            value=""
            id="hoten"
        />
        <label class="hidden" id="nhanho">Họ: </label><br />
        <input
            type="text"
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle hidden"
            value=""
            id="ho"
        />
        <label class="hidden" id="nhanten">Tên: </label><br />
        <input
            type="text"
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle hidden"
            value=""
            id="ten"
        />
        <label>Giới Tính: </label><br />
        <input
            type="text"
            disabled
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle"
            value=""
            id="gioitinh"
        />
        <select class="form-select form-control hidden" id="select_gioi_tinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
        <label>Số Điện Thoại: </label><br />
        <input
            type="text"
            disabled
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle"
            value=""
            id="sodienthoai"
        />
        <label>Địa chỉ: </label><br />
        <input
            type="text"
            disabled
            size="30"
            tabindex="1"
            class="form-control txtBoxStyle"
            value=""
            id="diachi"
        /><br />

        <button id="capnhatthongtin" type="button" class="btn btn-primary">
            <i class="icon-pencil" aria-label="pencil icon"></i> Cập Nhật Thông
            Tin
        </button>
        <button
            id="luucapnhatthongtin"
            type="button"
            class="btn btn-primary hidden"
        >
            <i class="icon-pencil" aria-label="pencil icon"></i> Lưu
        </button>
    </div>
</div>

<div
    style="width: 60%; margin: 0 auto; margin-top: 1em"
    id="donhangcuaban_container"
    class="<?=isset($_GET['donhangcuaban']) ? '' : 'hidden'?>"
>
    <?php $hanghoa_counter = 0;?>
    <?php for ($i = 0; $i < count($dsdonhang); $i++): ?>
        <?php if($dsdonhang[$i]['trangthai'] == "Đã Xóa" || $dsdonhang[$i]['trangthai'] == "Hoàn Thành") { continue; } ?>
    <div
        class="content"
        style="padding: 2em; border: 1px solid blue; margin: 2em"
    >
        <h3>
            Mã đơn hàng:
            <?=$dsdonhang[$i]['id']?>
        </h3>
        <h3>
            Trạng Thái:
            <?=$dsdonhang[$i]['trangthai']?>
            <span style="float: right; font-weight: normal; font-size: 0.75em"
                >Tổng Tiền:
                <?=number_format($dsdonhang[$i]['tonggiatri'], 0, "", ".")?></span
            >
        </h3>

        <table
            width="100%"
            border="1"
            class="table-product-pack mt20"
            bordercolor="#DCDCDC"
            cellpadding="6"
        >
            <thead>
                <tr class="head-tr">
                    <th class="th-column" width="6%">STT</th>
                    <th class="th-column" width="">Tên</th>
                    <th class="th-column" width="12%">Số lượng</th>
                    <th class="th-column don_gia_hide" width="18%">
                        Đơn giá(VNĐ)
                    </th>
                    <th class="th-column" width="18%">Thành Tiền</th>
                    <th class="th-column unvisible title-xoa" width="18%" >Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!--  Product list -->
                <?php for ($j = 0; $j < count($dschitiet[$i]); $j++): ?>
                <?php if($dschitiet[$i][$j]['trangthai'] !=='Đã Xóa') { ?>
                <tr>
                    <td class="center-column" align="center">
                        <?=$j + 1?>
                    </td>
                    <td class="name-product" align="center">
                        <a href=""
                            ><?=$dshanghoa[$hanghoa_counter]['tenhanghoa']?>
                        </a>
                        <br />
                        <a href="">
                            <img
                                width="80"
                                height="100"
                                src="../<?=$dshanghoa[$hanghoa_counter]['image']?>"
                                alt=""
                            />
                        </a>
                    </td>
                    <td align="center">
                        <input
                            class="numbers-pro"
                            data-idhanghoa=<?= $dschitiet[$i][$j]['idhanghoa'] ?>
                            data-dongia=<?= $dshanghoa[$hanghoa_counter]['gia'] ?>
                            type="text"
                            max=""
                            disabled
                            value="<?=$dschitiet[$i][$j]['soluong']?>"
                            name="quantity_956694"
                            size="8px"
                        />
                    </td>
                    <td class="price-product don_gia_hide" align="center">
                        <?=number_format($dshanghoa[$hanghoa_counter]['gia'], 0, "", ".")?>
                    </td>

                    <td class="total-price" align="center">
                        <?=number_format($dschitiet[$i][$j]['soluong'] * $dshanghoa[$hanghoa_counter]['gia'], 0, "", ".")?>
                    </td>
                    <td class="center-column hidden btn-xoa" align="center" data-iddonhang="<?=$dsdonhang[$i]['id']?>" data-idhanghoa="<?=$dshanghoa[$hanghoa_counter]['idhanghoa']?>">
                        <button
                            class="btn btn-danger"
                        >
                            X
                        </button>
                    </td>
                </tr>
                <?php } ?>
                <?php $hanghoa_counter++;?>
                <?php endfor;?>
            </tbody>
        </table>
        <div style="float: right; margin-top: 10px">
            <?php if ($dsdonhang[$i]['trangthai'] === 'Chờ Duyệt') {?>
            <button
                type="button"
                class="btn btn-default btn-lg btn-thay-doi-don-hang"

            >
                <i
                    class="icon-cw"
                ></i
                >Thay Đổi Đơn Hàng
            </button>
            <?php }?>
            <!-- endif -->

            <button
                type="button"
                class="btn btn-default btn-lg btn-hoan-tat-thay-doi unvisible"
                data-iddonhang=<?= $dsdonhang[$i]['id'] ?>
            >
                <i
                    class="icon-cw"
                ></i
                >Hoàn Tất Thay Đổi
            </button>

            <?php if (($dsdonhang[$i]['trangthai'] === 'Chờ Duyệt') || ($dsdonhang[$i]['trangthai'] === 'Đã Duyệt')) {?>
            <button
                type="button"
                class="btn btn-default btn-lg btn-huy-don-hang"
                data-iddonhang="<?=$dsdonhang[$i]['id']?>"
            >
                <i
                    class="icon-cw"
                ></i
                >Hủy Đơn Hàng
            </button>
            <?php } else {?>
            <span style="position: relative; top: -0.5em ;"
                >Đơn hàng đang giao bạn không thể thay đổi hoặc hủy!</span
            ><br />
            <?php }?>
        </div>
    </div>
    
    <?php endfor;?>
</div>

<div
    style="width: 60%; margin: 0 auto; margin-top: 1em"
    id="lichsumuahang_container"
    class="hidden"
>
    <?php $hanghoa_counter = 0;?>
    <?php for ($i = 0; $i < count($dsdonhang); $i++): ?>
        <?php if($dsdonhang[$i]['trangthai'] != "Hoàn Thành") { continue; } ?>
    <div
        class="content"
        style="padding: 2em; border: 1px solid blue; margin: 2em"
    >
        <h3>
            Mã đơn hàng:
            <?=$dsdonhang[$i]['id']?>
        </h3>
        <h3>
            Trạng Thái:
            <?=$dsdonhang[$i]['trangthai']?>
            <span style="float: right; font-weight: normal; font-size: 0.75em"
                >Tổng Tiền:
                <?=number_format($dsdonhang[$i]['tonggiatri'], 0, "", ".")?></span
            >
        </h3>

        <table
            width="100%"
            border="1"
            class="table-product-pack mt20"
            bordercolor="#DCDCDC"
            cellpadding="6"
        >
            <thead>
                <tr class="head-tr">
                    <th class="th-column" width="6%">STT</th>
                    <th class="th-column" width="">Tên</th>
                    <th class="th-column" width="12%">Số lượng</th>
                    <th class="th-column don_gia_hide" width="18%">
                        Đơn giá(VNĐ)
                    </th>
                    <th class="th-column" width="18%">Thành Tiền</th>
                    <th class="th-column unvisible title-xoa" width="18%" >Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!--  Product list -->
                <?php for ($j = 0; $j < count($dschitiet[$i]); $j++): ?>
                <?php if($dschitiet[$i][$j]['trangthai'] !=='Đã Xóa') { ?>
                <tr>
                    <td class="center-column" align="center">
                        <?=$j + 1?>
                    </td>
                    <td class="name-product" align="center">
                        <a href=""
                            ><?=$dshanghoa[$hanghoa_counter]['tenhanghoa']?>
                        </a>
                        <br />
                        <a href="">
                            <img
                                width="80"
                                height="100"
                                src="../<?=$dshanghoa[$hanghoa_counter]['image']?>"
                                alt=""
                            />
                        </a>
                    </td>
                    <td align="center">
                        <input
                            class="numbers-pro"
                            type="text"
                            max=""
                            disabled
                            value="<?=$dschitiet[$i][$j]['soluong']?>"
                            name="quantity_956694"
                            size="8px"
                        />
                    </td>
                    <td class="price-product don_gia_hide" align="center">
                        <?=number_format($dshanghoa[$hanghoa_counter]['gia'], 0, "", ".")?>
                    </td>

                    <td class="total-price" align="center">
                        <?=number_format($dschitiet[$i][$j]['soluong'] * $dshanghoa[$hanghoa_counter]['gia'], 0, "", ".")?>
                    </td>
                    <td class="center-column hidden btn-xoa" align="center" data-iddonhang="<?=$dsdonhang[$i]['id']?>" data-idhanghoa="<?=$dshanghoa[$hanghoa_counter]['idhanghoa']?>">
                        <button
                            class="btn btn-danger"
                        >
                            X
                        </button>
                    </td>
                </tr>
                <?php } ?>
                <?php $hanghoa_counter++;?>
                <?php endfor;?>
            </tbody>
        </table>
        <div style="float: right; margin-top: 10px">
            <?php if ($dsdonhang[$i]['trangthai'] === 'Chờ Duyệt') {?>
            <button
                type="button"
                class="btn btn-default btn-lg btn-thay-doi-don-hang"

            >
                <i
                    class="icon-cw"
                ></i
                >Thay Đổi Đơn Hàng
            </button>
            <?php }?>
            <!-- endif -->

            <button
                type="button"
                class="btn btn-default btn-lg btn-hoan-tat-thay-doi unvisible"
            >
                <i
                    class="icon-cw"
                ></i
                >Hoàn Tất Thay Đổi
            </button>

            <?php if (($dsdonhang[$i]['trangthai'] === 'Chờ Duyệt') || ($dsdonhang[$i]['trangthai'] === 'Đã Duyệt')) {?>
            <button
                type="button"
                class="btn btn-default btn-lg btn-huy-don-hang"
                data-iddonhang="<?=$dsdonhang[$i]['id']?>"
            >
                <i
                    class="icon-cw"
                ></i
                >Hủy Đơn Hàng
            </button>
            <?php } else {?>
            <span style="position: relative; top: -0.5em ;"
                >Đơn hàng đang giao bạn không thể thay đổi hoặc hủy!</span
            ><br />
            <?php }?>
        </div>
    </div>
    
    <?php endfor;?>
</div>

<script>
    const hoten = document.querySelector("#hoten");
    const nhanhoten = document.querySelector("#nhanhoten");
    const nhanho = document.querySelector("#nhanho");
    const nhanten = document.querySelector("#nhanten");
    const ho = document.querySelector("#ho");
    const ten = document.querySelector("#ten");
    const gioitinh = document.querySelector("#gioitinh");
    const sdt = document.querySelector("#sodienthoai");
    const diachi = document.querySelector("#diachi");
    const capnhathongtin = document.querySelector("#capnhatthongtin");
    const selectgioitinh = document.querySelector("#select_gioi_tinh");
    const btnluu = document.querySelector("#luucapnhatthongtin");
    const btncapnhat = document.querySelector("#capnhatthongtin");
    const btnThongTinCaNhan = document.querySelector("#btn_thong_tin_ca_nhan");
    const btnDonHangCuaBan = document.querySelector("#btn_don_hang_cua_ban");
    const btnLichSuMuaHang = document.querySelector("#btn_lich_su_mua_hangs")
    const thongTinCaNhanContainer = document.querySelector(
        "#thongtincanhan_container"
    );
    const donHangCuaBanContainer = document.querySelector(
        "#donhangcuaban_container"
    );
    const lichSuMuaHangContainer = document.querySelector(
        "#lichsumuahang_container"
    );

    nhanhoten.classList.remove("hidden");
    const DsBtnThayDoiDonHang = document.querySelectorAll(
        ".btn-thay-doi-don-hang"
    );
    const DsBtnHuyDonHang = document.querySelectorAll(".btn-huy-don-hang");

    document.addEventListener("DOMContentLoaded", () => {
        fetch("/KhachHang/laythongtinkhachhang")
            .then((r) => r.json())
            .then((j) => {
                hoten.value = `${j.khachhang.hokh} ${j.khachhang.tenkh}`;
                gioitinh.value = j.khachhang.gioitinh;
                sdt.value = j.khachhang.sdt;
                diachi.value = j.khachhang.diachi;
                ho.value = j.khachhang.hokh;
                ten.value = j.khachhang.tenkh;
            });
    });

    capnhatthongtin.onclick = function () {
        hoten.disabled = false;
        gioitinh.disabled = false;
        sdt.disabled = false;
        diachi.disabled = false;
        selectgioitinh.classList.remove("hidden");
        gioitinh.classList.add("hidden");
        btnluu.classList.remove("hidden");
        btncapnhat.classList.add("hidden");
        hoten.classList.add("hidden");
        nhanhoten.classList.add("hidden");
        ho.classList.remove("hidden");
        ten.classList.remove("hidden");
        nhanho.classList.remove("hidden");
        nhanten.classList.remove("hidden");
    };

    btnluu.onclick = function () {
        const formData = new FormData();
        formData.append("ho", ho.value);
        formData.append("ten", ten.value);
        formData.append("gioitinh", selectgioitinh.value);
        formData.append("sdt", sdt.value);
        formData.append("diachi", diachi.value);
        fetch("/KhachHang/capnhatthongtin", {
            method: "POST",
            body: formData,
        })
            .then((r) => r.json())
            .then((j) => {
                console.log(j);
            });

        btnluu.classList.add("hidden");
        btncapnhat.classList.remove("hidden");
        hoten.disabled = true;
        gioitinh.disabled = true;
        sdt.disabled = true;
        diachi.disabled = true;
        gioitinh.classList.remove("hidden");
        selectgioitinh.classList.add("hidden");
        nhanho.classList.add("hidden");
        nhanten.classList.add("hidden");
        ho.classList.add("hidden");
        ten.classList.add("hidden");
        hoten.classList.remove("hidden");
        nhanhoten.classList.remove("hidden");

        document.location.href = "/KhachHang/myaccount";
    };

    btnThongTinCaNhan.onclick = function () {
        thongTinCaNhanContainer.classList.remove("hidden");
        donHangCuaBanContainer.classList.add("hidden");
        lichSuMuaHangContainer.classList.add("hidden")
    };

    btnDonHangCuaBan.onclick = function () {
        thongTinCaNhanContainer.classList.add("hidden");
        donHangCuaBanContainer.classList.remove("hidden");
        lichSuMuaHangContainer.classList.add("hidden")
    };

    btnLichSuMuaHang.onclick = function(){
        thongTinCaNhanContainer.classList.add("hidden");
        donHangCuaBanContainer.classList.add("hidden");
        lichSuMuaHangContainer.classList.remove("hidden")
    }

    for (let i = 0; i < DsBtnHuyDonHang.length; i++) {
        DsBtnHuyDonHang[i].onclick = function () {
            const formdata = new FormData();
            formdata.append("iddonhang", this.getAttribute("data-iddonhang"));
            console.log(this.getAttribute("data-iddonhang"));
            if (!confirm("Bạn có chắc chắn muốn xóa đơn hàng?")) {
                return;
            }
            fetch("/KhachHang/huydonhang", {
                method: "POST",
                body: formdata,
            })
                .then((response) => response.json())
                .then((j) => {
                    if (j.status === "success") {
                        document.location.href =
                            "/KhachHang/myaccount?donhangcuaban";
                    }
                    console.log(j.status);
                });
        };
    }

    const dstitlexoa = document.querySelectorAll('.title-xoa');
    const thaydoisoluong = document.querySelectorAll('.numbers-pro')
    const dsbtnhoantatthaydoi= document.querySelectorAll('.btn-hoan-tat-thay-doi')
    const dsthanhtien = document.querySelectorAll('.total-price');
    const dsdongia = document.querySelectorAll('.price-product');
    for (let i = 0; i < DsBtnThayDoiDonHang.length; i++){
        const donHangDiv = DsBtnThayDoiDonHang[i].parentNode.parentNode;
        const dsbtnxoa = donHangDiv.querySelectorAll(".btn-xoa");

        DsBtnThayDoiDonHang[i].onclick = function() {
            dstitlexoa[i].classList.remove('unvisible');
            const newdsthaydoisoluong = donHangDiv.querySelectorAll('.numbers-pro');
            for (let j = 0; j < newdsthaydoisoluong.length; ++j) {
                newdsthaydoisoluong[j].disabled = false;
                console.log(newdsthaydoisoluong[i])
            } 
            DsBtnThayDoiDonHang[i].classList.add('unvisible');
            dsbtnhoantatthaydoi[i].classList.remove('unvisible');
            // display delete button
            for(let j = 0; j < dsbtnxoa.length; ++j) {
                dsbtnxoa[j].classList.remove("hidden");
                dsbtnxoa[j].onclick = function(){
                    if(!confirm("Bạn có chắc chắn muốn xóa?")){
                        return
                    }

                    // nếu còn 1 chi tiết đơn hàng, hủy luôn đơn
                    const newdsbtnxoa = donHangDiv.querySelectorAll('.btn-xoa');
                    console.log(newdsbtnxoa.length);
                    if (newdsbtnxoa.length === 1) {
                        const formData = new FormData();
                        formData.append("iddonhang", this.getAttribute('data-iddonhang'));
                        fetch("/KhachHang/huydonhang", {
                            method: "POST",
                            body: formData,
                        })
                        .then((response) => response.json())
                        .then((j) => {
                            if (j.status === "success") {
                                document.location.href =
                                    "/KhachHang/myaccount?donhangcuaban";
                            }
                        });
                        return;    
                    }
                    
                    const iddonhang = this.getAttribute('data-iddonhang');
                    const idhanghoa = this.getAttribute('data-idhanghoa');
                    const formdata = new FormData();
                    formdata.append('iddonhang',iddonhang);
                    formdata.append('idhanghoa',idhanghoa);
                    fetch('/KhachHang/xoamotchitietdonhang',{
                        method: 'POST',
                        body : formdata
                    }).then(r => r.json()).then(j => {
                        if(j.status === 'success'){
                            document.location.href="/KhachHang/myaccount?donhangcuaban"
                        }
                    });

                    
                }
            }
        }

        const newdsthaydoisoluong = donHangDiv.querySelectorAll('.numbers-pro');
        // thaydoisoluong[i].oninput = function() {
        //     const formatedNum = new Intl.NumberFormat('vn-VN').format(1000000 * parseFloat(dsdongia[i].innerText) * thaydoisoluong[i].value);
        //     dsthanhtien[i].innerText = formatedNum
        // }
        for(let i = 0; i < dsbtnhoantatthaydoi.length; ++i) {
            dsbtnhoantatthaydoi[i].onclick = function() {
                const parentNode = this.parentNode.parentNode;
                const dssoluong = parentNode.querySelectorAll(".numbers-pro");
                const iddonhang = this.getAttribute("data-iddonhang");

                for(let j = 0; j < dssoluong.length; ++j) {
                    console.log(iddonhang, dssoluong[j].value, dssoluong[j].getAttribute('data-idhanghoa'), dssoluong[j].getAttribute('data-dongia'));
                    formdata = new FormData();
                    formdata.append('iddonhang',iddonhang);
                    formdata.append('soluong',dssoluong[j].value);
                    formdata.append('idhanghoa',dssoluong[j].getAttribute('data-idhanghoa'));
                    formdata.append('thanhtien',dssoluong[j].value * dssoluong[j].getAttribute('data-dongia'));

                    fetch("/KhachHang/capnhatdonhang", {
                        method: 'POST',
                        body: formdata
                    }).then(r => r.json()).then(j => {
                        if(j.status){
                            document.location.href="/KhachHang/myaccount?donhangcuaban";
                            alert("Đơn hàng đã được cập nhật");
                            return;
                        }

                        alert("Số lượng vượt quá số lượng cho phép");
                    })
                }
            }
        }
    }


</script>
