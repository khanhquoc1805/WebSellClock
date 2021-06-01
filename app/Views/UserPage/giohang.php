<?php 
    echo view("header.php")
?>

<div class="container-header container">
    <div id="main_container" class="mt20">
        <div class="main-column">
            <div class="breadcrumbs cls">
                <div
                    class="breadcrumbs_wrapper"
                    itemscope=""
                    itemtype="http://schema.org/WebPage"
                >
                    
                </div>
            </div>

            <div class="center-1col">
                ﻿﻿﻿
                <div class="product_cart mt20">
                    <h1 class="page_title">
                        <span>MY CART</span>
                    </h1>
                    <div class="detail_inner">
                        <!--	Product list and price			-->
                        <div class="shopcart_product">
                            <form action="#" method="post" name="shopcart">
                                <table
                                    width="100%"
                                    border="1"
                                    class="table-product-pack mt20"
                                    bordercolor="#DCDCDC"
                                    cellpadding="6"
                                >
                                    <thead>
                                        <tr class="head-tr">
                                            <th class="th-column" width="6%">
                                                STT
                                            </th>
                                            <th class="th-column" width="">
                                                Tên
                                            </th>
                                            <th class="th-column" width="12%">
                                                Số lượng
                                            </th>
                                            <th
                                                class="th-column don_gia_hide"
                                                width="18%"
                                            >
                                                Đơn giá(VNĐ)
                                            </th>
                                            <th class="th-column" width="18%">
                                                Tổng
                                            </th>
                                            <th class="th-column" width="10%">
                                                Chọn Mua
                                            </th>
                                            <th class="th-column" width="10%">
                                                Xóa
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  Product list -->
                                    <?php for ($i = 0; $i < count($dschitiet); $i++): ?>
                                        <tr>
                                            <td
                                                class="center-column"
                                                align="center"
                                            >
                                                <?php echo $i + 1 ?>
                                            </td>
                                            <td
                                                class="name-product"
                                                align="center"
                                            >
                                                <a
                                                    href=""
                                                >
                                                <?php echo $dschitiet[$i]['tenhanghoa'] ?>
                                                </a>
                                                <br />
                                                <a
                                                    href=""
                                                >
                                                    <img
                                                        width="80"
                                                        height="100"
                                                        src="../<?php echo $dschitiet[$i]['image'] ?>"
                                                        alt=""
                                                    />
                                                </a>
                                            </td>
                                            <td align="center">
                                                <input
                                                    class="numbers-pro"
                                                    type="text"
                                                    max="<?= $dschitiet[$i]['tongsoluong'] ?>"
                                                    value="<?php echo $dschitiet[$i]['soluong'] ?>"
                                                    data-tenhanghoa="<?= $dschitiet[$i]['tenhanghoa'] ?>"
                                                    name="quantity_956694"
                                                    size="8px"
                                                />
                                            </td>
                                            <td
                                                class="price-product don_gia_hide"
                                                align="center"
                                                
                                            ><?php echo number_format($dschitiet[$i]['gia'],0,"",".") ?></td>

                                            <td
                                                class="total-price"
                                                align="center"
                                            ><?php echo number_format($dschitiet[$i]['thanhtien'],0,"",".") ?></td>
                                            <td
                                                class="total-price"
                                                align="center"
                                            ><input type="checkbox" class="chonmua" value="<?php echo  $dschitiet[$i]['idhanghoa'] ?>"></td>
                                            <td
                                                class="center-column"
                                                align="center"
                                            >
                                               <button data-idhanghoa="<?php echo $dschitiet[$i]['idhanghoa'] ?>" class="btn btn-danger btn-xoa">X</button>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                        
                                    </tbody>
                                </table>
                                <div class="all-button-cart pull-left" style="margin-top: 2em;">
                                    <input
                                        class="button-cart"
                                        type="button"
                                        name="next_step"
                                        id="sub-next-buy"
                                        value="◄ Tiếp tục mua hàng"
                                    />
                                    <input
                                        class="button-cart"
                                        type="button"
                                        name="remove"
                                        value="Xóa hết"
                                        id="xoahet"
                                    />
                                    <input
                                        class="button-cart"
                                        type="button"
                                        name="order"
                                        id="sub-pro-liquidate"
                                        value="Thanh toán ►"
                                    />
                                </div>

                                <div
                                    class="total-price pull-right"
                                    align="right"
                                >
                                    Tổng:
                                    <span><?php echo number_format($tongtien,0,"",".") ?> VNĐ</span>
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="Itemid" value="11" />
                                <input
                                    type="hidden"
                                    name="module"
                                    value="products"
                                />
                                <input type="hidden" name="view" value="cart" />
                                <input
                                    type="hidden"
                                    name="task"
                                    value="ere_cal2"
                                    id="task"
                                />
                            </form>
                        </div>
                        <form
                            action="#"
                            name="eshopcart_info"
                            method="post"
                            id="eshopcart_info"
                        >
                            <!--	INFOR sender and recipient			-->
                            
<script>
const btnThanhToan = document.getElementById('sub-pro-liquidate');
    btnThanhToan.onclick = function() {
    const chonMuaCheckBoxs = document.getElementsByClassName("chonmua");
    const dsInputSoLuong = document.querySelectorAll('.numbers-pro');
    let dsidhanghoa = "";
    for (let i = 0; i < chonMuaCheckBoxs.length; ++i) {
        if (chonMuaCheckBoxs[i].checked) {
            if (parseInt(dsInputSoLuong[i].value) <= parseInt(dsInputSoLuong[i].max)) {
                dsidhanghoa += JSON.stringify({
                idhanghoa: chonMuaCheckBoxs[i].value,
                soluong: dsInputSoLuong[i].value
                }) + "|";
            } else {
                alert(`Sản phẩm ${dsInputSoLuong[i].getAttribute('data-tenhanghoa')} chỉ còn tối đa: ${dsInputSoLuong[i].max}`)
                return;
            }
        }
    }
    
    

    dsidhanghoa = dsidhanghoa.substring(0, dsidhanghoa.length - 1);
    const formData = new FormData();
    formData.append("dsidhanghoa", dsidhanghoa);
    fetch("/khachhang/donhang", {
        body: formData,
        method: "POST"
    }).then(r => r.json()).then(j => {
        if (j.status === "success") {
            document.location.href = "/KhachHang/donhang"
        }
    });
}

const dsBtnXoa = document.getElementsByClassName("btn-xoa");
for(let i = 0; i < dsBtnXoa.length; ++i) {
    dsBtnXoa[i].onclick = function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append("idhanghoa", this.getAttribute("data-idhanghoa"))
        fetch("/khachhang/deletePhantuGiohang", {
            body: formData,
            method: "POST"
        }).then(r => r.json()).then(j => {
            if (j.status === "success") {
                document.location.href = "/KhachHang/giohang"
            }   
        });
    }
}

const btnxoahet = document.querySelector('#xoahet');



</script>