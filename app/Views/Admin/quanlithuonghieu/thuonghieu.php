<style>
    .hidden {
        display: none;
    }
</style>

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thương Hiệu</h6>
</div>
<div class="card-body">
    <button id="btnThemThuongHieu" class="btn btn-info" style="margin-bottom: 10px">
        Thêm Thương Hiệu
    </button>
    <form enctype="multipart/form-data" method="POST" 
        action="/Admin/themthuonghieu" id="formThemThuongHieu"
        class="hidden" style="max-width: 30%">
        <div class="form-group">
            <label for="inputIdThuongHieu">Mã Thương Hiệu:</label>
            <input
                type="text"
                name="idthuonghieu"
                class="form-control"
                id="inputIdThuongHieu"
                placeholder="Nhập mã thương hiệu"
            >
        </div>
        <div class="form-group">
            <label for="inputTenThuongHieu">Tên Thương Hiệu:</label>
            <input
                type="text"
                name="tenthuonghieu"
                class="form-control"
                id="inputTenThuongHieu"
                placeholder="Nhập tên thương hiệu"
            >
        </div>
        <label class="form-label" for="exampleInputPassword1">Chọn Logo:</label>
        <input
            type="file"
            name="logo"
            id="exampleInputPassword1"
            placeholder="Password"
        />
        <button type="submit" class="btn btn-primary" style="margin: 10px 0;">Xác Nhận</button>
    </form>
    <div class="table-responsive">
        <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
        >
            <thead>
                <tr>
                    <th>Mã Thương Hiệu</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Logo</th>
                    <th></th>
                </tr>
            </thead>
            <?php for ($i=0; $i<count($dsthuonghieu); $i++): ?>
            <thead>
                <tr>
                    <td><?php echo $dsthuonghieu[$i]['idthuonghieu'] ?></td>
                    <td class="tenthuonghieu">
                        <?php echo $dsthuonghieu[$i]['tenthuonghieu'] ?>
                    </td>
                    <td class="logothuonghieu" style="cursor: pointer">
                        <?php echo $dsthuonghieu[$i]['logo'] ?>
                    </td>
                    <td>
                        <button data-idthuonghieu="<?php echo $dsthuonghieu[$i]['idthuonghieu'] ?>" class="btn btn-danger btn-xoathuonghieu">
                            Xóa
                        </button>
                    </td>
                </tr>
            </thead>
            <?php endfor; ?>
        </table>
    </div>
</div>

<script>
const btnThemThuongHieu = document.getElementById("btnThemThuongHieu");
const formThemThuongHieu = document.getElementById("formThemThuongHieu");
btnThemThuongHieu.onclick = function() {
    if (btnThemThuongHieu.innerText === "Thêm Thương Hiệu") {
        btnThemThuongHieu.classList.remove("btn-info");
        btnThemThuongHieu.classList.add("btn-danger");
        btnThemThuongHieu.innerText = "Đóng";
        formThemThuongHieu.classList.remove("hidden");
    } else {
        btnThemThuongHieu.classList.remove("btn-danger");
        btnThemThuongHieu.classList.add("btn-info");
        btnThemThuongHieu.innerText = "Thêm Thương Hiệu";
        formThemThuongHieu.classList.add("hidden");
    }
}

    const dsbtnxoa = document.getElementsByClassName('btn-xoathuonghieu');
    for (let i =0 ; i< dsbtnxoa.length; i++){
        dsbtnxoa[i].onclick = function() {
            const formData = new FormData();
            formData.append("idthuonghieu", this.getAttribute('data-idthuonghieu'));
            if(!confirm("Bạn Chắc Chắn Muốn Xóa?")){
                return;
            }
            fetch("/Admin/xoathuonghieu", {
                body: formData,
                method: "POST"
            }).then(r => r.json()).then(j => {
                if(j.status === 'success'){
                    document.location.href='/Admin/home?status=thuonghieu'
                }
            })
        }

    }
    


</script>