<?php echo view("header.php") ?>

<div class="header-myaccount">
    <div style="display: flex; flex-direction: column; align-items: center">
        <button
            type="button"
            class="btn btn-default btn-lg"
            data-toggle="modal"
            data-target="#resetPW"
            style="pointer-events: none"
        >
            <i
                class="icon-cw"
                role="presentation"
                aria-label="reset password"
            ></i
            >Thông Tin Cá Nhân
        </button>
        <div class="content" style ="padding: 2em">
            <img src="https://cdn-img.thethao247.vn/upload/kienlv/2020/09/11/tuyen-thu-dt-viet-nam-cong-khai-ban-gai-xinh-nhu-mong1599795990.png" alt=""
            style="width: 20em; height: 20em; border-radius:50%; display: block">
            <label class="hidden" id="nhanhoten">Họ Tên: </label><br>
            <input type="text" disabled  size="30" tabindex="1" class="form-control txtBoxStyle" value="" id="hoten" >
            <label class="hidden" id="nhanho">Họ: </label><br>
            <input type="text" size="30" tabindex="1" class="form-control txtBoxStyle hidden" value="" id="ho" >
            <label class="hidden" id="nhanten">Tên: </label><br>
            <input type="text" size="30" tabindex="1" class="form-control txtBoxStyle  hidden" value="" id="ten" >
            <label>Giới Tính: </label><br>
            <input type="text" disabled  size="30" tabindex="1" class="form-control txtBoxStyle" value="" id="gioitinh" >
            <select class="form-select form-control hidden" id="select_gioi_tinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
            </select>
            <label>Số Điện Thoại: </label><br>
            <input type="text" disabled  size="30" tabindex="1" class="form-control txtBoxStyle" value="" id="sodienthoai">
            <label>Địa chỉ: </label><br>
            <input type="text" disabled  size="30" tabindex="1" class="form-control txtBoxStyle" value="" id="diachi">
        </div>
        <button  id="capnhatthongtin" type="button" class="btn btn-primary"><i class="icon-pencil" aria-label="pencil icon"></i> Cập Nhật Thông Tin</button>
        <button  id="luucapnhatthongtin" type="button" class="btn btn-primary hidden"><i class="icon-pencil" aria-label="pencil icon"></i> Lưu</button>
    </div>

    <div style="display: flex; flex-direction: column; align-items: center">
        <button
            type="button"
            class="btn btn-default btn-lg"
            data-toggle="modal"
            data-target="#resetPW"
            style="pointer-events: none; margin: 0 2em"
        >
            <i
                class="icon-cw"
                role="presentation"
                aria-label="reset password"
            ></i
            >Đơn Hàng Của Bạn
        </button>
    </div>

    <div style="display: flex; flex-direction: column; align-items: center">
        <button
            type="button"
            class="btn btn-default btn-lg"
            data-toggle="modal"
            data-target="#resetPW"
            style="pointer-events: none"
        >
            <i
                class="icon-cw"
                role="presentation"
                aria-label="reset password"
            ></i
            >Lịch Sử Mua Hàng
        </button>
    </div>
</div>


<script>
    const hoten = document.querySelector("#hoten")
    const nhanhoten = document.querySelector("#nhanhoten")
    const nhanho = document.querySelector("#nhanho")
    const nhanten = document.querySelector("#nhanten")
    const ho = document.querySelector("#ho")
    const ten = document.querySelector("#ten")
    const gioitinh = document.querySelector("#gioitinh")
    const sdt = document.querySelector("#sodienthoai")
    const diachi = document.querySelector("#diachi")
    const capnhathongtin = document.querySelector("#capnhatthongtin")
    const selectgioitinh = document.querySelector("#select_gioi_tinh");
    const btnluu = document.querySelector("#luucapnhatthongtin")
    const btncapnhat = document.querySelector("#capnhatthongtin")
    nhanhoten.classList.remove("hidden")
    document.addEventListener('DOMContentLoaded', () => {
        fetch("/KhachHang/laythongtinkhachhang").then(r => r.json()).then(j => {
            hoten.value = `${j.khachhang.hokh} ${j.khachhang.tenkh}` 
            gioitinh.value = j.khachhang.gioitinh
            sdt.value = j.khachhang.sdt
            diachi.value = j.khachhang.diachi
            ho.value = j.khachhang.hokh
            ten.value = j.khachhang.tenkh
        });
        
    })

    capnhatthongtin.onclick = function(){
        hoten.disabled = false
        gioitinh.disabled = false
        sdt.disabled = false
        diachi.disabled = false
        selectgioitinh.classList.remove("hidden");
        gioitinh.classList.add("hidden");
        btnluu.classList.remove("hidden");
        btncapnhat.classList.add("hidden");
        hoten.classList.add("hidden")
        nhanhoten.classList.add("hidden")
        ho.classList.remove("hidden")
        ten.classList.remove("hidden")
        nhanho.classList.remove("hidden")
        nhanten.classList.remove("hidden")
        
    }

    btnluu.onclick = function() {
        const formData = new FormData();
        formData.append("ho", ho.value);
        formData.append("ten", ten.value);
        formData.append("gioitinh",selectgioitinh.value);
        formData.append("sdt", sdt.value);
        formData.append("diachi", diachi.value);
        fetch('/KhachHang/capnhatthongtin',{
            method: 'POST',
            body: formData
        }).then(r => r.json()).then(j => {
            console.log(j)
        })

        btnluu.classList.add("hidden");
        btncapnhat.classList.remove("hidden");
        hoten.disabled = true
        gioitinh.disabled = true
        sdt.disabled = true
        diachi.disabled = true
        gioitinh.classList.remove("hidden");
        selectgioitinh.classList.add("hidden");
        nhanho.classList.add("hidden")
        nhanten.classList.add("hidden")
        ho.classList.add("hidden")
        ten.classList.add("hidden")
        hoten.classList.remove("hidden")
        nhanhoten.classList.remove("hidden")

        document.location.href="/KhachHang/myaccount"
        

        
    }

</script>
