<style>
.hidden {
    display: none !important;
}

</style>
<div style="padding: 16px" id="khungthemsanpham">
    <button
        id="btnThemThuongHieu"
        class="btn btn-info"
        style="margin-bottom: 10px"
    >
        Thêm Sản Phẩm
    </button>
    <form
        enctype="multipart/form-data"
        method="POST"
        action="/Admin/themsanpham"
        id="formThemSanPham"
        class="hidden"
        style="max-width: 100%; display: flex;"
    >
        <div class="form-group" style="width: 40%; margin-right: 16px">
        <div class="form-group">
            <label for="inputIdThuongHieu">Mã Thương Hiệu:</label>
            <select class="form-select form-control" name="idthuonghieu">
                <?php for($i = 0; $i < count($dsthuonghieu); $i++): ?>
                    <option value="<?php echo $dsthuonghieu[$i]['idthuonghieu']?>">
                        <?php echo $dsthuonghieu[$i]['tenthuonghieu']?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputIdSanPham">Mã Sản Phẩm:</label>
            <input
                type="text"
                name="idsanpham"
                class="form-control"
                id="inputIdSanPham"
                placeholder="Nhập mã sản phẩm"
            />
        </div>
        <div class="form-group">
            <label for="inputTenSanPham">Tên Sản Phẩm:</label>
            <input
                type="text"
                name="tensanpham"
                class="form-control"
                id="inputTenSanPham"
                placeholder="Nhập tên sản phẩm"
            />
        </div>
        <div class="form-group">
            <label for="inputGioiTinh">Dành cho:</label>
            <select class="form-select form-control" name="phai" id="">
                <option selected value="Nữ">Nữ</option>
                <option value="Nam">Nam</option>
                <option value="cd">Cặp Đôi</option>
            </select>
        </div>
        </div>
        <div class="form-group">
        <div class="form-group">
            <label for="inputGiaSanPham">Giá Sản Phẩm:</label>
            <input
                type="number"
                min="0",
                name="giasanpham"
                class="form-control"
                id="inputGiaSanPham"
                placeholder="Nhập giá sản phẩm"
            />
        </div>
        <div class="form-group">
            <label for="inputSoLuong">Số Lượng:</label>
            <input
                type="number"
                min="1",
                name="soluongsanpham"
                class="form-control"
                id="inputSoLuong"
                placeholder="Nhập số lượng sản phẩm"
            />
        </div>
        <label class="form-label" for="inputImage">Chọn Ảnh:</label>
        <input
            type="file"
            name="image"
            id="inputImage"
            placeholder="Password"
        /><br />
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="margin: 16px auto">
                Xác Nhận
            </button>
        </div>
        </div>
    </form>
</div>
<div
    style="
        padding: 26px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        height: 70vh;
        overflow-y: scroll;
    "
    id="khungdshanghoa"
>
    <?php for ($i=0; $i<count($dshanghoa); $i++): ?>
    <div class="card" style="width: 18rem">
        <img  style="width:286px; height: 346px"
            src="../<?php echo $dshanghoa[$i]['image'] ?>"
            class="card-img-top"
            alt="..."
        />
        <div class="card-body">
            <h5 class="card-title" style="width:246px; height: 72px">
                <?php echo $dshanghoa[$i]['tenhanghoa'] ?>
            </h5>
            <div>
                <button class="btn btn-primary updatethongtin" data-idhanghoa = <?php echo $dshanghoa[$i]['idhanghoa'] ?> data-soluong = <?php echo $dshanghoa[$i]['soluong'] ?> >UPDATE</button>
                <button 
                data-idsanpham = "<?php echo $dshanghoa[$i]['idhanghoa'] ?>"
                class="btn btn-danger btn-sanpham" style="width: 100px">DELETE</button>
            </div>
            
        </div>
    </div>
    <?php endfor; ?>

    



</div>

<div id="khungcapnhatthongtin" class="hidden">
<h2 style="text-align: center; padding: 16px 16px">Cập Nhật Thông Tin Hàng Hóa</h2>
<div style="width: 80%; display: grid; grid-template-columns: 50% 50%; grid-gap: 24px; margin: 0 auto;">
        <div class="form-group">
            <label for="kieumay">Kiểu Máy:</label>
            <input
                type="text"
                name="kieumay"
                class="form-control"
                id="kieumay"
                placeholder="Nhập kiểu máy"
            />
        </div>
        <div class="form-group">
            <label for="nguongoc">Nguồn Gốc:</label>
            <input
                type="text"
                name="nguongoc"
                class="form-control"
                id="nguongoc"
                placeholder="Nhập nguồn gốc"
            />
        </div>
        <div class="form-group">
            <label for="chatlieuvo">Chất Liệu Vỏ:</label>
            <input
                type="text"
                name="chatlieuvo"
                class="form-control"
                id="chatlieuvo"
                placeholder="Nhập Chất liệu vỏ"
            />
        </div>
        <div class="form-group">
            <label for="kichco">Kích Cỡ:</label>
            <input
                type="text"
                name="kichco"
                class="form-control"
                id="kichco"
                placeholder="Nhập Kích Cỡ"
            />
        </div>
        <div class="form-group">
            <label for="chatlieuday">Chất Liệu Dây:</label>
            <input
                type="text"
                name="chatlieuday"
                class="form-control"
                id="chatlieuday"
                placeholder="Nhập Chất Liệu Dây"
            />
        </div>
        <div class="form-group">
            <label for="chatlieukinh">Chất Liệu Kính:</label>
            <input
                type="text"
                name="chatlieukinh"
                class="form-control"
                id="chatlieukinh"
                placeholder="Nhập Chất Liệu Kính"
            />
        </div>
        <div class="form-group">
            <label for="baohiem">Bảo Hiểm:</label>
            <input
                type="text"
                name="baohiem"
                class="form-control"
                id="baohiem"
                placeholder="Nhập Bảo Hiểm"
            />
        </div>
        <div class="form-group">
            <label for="soluonghang">Cập Nhật Số Lượng Hàng:</label>
            <input
                type="text"
                name="soluonghang"
                class="form-control"
                id="soluonghang"
                placeholder="Nhập Số Lượng Hàng Cập Nhật"
            />
        </div>

    </div>
    <div style="margin: 0 auto"><button class=" btn btn-success" id="hoantat">Hoàn Tất</button></div>
</div>
<script>
    const btnxoasanpham = document.getElementsByClassName('btn-sanpham');
    for (let i =0 ; i< btnxoasanpham.length; i++){
        btnxoasanpham[i].onclick = function() {
            const formData = new FormData();
            formData.append("idsanpham", this.getAttribute('data-idsanpham'));
            if(!confirm("Bạn chắc chắn muốn xóa?")){
                return;
            }
            fetch("/Admin/xoasanpham", {
                body: formData,
                method: "POST"
            }).then(r => r.json()).then(j => {
                if(j.status === 'success'){
                    document.location.href='/Admin/home?status=sanpham'
                }
            })
        }
    }

    const khungthemsanpham = document.getElementById("khungthemsanpham");
    const khungdshanghoa = document.getElementById("khungdshanghoa");
    const khungcapnhatthongtin = document.getElementById("khungcapnhatthongtin");
    const dsBtnUpdateTT = document.getElementsByClassName("updatethongtin");
    const hoantat = document.getElementById("hoantat");
    for (let i =0 ; i< dsBtnUpdateTT.length; i++){
        dsBtnUpdateTT[i].onclick = function (){
            khungdshanghoa.classList.add("hidden")
            khungthemsanpham.classList.add("hidden")
            khungcapnhatthongtin.classList.remove("hidden")
            hoantat.setAttribute("data-idhanghoa", this.getAttribute("data-idhanghoa"));
            document.getElementById('soluonghang').value = this.getAttribute("data-soluong")
        }
    }


    

    hoantat.onclick = function(){
        const idhanghoa = this.getAttribute("data-idhanghoa");
        const soluonghang = document.getElementById('soluonghang').value;;
        const kieumay = document.getElementById('kieumay').value;
        const nguongoc = document.getElementById('nguongoc').value;
        const chatlieuvo = document.getElementById('chatlieuvo').value;
        const kichco = document.getElementById('kichco').value;
        const chatlieuday = document.getElementById('chatlieuday').value;
        const chatlieukinh = document.getElementById('chatlieukinh').value;
        const baohiem = document.getElementById('baohiem').value;
        console.log(idhanghoa,kieumay,nguongoc,chatlieuvo);
        const formData = new FormData();
        formData.append('idhanghoa', idhanghoa);
        formData.append('kieumay', kieumay);
        formData.append('nguongoc', nguongoc);
        formData.append('chatlieuvo', chatlieuvo);
        formData.append('kichco', kichco);
        formData.append('chatlieuday', chatlieuday);
        formData.append('chatlieukinh', chatlieukinh);
        formData.append('baohiem', baohiem);
        formData.append('soluonghang', soluonghang);
        
        fetch("/Admin/capNhatThongTinHangHoa", {
            method: 'POST',
            body: formData
        }).then(r => r.json()).then(j => {
            if(j.status === 'success'){
                alert("Cập nhật thành công");
                document.location.href = document.location.href;
            }

        })

        khungdshanghoa.classList.remove("hidden")
        khungthemsanpham.classList.remove("hidden")
        khungcapnhatthongtin.classList.add("hidden")

        
    }    
</script>
