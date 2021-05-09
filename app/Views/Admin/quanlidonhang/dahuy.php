<style>
.hidden {
    display: none;
}
tr {
    padding-top: 2em !important; 
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
            <tbody id='tbody_<?= $dsdonhang[$i]['id'] ?>'>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['tonggiatri'] ?></td>
                    <td class="xemchitiet"><button data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-success'>Xem Chi Tiết</button></td>
                    <td class="hidden dongchitiet"><button data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-danger'>Đóng</button></td>
                    <td>
                        <button class="btn btn-danger btn-xoa"
                        data-iddonhang="<?= $dsdonhang[$i]['id'] ?>">Xóa</button>
                    </td>
                </tr>
                <tr class="hidden title-chitiet">
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Số Lượng</td>
                    <td>Đơn Giá(VNĐ)</td>
                    <td>Thành Tiền</td>
                </tr>
                <?php for($k = 0; $k < count($dschitietdonhang); $k++): ?>
                    <?php for($h = 0; $h < count($dschitietdonhang[$k]); $h++): ?>
                        <?php if ($dschitietdonhang[$k][$h]['iddonhang'] === $dsdonhang[$i]['id']) { ?>
                            <tr class="hidden chitiet" id="chitiet_<?= $dsdonhang[$i]['id'] ?>" style="margin-top: 2em !important">
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
            </tbody>
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


    const dsbtnxemchitiet = document.querySelectorAll('.xemchitiet');
    const ttchitiet = document.querySelectorAll('.title-chitiet');
    const dsbtndongchitiet = document.querySelectorAll('.dongchitiet');
    const chitiet = document.querySelectorAll('.chitiet');
    


    for (let i=0 ; i<dsbtnxemchitiet.length; i++){
        dsbtnxemchitiet[i].onclick = function() {
            const child = this.firstElementChild;
            const tbody = document.querySelector('#tbody_' + child.getAttribute('data-iddonhang'));
            
            
            for(let j = 0; j < tbody.children.length; ++j) {
                if (tbody.children[j].id === ('chitiet_' + child.getAttribute('data-iddonhang'))) {
                    console.log(child.getAttribute('data-iddonhang'));
                    tbody.children[j].classList.remove("hidden");
                }
            }

            dsbtnxemchitiet[i].classList.add('hidden');
            dsbtndongchitiet[i].classList.remove("hidden");
        }
    }

    for (let i=0 ; i < dsbtndongchitiet.length; i++){
        dsbtndongchitiet[i].onclick = function(){
            const child = this.firstElementChild;
            const tbody = document.querySelector('#tbody_' + child.getAttribute('data-iddonhang'));
            console.log(tbody.children);
            for(let j = 0; j < tbody.children.length; ++j) {
                if (tbody.children[j].id === ('chitiet_' + child.getAttribute('data-iddonhang'))) {
                    tbody.children[j].classList.add("hidden");
                }
                
            }

            dsbtnxemchitiet[i].classList.remove('hidden');
            dsbtndongchitiet[i].classList.add("hidden");
        }
    }
</script>