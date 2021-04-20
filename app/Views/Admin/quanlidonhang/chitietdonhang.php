<div>
    <table>
        <tr>
            <!-- <td>Tên Sản Phẩm</td>
            <td>Hình Ảnh</td> -->
            <td>Số Lượng</td>
            <!-- <td>Giá Sản Phẩm</td> -->
            <td>Thành Tiền</td>
        </tr>
        <?php for($i = 0; $i < count($dschitietdonhang); $i++): ?>
        <td><?php echo $dschitietdonhang[$i][0]['soluong'] ?></td>
        <td><?php echo $dschitietdonhang[$i][0]['thanhtien'] ?></td>
        <?php endfor; ?>
    </table>
</div>