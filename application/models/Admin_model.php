<?php

class Admin_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
        
    }
    /*All the names are suggestive enough and hence less code commenting*/
    public function insertcategory($data) {
        $this->db->insert('category', $data);
    }
    public function insertSizeValue($data) {
        $this->db->insert('size', $data);
    }
    public function insertColorValue($data) {
        $this->db->insert('color', $data);
    }
    public function insertBrandValue($data) {
        $this->db->insert('brand', $data);
    }
    public function insertSubcategory($data) {
        $this->db->insert('sub_category', $data);
    }
    public function getCategory() {
        $category = $this->db->dbprefix('category');
        $sql      = "SELECT * FROM $category ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }
    public function getColor() {
        $color  = $this->db->dbprefix('color');
        $sql    = "SELECT * FROM $color ";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSize() {
        $size   = $this->db->dbprefix('size');
        $sql    = "SELECT * FROM $size";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getBrand() {
        $brand  = $this->db->dbprefix('brand');
        $sql    = "SELECT * FROM $brand";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getsubcategoryByID($catid) {
        $subcategory = $this->db->dbprefix('sub_category');
        $sql         = "SELECT * FROM $subcategory
    WHERE `cat_id`='$catid'";
        $query       = $this->db->query($sql);
        $result      = $query->result();
        return $result;
    }
    public function productInsert($data) {
        $this->db->insert('product', $data);
    }
    public function productColor($data) {
        $this->db->insert('product_color', $data);
    }
    public function productSize($data) {
        $this->db->insert('product_size', $data);
    }
    public function getProfileValue($userid) {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user
    WHERE `user_id`='$userid'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getUserValue($id) {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user WHERE `user_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    /*delet single product image*/
    public function getSingleProImageById($id) {
        $image  = $this->db->dbprefix('product_image');
        $sql    = "SELECT * FROM $image
    WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    /*delet all product image*/
    public function getProImageById($id) {
        $image  = $this->db->dbprefix('product_image');
        $sql    = "SELECT * FROM $image
    WHERE `pro_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function UserUpdate($id, $data) {
        $this->db->where('user_id', $id);
       return $this->db->update('users', $data);
    }
     public function StaffUpdate($id, $data) {
        $this->db->where('user_id', $id);
        return $this->db->update('users', $data);
      
    }
    public function UpdateTododata($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('to_do_list', $data);
    }
    public function updatePassword($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }
    public function settingsUpdate($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('settings', $data);
    }
    public function getProductData() {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`  
      LEFT JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSubCatById($id) {
        $sql    = "SELECT `sub_category`.*,
      `category`.*
      from `sub_category`
      LEFT JOIN `category` ON `sub_category`.`cat_id`=`category`.`cat_id`
      WHERE `sub_category`.`subcat_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateSubcategory($id, $data) {
        $this->db->where('subcat_id', $id);
        $this->db->update('sub_category', $data);
    }
    public function getproductdetails($proid) {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*,
      `brand`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`  
      LEFT JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
      WHERE `product`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getProductById($id) {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*,
      `brand`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`  
      LEFT JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
      WHERE `product`.`pro_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetRelatedproduct($catid,$proid) {
        $sql    = "SELECT * FROM `product` WHERE `product`.`cat_id`='$catid' AND `product`.`pro_id` != '$proid' LIMIT 4";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function getproductsize($proid) {
        $sql    = "SELECT `product_size`.*,
      `size`.*
      from `product_size`
      LEFT JOIN `size` ON `product_size`.`size_id`=`size`.`size_id`  
      WHERE `product_size`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getproductcolor($proid) {
        $sql    = "SELECT `product_color`.*,
      `color`.*
      from `product_color`
      LEFT JOIN `color` ON `product_color`.`color_id`=`color`.`color_id`  
      WHERE `product_color`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSettingsValue() {
        $settings = $this->db->dbprefix('settings');
        $sql      = "SELECT * FROM $settings";
        $query    = $this->db->query($sql);
        $result   = $query->row();
         return $result;
        
    }
    public function getAllUsers() {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user WHERE `user_type`='User'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function addUserInfo($data) {
        $this->db->insert('users', $data);
    }
    public function getAllGroupsUser() {
        $sql    = "SELECT * FROM `users` WHERE `user_type`='User'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getAllGroupsAdmin() {
        $sql    = "SELECT * FROM `users` WHERE `user_type`='Admin'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function selectgroupdatabyId($id) {
        $sql    = "SELECT * FROM `users` WHERE `user_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateGroupInfo($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }
    public function addUserNote($data) {
        $this->db->insert('notes', $data);
    }
    public function getUserNotes($userid) {
        $sql    = "SELECT `users`.*,
      `notes`.*
      from `notes`
      LEFT JOIN `users` ON `notes`.`comment_id`=`users`.`user_id`
      WHERE `notes`.`user_id`='$userid' ORDER BY `notes`.`datetime`DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSubCategory() {
        $sql    = "SELECT `category`.*,
      `sub_category`.*
      from `sub_category`
      LEFT JOIN `category` ON `sub_category`.`cat_id`=`category`.`cat_id`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getTodoInfo($userid) {
        $sql    = "SELECT * FROM `to_do_list` WHERE `user_id`='$userid' ORDER BY `id` DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProImage() {
        $sql    = "SELECT * FROM `product_image`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getproductImages($proid) {
        $sql    = "SELECT * FROM `product_image` WHERE `pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProductColors($proid) {
        $sql    = "SELECT `product_color`.*,
      `color`.*
      from `product_color`
      LEFT JOIN `color` ON `product_color`.`color_id`=`color`.`color_id`
      WHERE `product_color`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProductSizes($proid) {
        $sql    = "SELECT `product_size`.*,
      `size`.*
      from `product_size`
      LEFT JOIN `size` ON `product_size`.`size_id`=`size`.`size_id`
      WHERE `product_size`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getCategoryValueById($id) {
        $sql    = "SELECT * FROM `category` WHERE `cat_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getSizeBYId($id) {
        $sql    = "SELECT * FROM `size` WHERE `size_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getColorById($id) {
        $sql    = "SELECT * FROM `color` WHERE `color_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetproductImage($proid) {
        $sql    = "SELECT * FROM `product_image` WHERE `pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getBrandBYID($id) {
        $sql    = "SELECT * FROM `brand` WHERE `brand_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateCategory($catid, $data) {
        $this->db->where('cat_id', $catid);
        $this->db->update('category', $data);
    }
    public function updateSizeValue($id, $data) {
        $this->db->where('size_id', $id);
        $this->db->update('size', $data);
    }
    public function updateColorValue($id, $data) {
        $this->db->where('color_id', $id);
        $this->db->update('color', $data);
    }
    public function updateBrandValue($id, $data) {
        $this->db->where('brand_id', $id);
        $this->db->update('brand', $data);
    }
    public function productUpdateInfo($id, $data) {
        $this->db->where('pro_id', $id);
        $this->db->update('product', $data);
    }
    public function insert_tododata($data) {
        return $this->db->insert('to_do_list', $data);
    }
    public function productImgInsert($data1) {
        $this->db->insert('product_image', $data1);
    }
    public function userTableDelet($id) {
        $this->db->delete('users', array(
            'user_id' => $id
        ));
        $this->db->delete('notes', array(
            'user_id' => $id
        ));
        $this->db->delete('notes', array(
            'comment_id' => $id
        ));
    }
    public function delet_Color($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_color');
    }
    public function delet_Size($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_size');
    }
    public function delet_Product($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product');
    }
    public function deelet_Img($id) {
        $this->db->where('id', $id);
        $this->db->delete('product_image');
    }
    public function deelet_Pro_Imgage($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_image');
    }
    /*Notifications Model*/
    public function notifications_user($id) {
        $sql = "SELECT `notes`.*,
        `users`.`full_name`, `image`
        FROM `notes` 
        LEFT JOIN `users` ON `notes`.`comment_id` = `users`.`user_id`
        WHERE `notes`.`user_id` = '$id' AND `notification_status` = 'unseen' AND `notes`.`comment_id` != '$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function set_notifiication($id) {
        $sql = "UPDATE notes SET notification_status = 'seen' WHERE user_id = '$id' AND notification_status = 'unseen'";
        $this->db->query($sql);
        
    }

     public function getResultValue($id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function getLiveResultValue($id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function getResultValuemarket($market_id) {
        $user   = $this->db->dbprefix('results');
        // $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND  MAX(result_no)";
        // $sql = "SELECT *, Max(resutl_no) as res FROM $user WHERE market_id='$market_id'";
        $sql = "SELECT * FROM $user WHERE market_id='$market_id'";

        $query  = $this->db->query($sql);
        $result = $query->result();
    //   echo "<pre>";
    //   print_r($result);
    //     exit();
         return $result;
    }
    
 

    
    
     public function getResultValuemarketMon($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='MON'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketTue($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='TUE'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketWed($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='WED'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketThu($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='THU'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketFri($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='FRI'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketSat($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='SAT'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResultValuemarketSun($market_id) {
        $user   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $user WHERE `market_id`='$market_id' AND `day`='SUN'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getResult() {
        $results = $this->db->dbprefix('results');
        $sql      = "SELECT * FROM $results ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }
    public function getResultforuser($id) {
        $results = $this->db->dbprefix('results');
        $sql      = "SELECT * FROM $results WHERE `user_id`='$id'";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

     public function getLiveResult() {
        $results = $this->db->dbprefix('results');
        $sql      = "SELECT * FROM $results ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

    public function getResultfrn() {
        $results = $this->db->dbprefix('results');
        $sql      = "SELECT * FROM $results WHERE `status`='Active'";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }


    public function getResultValueById($id) {
        $sql    = "SELECT * FROM `results` WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }


    public function getLiveResultValueById($id) {
        $sql    = "SELECT * FROM `results` WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function ResultValueById($id) {
        $sql    = "SELECT * FROM `results` WHERE `market_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function updateResult($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('results', $data);
    }
    
    public function insertResult($data) {
        $this->db->insert('results', $data);
    }

    public function delet_Result($id) {
        $this->db->where('id', $id);
        $this->db->delete('results');
    }


    public function updateLiveResult($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('results', $data);
    }
    
    public function insertLiveResult($data) {
        $this->db->insert('results', $data);
    }

    public function delet_liveResult($id) {
        $this->db->where('id', $id);
        $this->db->delete('results');
    }
    
    public function getluckyValue($id,$date){
      
        $udate = date('Y-m-d', strtotime($date));
        $packegelist   = $this->db->dbprefix('results');
        $sql    = "SELECT * FROM $packegelist WHERE `market_id`='$id' && `date`='$udate' ";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function getAllStaffs() {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user WHERE `user_type`='Staff'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
     public function insertPackege($data) {
        $this->db->insert('packeges', $data);
    }
   
     public function getPackege() {
        $packege = $this->db->dbprefix('packeges');
        $sql      = "SELECT * FROM $packege ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }
     

     public function getSubscriptionbyid($id) {
        $packegelist   = $this->db->dbprefix('packeges');
        $sql    = "SELECT packege_name FROM $packegelist WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }


    public function getSubscription(){
        $packegelist = $this->db->dbprefix('packegelist');
        $sql      = "SELECT * FROM $packegelist ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

     public function insertSubscription($data) {
        return $this->db->insert('packegelist', $data);
    }
    public function updateSubscription($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('packegelist', $data);
    }

    public function subscriptionTableDelet($id) {
        $this->db->delete('packegelist', array(
            'id' => $id
        ));
        
    }


     public function getPackegebyid($id) {
        $user   = $this->db->dbprefix('packegelist');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updatePackege($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('packeges', $data);
    }

    public function packegeTableDelet($id) {
        $this->db->delete('packeges', array(
            'id' => $id
        ));
        
    }


     public function getpackegelistById($id) {
        $sql    = "SELECT `packegelist`.*,
      `packeges`.*
      from `packegelist`
      LEFT JOIN `packeges` ON `packegelist`.`packege_id`=`packeges`.`id`
      WHERE `packegelist`.`packege_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function insertfaq($data) {
        $this->db->insert('faqs', $data);
    }
    public function getfaq() {
        $faq = $this->db->dbprefix('faqs');
        $sql      = "SELECT * FROM $faq ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 
    public function getfaqbyid($id) {
        $user   = $this->db->dbprefix('faqs');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updatefaq($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('faqs', $data);
    }
    public function faqTableDelet($id) {
        $this->db->delete('faqs', array(
            'id' => $id
        ));
        
    }

    public function insertabout($data) {
       return $this->db->insert('about', $data);
    }
    
     public function updateabout($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('about', $data);
    }

     public function getabout() {
        $about = $this->db->dbprefix('about');
        $sql      = "SELECT * FROM $about ";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    } 

     public function getaboutbyid($id) {
        $user   = $this->db->dbprefix('about');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }


     public function getfreetip() {
        $about = $this->db->dbprefix('freetip');
        $sql      = "SELECT * FROM $about ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 
     public function getfreetipValue($id) {
        $user   = $this->db->dbprefix('freetip');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
     public function delet_freetip($id) {
        $this->db->where('id', $id);
        $this->db->delete('freetip');
    }

      public function updatefreetip($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('freetip', $data);
    }
    
    public function insertfreetip($data) {
        $this->db->insert('freetip', $data);
    }
    public function getFreetipValueById($id) {
        $sql    = "SELECT * FROM `freetip` WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
      public function getResultnamebyid($id) {
        $markets   = $this->db->dbprefix('results');
        $sql    = "SELECT market_name FROM $markets WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function getpopularity() {
        $popularity = $this->db->dbprefix('popularity');
        $sql      = "SELECT * FROM $popularity ";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    } 
     public function getpopularitybyid($id) {
        $user   = $this->db->dbprefix('popularity');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updatepopularity($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('popularity', $data);
    }
    
    public function insertpopularity($data) {
        $this->db->insert('popularity', $data);
    }

    public function getCharts() {
        $chart = $this->db->dbprefix('chart');
        $sql      = "SELECT * FROM $chart ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }
    public function getChartById($id) {
        $sql    = "SELECT * FROM `chart` WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
     public function updatechart($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('chart', $data);
    }
    
    public function insertchart($data) {
        $this->db->insert('chart', $data);
    }

    public function delet_chart($id) {
        $this->db->where('id', $id);
        $this->db->delete('chart');
    }

     public function getmarkets() {
        $market = $this->db->dbprefix('markets');
        $sql      = "SELECT * FROM $market ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

    public function updatemarkets($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('markets', $data);
    }
    
    public function insertmarkets($data) {
        $this->db->insert('markets', $data);
    }

    public function getmarketValue($id) {
        $market   = $this->db->dbprefix('markets');
        $sql    = "SELECT * FROM $market WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function delet_market($id) {
        $this->db->where('id', $id);
        $this->db->delete('markets');
    }


 public function getmarketassign() {
        $market = $this->db->dbprefix('market_assign');
        $sql      = "SELECT * FROM $market ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 

    public function updatemarketassign($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('market_assign', $data);
    }
    
    public function insertmarketassign($data) {
        $this->db->insert('market_assign', $data);
    }

    public function getmarketassignValue($id) {
        $market   = $this->db->dbprefix('market_assign');
        $sql    = "SELECT * FROM $market WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
     public function getmarketassignuserValue($id) {
        $market   = $this->db->dbprefix('market_assign');
        $sql    = "SELECT * FROM $market WHERE `user_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

     public function delet_marketassign($id) {
        $this->db->where('id', $id);
        $this->db->delete('market_assign');
    }


    public function getDesclaimer() {
        $desclaimers = $this->db->dbprefix('desclaimer');
        $sql      = "SELECT * FROM $desclaimers";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }
     public function getdesclaimerbyid($id) {
        $user   = $this->db->dbprefix('desclaimer');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
     public function updatedesclaimer($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('desclaimer', $data);
    }

     public function getNotification() {
        $notification = $this->db->dbprefix('notification');
        $sql      = "SELECT * FROM $notification ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

     public function getnotificationbyid($id) {
        $user   = $this->db->dbprefix('notification');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updatenotification($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('notification', $data);
    }

     public function getpass() {
        $live = $this->db->dbprefix('guessing_pass');
        $sql      = "SELECT * FROM $live";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }
     public function getpassbyid($id) {
        $user   = $this->db->dbprefix('guessing_pass');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
     public function updatepass($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('guessing_pass', $data);
    }

     public function getlive_update() {
        $live = $this->db->dbprefix('liveupdate');
        $sql      = "SELECT * FROM $live";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }
    public function getlive_updatebyid($id) {
        $user   = $this->db->dbprefix('liveupdate');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function getlivestatus() {
        $live = $this->db->dbprefix('liveupdate');
        $sql      = "SELECT * FROM $live WHERE  `status`='Active'";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }


    
     public function updatelive_update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('liveupdate', $data);
    }

     public function insertwiki($data) {
       return $this->db->insert('wiki', $data);
    }
    
     public function updatewiki($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('wiki', $data);
    }

     public function getwiki() {
        $wiki = $this->db->dbprefix('wiki');
        $sql      = "SELECT * FROM $wiki ";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    } 

    public function getwikibyid($id) {
        $user   = $this->db->dbprefix('wiki');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    
 public function getkalyan_achuk() {
        $market = $this->db->dbprefix('kalyanachuk');
        $sql      = "SELECT * FROM $market ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 

    public function updateachuk($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('kalyanachuk', $data);
    }
    
    public function insertachuk($data) {
        $this->db->insert('kalyanachuk', $data);
    }

    public function getachukValue($id) {
        $market   = $this->db->dbprefix('kalyanachuk');
        $sql    = "SELECT * FROM $market WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function delet_achuk($id) {
        $this->db->where('id', $id);
        $this->db->delete('kalyanachuk');
    }


    public function getw_img() {
        $market = $this->db->dbprefix('whatsapp_img');
        $sql      = "SELECT * FROM $market ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 

    public function updatew_img($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('whatsapp_img', $data);
    }
    
    public function insertw_img($data) {
        $this->db->insert('whatsapp_img', $data);
    }

    public function getw_imgValue($id) {
        $market   = $this->db->dbprefix('whatsapp_img');
        $sql    = "SELECT * FROM $market WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

     public function delet_w_img($id) {
        $this->db->where('id', $id);
        $this->db->delete('whatsapp_img');
    }
     public function insertforum($data) {
        $this->db->insert('forum', $data);
    }

      public function getforum() {
        $forum = $this->db->dbprefix('forum');
        $sql      = "SELECT * FROM $forum ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    } 
    public function getm_description() {
        $live = $this->db->dbprefix('mdescription');
        $sql      = "SELECT * FROM $live";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }
    public function getm_descriptionbyid($id) {
        $user   = $this->db->dbprefix('mdescription');
        $sql    = "SELECT * FROM $user WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    
    public function updatem_description($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('mdescription', $data);
    }
    public function getb_description() {
    $live = $this->db->dbprefix('bdescription');
    $sql      = "SELECT * FROM $live";
    $query    = $this->db->query($sql);
    $result   = $query->row();
    return $result;
}
public function getb_descriptionbyid($id) {
    $user   = $this->db->dbprefix('bdescription');
    $sql    = "SELECT * FROM $user WHERE `id`='$id'";
    $query  = $this->db->query($sql);
    $result = $query->row();
    return $result;
}

public function updateb_description($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('bdescription', $data);
}

public function singleValueById($id) {
    $sql    = "SELECT * FROM `single` WHERE `market_id`='$id'";
    $query  = $this->db->query($sql);
    $result = $query->row();
    return $result;
}

public function getsingledata($id) {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `user_id`='$id' && `game`='SINGLE'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}
public function getallsingledata() {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `game`='SINGLE' ORDER BY digit ASC";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}


 public function updatesingle($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('single', $data);
}

public function insertsingle($data) {
    return $this->db->insert('single', $data);
}

public function delet_single($id) {
    $this->db->where('id', $id);
    return $this->db->delete('single');
}

public function getpannadata($id) {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `user_id`='$id' && `game`='PANNA'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}
public function getallpannadata() {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `game`='PANNA'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}

 public function updatepanna($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('single', $data);
}

public function insertpanna($data) {
    return $this->db->insert('single', $data);
}
public function delet_panna($id) {
    $this->db->where('id', $id);
    return $this->db->delete('single');
}
public function getjodidata($id) {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `user_id`='$id' && `game`='JODI'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    // return $result;

}
public function getalljodidata() {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `game`='JODI'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}

 public function updatejodi($id, $data) {
    $this->db->where('id', $id);
   return $this->db->update('single', $data);
}

public function insertjodi($data) {
    return $this->db->insert('single', $data);
}
public function delet_jodi($id) {
    $this->db->where('id', $id);
    return $this->db->delete('single');
}

public function getallresults($id) {
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results Where `user_id`='$id'";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    // return $result;
    print_r($result);
}


// public function getalljodidata() {
//     $results = $this->db->dbprefix('single');
//     $sql      = "SELECT * FROM $results WHERE `game`='JODI'";
//     $query    = $this->db->query($sql);
//     $result   = $query->result();
//     return $result;
// }

// public function getalljodidata() {
//     $results = $this->db->dbprefix('single');
//     $sql      = "SELECT * FROM $results WHERE `game`='JODI'";
//     $query    = $this->db->query($sql);
//     $result   = $query->result();
//     return $result;
// }






public function getalldatebydate($id,$date,$type){ 
    $results = $this->db->dbprefix('single');
    $sql      = "SELECT * FROM $results WHERE `date`='$date' && `market_id`='$id' && `type`='$type' && `game`='SINGLE' ORDER BY digit ASC";
    $query    = $this->db->query($sql);
    $result   = $query->result();
    return $result;
}

function fetch_state($market_id)
 { 
  $this->db->where('id', $market_id);
  $this->db->order_by('id', 'ASC');
  $query = $this->db->get('markets');
  $output = '<option value="">Select time</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->result_open_start_time.'</option>';
  }
  return $output;
 }



}
?>