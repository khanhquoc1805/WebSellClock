<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hoàn Thành</h6>
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
            <?php if ($dsdonhang[$i]['trangthai'] === 'Hoàn Thành' ) {?>
            <thead>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['tonggiatri'] ?></td>
                    <td><?php echo $dsdonhang[$i]['trangthai'] ?></td>
                </tr>
            </thead>
            <?php } ?>
            <?php endfor; ?>
        </table>
    </div>
</div>
