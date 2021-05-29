<style>
.hidden {
    display: none;
}
#tablechitiet, #tablechitiet td, #tablechitiet th {
    
    border-collapse: collapse;
    
}


</style>

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đã Duyệt</h6>
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
            <?php for ($i=0; $i<count($dsdonhang); $i++): ?>  
            <?php if ($dsdonhang[$i]['trangthai'] === 'Đã Duyệt' ) {?>
            <tbody id='tbody_<?= $dsdonhang[$i]['id'] ?>'>
                <tr>
                    <td><?php echo $dsdonhang[$i]['id'] ?></td>
                    <td><?php echo $dsdonhang[$i]['ngaydathang'] ?></td>
                    <td><?php echo $dsdonhang[$i]['taikhoan'] ?></td>
                    <td><?php echo $dsdonhang[$i]['thanhtoan'] ?></td>
                    <td><?php echo number_format($dsdonhang[$i]['tonggiatri'],0,"",".") ?> (VNĐ) </td>
                    <td class="xemchitiet"><button data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-success'>Xem Chi Tiết</button></td>
                    <td>
                        <select data-iddonhang="<?php echo $dsdonhang[$i]['id'] ?>" class="form-select" aria-label="Default select example">
                            <option selected value="Đã Duyệt"><?php echo $dsdonhang[$i]['trangthai'] ?></option>
                            <option value="Đang Giao">Đang Giao</option>
                        </select>
                    </td>
                </tr>
                
                
            </tbody>
            <?php } ?>
            <?php endfor; ?>
        </table>
        
        <?php for ($i=0; $i<count($dsdonhang); $i++): ?>  
            <?php if ($dsdonhang[$i]['trangthai'] === 'Đã Duyệt' ) {?>
                <div
                    id="chitiet_<?= $dsdonhang[$i]['id'] ?>"
                    class="content hidden"
                    style="padding: 2em; border: 1px solid blue; margin: 2em"
                >
                <h2 style="text-align: center; ">CHI TIẾT ĐƠN HÀNG</h2>
                <p>Người Nhận: <?php echo $dsdonhang[$i]['taikhoan'] ?> </p>
                <p>Địa Chỉ Giao Hàng: <?php echo $dsdiachi[$i]['tendiachi'] ?></p>
                    
                    <table id ="tablechitiet"
                        width="100%"
                        border="1"
                        class="table-product-pack mt20"
                        bordercolor="#DCDCDC"
                        cellpadding="6"
                        
                    >
                        <thead>
                            <tr class="head-tr">
                                <th class="th-column" width="6%">STT</th>
                                <th class="th-column" width="">Tên</th>
                                <th class="th-column" width="12%">Số lượng</th>
                                <th class="th-column don_gia_hide" width="18%">
                                    Đơn giá(VNĐ)
                                </th>
                                <th class="th-column" width="18%">Thành Tiền</th>
                                
                            </tr>
                        </thead>
                            <?php for($k = 0; $k < count($dschitietdonhang); $k++): ?>
                                <?php for($h = 0; $h < count($dschitietdonhang[$k]); $h++): ?>
                                    <?php if ($dschitietdonhang[$k][$h]['iddonhang'] === $dsdonhang[$i]['id']) { ?>
                                        <tr class="chitiet" id="sschitiet_<?= $dsdonhang[$i]['id'] ?>">
                                            <td><?= $h + 1 ?></td>
                                            <?php for($l = 0; $l < count($dshanghoa); $l++): ?>
                                                <?php if ($dshanghoa[$l]['idhanghoa'] === $dschitietdonhang[$k][$h]['idhanghoa']) { ?>
                                                    <td><?= $dshanghoa[$l]['tenhanghoa'] ?></td>
                                                    <td><?= $dschitietdonhang[$k][$h]['soluong'] ?></td>
                                                    <td><?= number_format($dshanghoa[$l]['gia'],0,"",",") ?> (VNĐ)</td>
                                                    <td><?= number_format($dschitietdonhang[$k][$h]['thanhtien'],0,"",".") ?> (VNĐ) </td>
                                                <?php } ?>
                                            <?php endfor; ?>
                                        </tr>                            
                                    <?php } ?>
                                <?php endfor; ?>
                            <?php endfor; ?>
                            </table>
                            
                            <p style="text-align: right; margin-top: 8px; color: red; font-weight:bold">Tổng Tiền: <?php echo number_format($dsdonhang[$i]['tonggiatri'],0,"",".") ?> (VNĐ)</p>
                            <div style="text-align: center;"><button style="margin: 0 auto;" data-iddonhang="<?= $dsdonhang[$i]['id'] ?>" class='btn btn-danger dongchitiet'>Đóng</button></div>
                            </div>

                <?php } ?>
                
            <?php endfor; ?>
            
        
        
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
                    document.location.href='/Admin/home?status=daduyet'
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
            const iddonhang = this.firstChild.getAttribute("data-iddonhang");
            console.log(iddonhang);
            const div = document.getElementById("chitiet_" + iddonhang);
            div.classList.remove("hidden")            
        }
    }

    for (let i=0 ; i < dsbtndongchitiet.length; i++){
        dsbtndongchitiet[i].onclick = function(){
            const iddonhang = this.getAttribute("data-iddonhang");
            console.log(iddonhang);
            const div = document.getElementById("chitiet_" + iddonhang);
            div.classList.add("hidden")
        }
    }
</script>
