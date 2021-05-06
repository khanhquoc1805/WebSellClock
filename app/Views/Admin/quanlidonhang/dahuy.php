<style>
.hidden {
    display: none;
}
</style>

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đã Hủy</h6>
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
            <?php if ($dsdonhang[$i]['trangthai'] === 'Đã Xóa') {?>
            <thead>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['tonggiatri'] ?></td>
                    <td><button data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>" class='btn btn-success'>Xem Chi Tiết</button></td>
                    <td>
                        <button class="btn btn-danger btn-xoa"
                        data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>">Xóa</button>
                    </td>
                </tr>
            </thead>
            <?php }?>
            <?php endfor;?>
        </table>
    </div>
</div>
<script>
    const DsBtnXoa = document.querySelectorAll('.btn-xoa');
    for (let i=0; i < DsBtnXoa.length; i++){
        DsBtnXoa[i].onclick = function(){
            formdata = new FormData();
            formdata.append('iddonhang',this.getAttribute('data-iddonhang'));
            fetch('/Admin/xoadonhangdahuy', {
                method: 'POST',
                body: formdata
            }).then(r => r.json()).then(j => {
                if(j.status==='success'){
                    document.location.href="/admin/home?status=dahuy"
                }
            })
        }
    }
</script>