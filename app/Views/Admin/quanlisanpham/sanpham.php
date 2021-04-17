<div style="padding: 16px">
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
            <select class="form-select form-control" name="idthuonghieu" id="">
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
>
    <?php for ($i=0; $i<count($dshanghoa); $i++): ?>
    <div class="card" style="width: 18rem">
        <img
            src="../<?php echo $dshanghoa[$i]['image'] ?>"
            class="card-img-top"
            alt="..."
        />
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $dshanghoa[$i]['tenhanghoa'] ?>
            </h5>
            <button class="btn btn-primary">Xem Chi Tiết</button>
            <button 
            data-idsanpham = "<?php echo $dshanghoa[$i]['idhanghoa'] ?>"
            class="btn btn-danger btn-sanpham" style="width: 100px">Xóa</button>
        </div>
    </div>
    <?php endfor; ?>
</div>


<script>
console.log("hello");
    const btnxoasanpham = document.getElementsByClassName('btn-sanpham');
    for (let i =0 ; i< btnxoasanpham.length; i++){
        btnxoasanpham[i].onclick = function() {
            const formData = new FormData();
            formData.append("idsanpham", this.getAttribute('data-idsanpham'));
            console.log("hello");
            fetch("/Admin/xoasanpham", {
                body: formData,
                method: "POST"
            }).then(r => r.json()).then(j => {
                if(j.status === 'success'){
                    document.location.href='/Admin/home?status=sanpham'
                }
            })
        }
</script>
