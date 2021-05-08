<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đang Giao</h6>
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
                    <th>Trạng Thái</th>
                </tr>
            </thead>    
            <?php for ($i=0; $i<count($dsdonhang); $i++): ?>  
            <?php if ($dsdonhang[$i]['trangthai'] === 'Đang Giao' ) {?>
            <thead>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['tonggiatri'] ?></td>
                    <td>
                        <select data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>" class="form-select" aria-label="Default select example">
                            <option selected value="Đang Giao"><?php echo $dsdonhang[$i]['trangthai'] ?></option>
                            <option value="Hoàn Thành">Hoàn Thành</option>
                        </select>
                    </td>
                </tr>
                <tr class="hidden chitiet">
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Số Lượng</td>
                    <td>Đơn Giá(VNĐ)</td>
                    <td>Thành Tiền</td>
                </tr>
                <?php for($k = 0; $k < count($dschitietdonhang); $k++): ?>
                    <?php for($h = 0; $h < count($dschitietdonhang[$k]); $h++): ?>
                        <?php if ($dschitietdonhang[$k][$h]['iddonhang'] === $dsdonhang[$i]['id']) { ?>
                            <tr>
                                <td><?= $h + 1 ?></td>
                                <?php for($l = 0; $l < count($dshanghoa); $l++): ?>
                                    <?php if ($dshanghoa[$l]['idhanghoa'] === $dschitietdonhang[$k][$h]['idhanghoa']) { ?>
                                        <td><?= $dshanghoa[$l]['tenhanghoa'] ?></td>
                                        <td><?= $dschitietdonhang[$k][$h]['soluong'] ?></td>
                                        <td><?= $dshanghoa[$l]['gia'] ?></td>
                                        <td><?= $dschitietdonhang[$k][$h]['thanhtien'] ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>                            
                        <?php } ?>
                    <?php endfor; ?>
                <?php endfor; ?>
            </thead>
            <?php } ?>
            <?php endfor; ?>
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
                    document.location.href='/Admin/home?status=danggiao'
                }
            });
        }
    }
</script>
