<?php
    include "class/category_class.php";
    $category = new category;
    if (!isset($_GET['categoryID']) || $_GET['categoryID']==NULL){
        echo "<script>window.location = 'categoryList.php'</script>";
    }
    else{
        $categoryID = $_GET['categoryID'];
    }
    $delete_category = $category->delete_category($categoryID);

?>
