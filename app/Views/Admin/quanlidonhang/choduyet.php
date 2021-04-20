<style>
.hidden {
    display: none;
}
</style>

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Chờ Duyệt</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
        >
            <thead>
                <tr>
                    <th>Đơn Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Khách Hàng</th>
                    <th>Thanh Toán</th>
                    <th>Tổng Tiền</th>
                    <th>Chi Tiết</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <?php for ($i = 0; $i < count($dsdonhang); $i++): ?>
            <?php if ($dsdonhang[$i]['trangthai'] === 'Chờ Duyệt') {?>
            <thead>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['tonggiatri'] ?></td>
                    <td><button data-iddonhang="echo $dsdonhang[$i]['id']" class='btn btn-success'>Xem Chi Tiết</button></td>
                    <td>
                        <select data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>" class="form-select" aria-label="Default select example">
                            <option selected value="Chờ Duyệt"><?php echo $dsdonhang[$i]['trangthai'] ?></option>
                            <option value="Đã Duyệt">Đã Duyệt</option>
                        </select>
                    </td>
                </tr>
            </thead>
            <?php }?>
            <?php endfor;?>
        </table>
    </div>
</div>
<script>
    const dsSelectTrangThai = document.getElementsByClassName("form-select");
    for (let i=0; i<dsSelectTrangThai.length; i++){
        dsSelectTrangThai[i].onchange = function() {
            const trangthai = this.value;
            const iddonhang = this.getAttribute("data-iddonhang");

            const formData = new FormData();
            formData.append("iddonhang", iddonhang)
            formData.append("trangthai", trangthai)
            fetch("/Admin/capnhattrangthaidonhang", {
                body: formData,
                method: "POST"
            }).then(r => r.json()).then(j => {
                if(j.status==='success'){
                    document.location.href='/Admin/home?status=choduyet'
                }
            });
        }
    }
</script>