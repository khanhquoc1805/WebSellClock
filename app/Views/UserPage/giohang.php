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
                        <span>Mua nhanh thanh toán khi nhận hàng</span>
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
                                                1
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
                                                    value="<?php echo $dschitiet[$i]['soluong'] ?>"
                                                    name="quantity_956694"
                                                    size="8px"
                                                />
                                            </td>
                                            <td
                                                class="price-product don_gia_hide"
                                                align="center"
                                                
                                            ><?php echo $dschitiet[$i]['gia'] ?></td>

                                            <td
                                                class="total-price"
                                                align="center"
                                            ><?php echo $dschitiet[$i]['thanhtien'] ?></td>

                                            <td
                                                class="center-column"
                                                align="center"
                                            >
                                                <a
                                                    href=""
                                                    title=""
                                                >
                                                    <img
                                                        src=""
                                                        alt=""
                                                    />
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                        
                                    </tbody>
                                </table>
                                <div class="all-button-cart pull-left">
                                    <input
                                        class="button-cart"
                                        type="button"
                                        name="next_step"
                                        id="sub-next-buy"
                                        value="◄ Tiếp tục mua hàng"
                                    />
                                    <input
                                        class="button-cart"
                                        type="submit"
                                        name="re_calculate"
                                        id="sub-re-cal"
                                        value="Tính lại"
                                    />
                                    <input
                                        class="button-cart"
                                        type="button"
                                        name="remove"
                                        value="Xóa hết"
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
                                    <span>18.009.500 VNĐ</span>
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
                            <h2><span>Thông tin đặt hàng</span></h2>
                            <div class="shopping_buyer_saller">
                                <!--	CONTENT IN FRAME	-->
                                <div id="msg_error"></div>
                                <!--	INFO OF SENDER			-->

                                <table
                                    class="info-customer-gh"
                                    width="100%"
                                    border="0"
                                    cellpadding="5"
                                >
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input
                                                    placeholder="Họ tên (*)"
                                                    type="text"
                                                    name="sender_name"
                                                    id="sender_name"
                                                    value=""
                                                    class="input_text"
                                                    size="30"
                                                />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input
                                                    placeholder="Điện thoại (*)"
                                                    type="text"
                                                    name="sender_telephone"
                                                    id="sender_telephone"
                                                    value=""
                                                    class="input_text"
                                                    size="30"
                                                />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input
                                                    placeholder="Địa chỉ (*)"
                                                    type="text"
                                                    name="sender_address"
                                                    id="sender_address"
                                                    value=""
                                                    class="input_text"
                                                    size="30"
                                                />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input
                                                    placeholder="Email"
                                                    type="text"
                                                    name="sender_email"
                                                    id="sender_email"
                                                    value=""
                                                    class="input_text"
                                                    size="30"
                                                />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <textarea
                                                    placeholder="Chú thích đơn hàng"
                                                    name="sender_comments"
                                                    id="sender_comments"
                                                ></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Những có dấu (<font> * </font>)
                                                là bắt buộc phải nhập
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="test-info-next">
                                                <a>
                                                    Thanh toán khi nhận hàng
                                                    <span>
                                                        Thanh toán C.O.D
                                                    </span>
                                                </a>

                                                