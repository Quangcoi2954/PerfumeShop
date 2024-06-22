<?php
include "database.php";
?>
<?php
class category{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function insert_category($category_name)
    {
        $query = "INSERT INTO category (categoryName) VALUES ('$category_name')";
        $result = $this->db->insert($query);
        header('location:categoryList.php');
        return $result;
    }

    public function show_category(){
        $query = "SELECT * FROM category ORDER BY categoryID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_category($categoryID){
        $query = "SELECT * FROM category WHERE categoryID = '$categoryID'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_category($categoryID, $categoryName){
        $query = "UPDATE category SET categoryName = '$categoryName' WHERE categoryID = '$categoryID'";
        $result = $this->db->update($query);
        header('location:categoryList.php');
        return $result;
    }

    public function delete_category($categoryID){
        $query = "DELETE FROM category WHERE categoryID = '$categoryID'";
        $result = $this->db->delete($query);
        header('location:categoryList.php');
        return $result;
    }
}
?>
