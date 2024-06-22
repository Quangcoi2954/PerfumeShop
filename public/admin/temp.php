<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>

<?php
$product = new product;
$show_product = $product->show_product();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <h1>Danh Sách Sản Phẩm</h1>
        <table>
            <tr>
                <th>Thương hiệu</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Dung tích</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Tùy biến</th>
            </tr>
            <?php
            if($show_product){
                while($result = $show_product->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $result['categoryID'] ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['gender'] ?></td>
                        <td><?php echo $result['productCapacity'] ?></td>
                        <td><?php echo $result['productPrice'] ?></td>
                        <td><?php echo $result['productDescription'] ?></td>
                        <td><?php echo $result['productImage'] ?></td>
                        <td><?php echo $result['productQuantity'] ?></td>
                        <td><a href="categoryEdit.php?categoryID=<?php echo $result['categoryID'] ?>">Sửa</a> | <a href="categoryDelete.php?categoryID=<?php echo $result['categoryID'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
</section>
</body>
</html>