<?php 
    echo view("header.php")
?>

<center><table width="80%" border="1" class="table-product-pack mt20" bordercolor="#DCDCDC" cellpadding="6">
    <h1 class="page_title"><span>ĐẶT HÀNG</span></h1>
    <thead>
        <tr class="head-tr">
            <th class="th-column" width="6%">STT</th>
            <th class="th-column" width="">Tên</th>
            <th class="th-column" width="12%">Số lượng</th>
            <th class="th-column don_gia_hide" width="18%">Đơn giá(VNĐ)</th>
            <th class="th-column" width="18%">Tổng</th>
        </tr>
    </thead>
    <tbody>
        <!--  Product list -->
        <?php for ($i = 0; $i < count($dschitiet); $i++): ?>
        <tr>
            <td class="center-column" align="center">
                <?php echo $i + 1 ?>
            </td>
            <td class="name-product" align="center">
                <a href="">
                    <?php echo $dschitiet[$i]['tenhanghoa'] ?>
                </a>
                <br />
                <a href="">
                    <img width="80" height="100" src="../<?php echo $dschitiet[$i]['image'] ?>" alt="" />
                </a>
            </td>
            <td align="center">
                <input class="numbers-pro" type="text" disabled value="<?php echo $dschitiet[$i]['soluong'] ?>"
                    name="quantity_956694" size="8px" />
            </td>
            <td class="price-product don_gia_hide" align="center">
                <?php echo $dschitiet[$i]['gia'] ?>
            </td>

            <td class="total-price" align="center">
                <?= number_format($dschitiet[$i]['thanhtien'], 0, "", ".") ?>
            </td>

            <td class="center-column" align="center">
                <a href="" title="">
                    <img src="" alt="" />
                </a>
            </td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table></center>
<form action="#" name="eshopcart_info" method="post" id="eshopcart_info">
    
    <h2><span>Thông tin đặt hàng</span></h2>
    <div class="shopping_buyer_saller">
        <div id="msg_error"></div>
        <table class="info-customer-gh" width="100%" border="0" cellpadding="5">
            <tbody>
                <tr>
                    <td  class="info-mua-hang">
                        <input placeholder="Họ tên (*)" type="text" name="sender_name" id="sender_name"
                            value="<?php echo $hoten ?>" readonly class="input_text" size="30" />
                    </td>
                </tr>
                <tr>
                    <td  class="info-mua-hang">
                        <input placeholder="Điện thoại (*)" type="text" name="sender_telephone" id="sender_telephone"
                            value="<?php echo $sdt ?>" readonly class="input_text" size="30" />
                    </td>
                </tr>
                <tr>
                    <td class="info-mua-hang">
                        <input placeholder="Địa chỉ (*)" type="text" name="sender_address" id="sender_address"
                            value="<?php echo $diachi ?>" class="input_text" size="30" />
                    </td>
                </tr>
                <tr>
                    <td class="info-mua-hang">
                        <textarea placeholder="Chú thích đơn hàng" name="sender_comments"
                            id="sender_comments"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td class="test-info-next info-mua-hang">
                        <a class="button-step button-cart" href="javascript:void(0);" id="thanhtoan">
                            Thanh toán khi nhận hàng
                            <span> Thanh toán C.O.D </span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="clear"></div>

        <input type="hidden" name="module" value="products" />
        <input type="hidden" name="view" value="cart" />
        <input type="hidden" name="task" value="eshopcart2_simple_save" id="task" />
        <input type="hidden" name="tenor" value="" id="tenor" />
        <input type="hidden" name="bankcode" value="" id="bankcode" />
    </div>
    <!--	end INFOR sender and recipient		-->
</form>
</div>


<script>
    const btnThanhToan = document.getElementById("thanhtoan");
    const chuthichDonHang = document.getElementById("sender_comments");
    const dsgiasanphamTd = document.getElementsByClassName('price-product');
    const dssoluongTd = document.getElementsByClassName('numbers-pro');
    const diachi = document.getElementById("sender_address");

    const dsgiasanpham = [];
    const dssoluong = [];
    for (let i = 0; i < dsgiasanphamTd.length; ++i) {
        dsgiasanpham.push(parseInt(dsgiasanphamTd[i].innerText));
        dssoluong.push(dssoluongTd[i].value);
    }

    btnThanhToan.onclick = function () {
        const formData = new FormData();
        formData.append("chuthich", chuthichDonHang.value)
        formData.append("dsgiasanpham", dsgiasanpham)
        formData.append("dssoluong", dssoluong)
        formData.append("diachi",diachi.value)
        fetch("/khachhang/taodonhang", {
            body: formData,
            method: "POST"
        }).then(r => r.json()).then(j => {
            if (j.status === 'success') {
                document.location.href = '/KhachHang/myaccount?donhangcuaban'
            }
        })
    }

</script>