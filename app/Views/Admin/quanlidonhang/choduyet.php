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
            <tbody id='tbody_<?= $dsdonhang[$i]['id'] ?>'>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td class=><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo number_format($dsdonhang[$i]['tonggiatri'],0,"",".") ?> (VNĐ) </td>
                    <td class="xemchitiet"><button data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-success'>Xem Chi Tiết</button></td>
                    <td class="hidden dongchitiet"><button data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-danger'>Đóng</button></td>
                    <td>
                        <select data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>" class="form-select" aria-label="Default select example">
                            <option selected value="Chờ Duyệt"><?php echo $dsdonhang[$i]['trangthai'] ?></option>
                            <option value="Đã Duyệt">Đã Duyệt</option>
                        </select>
                    </td>
                </tr>
                
                <tr class="hidden title-chitiet" style="border: 1px solid black">
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Hình Ảnh</td>
                    <td>Số Lượng</td>
                    <td>Đơn Giá(VNĐ)</td>
                    <td>Thành Tiền</td>
                </tr>
                <?php for($k = 0; $k < count($dschitietdonhang); $k++): ?>
                    <?php for($h = 0; $h < count($dschitietdonhang[$k]); $h++): ?>
                        <?php if ($dschitietdonhang[$k][$h]['iddonhang'] === $dsdonhang[$i]['id']) { ?>
                            <tr class="hidden" id="chitiet_<?= $dsdonhang[$i]['id'] ?>">
                                <td><?= $h + 1 ?></td>
                                <?php for($l = 0; $l < count($dshanghoa); $l++): ?>
                                    <?php if ($dshanghoa[$l]['idhanghoa'] === $dschitietdonhang[$k][$h]['idhanghoa']) { ?>
                                        <td><?= $dshanghoa[$l]['tenhanghoa'] ?></td>
                                        <td><img src="/<?= $dshanghoa[$l]['image'] ?>" alt="" style="width:40px; height: 40px"></td>
                                        <td><?= $dschitietdonhang[$k][$h]['soluong'] ?></td>
                                        <td><?= number_format($dshanghoa[$l]['gia'],0,"",".") ?></td>
                                        <td><?= number_format($dschitietdonhang[$k][$h]['thanhtien'],0,"" ,".")?></td>
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