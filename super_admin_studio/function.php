<?php


// Get all category details

function getAllCategoryDetails(){
    $arr  = [];

    $qry ="SELECT * FROM studio_category ORDER BY cat_id ASC";
    $run = mysqli_query($GLOBALS['conn'],$qry);

    while($row = mysqli_fetch_array($run)){
        $arr[] = $row;
    }

    return $arr;
}


// Get category details by id

function getCatDetailsByid($cat_id){

    $qry = "SELECT * FROM studio_category WHERE cat_id='$cat_id'";
    $run = mysqli_query($GLOBALS['conn'],$qry);
    $num = mysqli_num_rows($run);

    if($num > 0){
        $row = mysqli_fetch_array($run);
        
        return $row;

    }else{

        return false;
        
    }
}


// delete category details by id

function deleteCategory($cat_id){

    $qry = "DELETE FROM studio_category WHERE cat_id='$cat_id'";
    $delete = mysqli_query($GLOBALS['conn'],$qry);

    if($delete){

        return true;

    }else{

        return false;

    }
}

//Get all image details

function getAllGalleryDetails(){
    
    $arr = [];

    $qry = "SELECT * FROM studio_gallery ORDER BY gal_id DESC";
    $run = mysqli_query($GLOBALS['conn'],$qry);

    while($row = mysqli_fetch_array($run)){
        $arr[] = $row;
    }

    return $arr;
}

// Get gallery details by id

function getGalleryDetailsByid($gal_id){

    $qry = "SELECT * FROM studio_gallery WHERE gal_id='$gal_id'";
    $run = mysqli_query($GLOBALS['conn'],$qry);
    $num = mysqli_num_rows($run);

    if($num > 0){
        $row = mysqli_fetch_array($run);
        
        return $row;

    }else{

        return false;
        
    }
}

// delete image details by id

function deleteImage($gal_id){

    $qry = "DELETE FROM studio_gallery WHERE gal_id='$gal_id'";
    $delete = mysqli_query($GLOBALS['conn'],$qry);

    if($delete){

        return true;

    }else{

        return false;

    }
}

//insta

function getAllInstaImages(){
    $arr = [];
    
    $qry = "SELECT * FROM studio_insta_img ORDER BY id DESC";
    $run = mysqli_query($GLOBALS['conn'],$qry);

    while($row = mysqli_fetch_array($run)){
        $arr[] = $row;
    }

    return $arr;
}

function getAllInstaImagesById($id){

    $qry = "SELECT * FROM studio_insta_img WHERE id='$id'";
    $run = mysqli_query($GLOBALS['conn'],$qry);
    $num = mysqli_num_rows($run);

    if($num > 0){
        $row = mysqli_fetch_array($run);
        
        return $row;

    }else{

        return false;
        
    }

}

function deleteInstaImg($id){

    $qry = "DELETE FROM studio_insta_img WHERE id='$id'";
    $delete = mysqli_query($GLOBALS['conn'],$qry);

    if($delete){

        return true;

    }else{

        return false;

    }

}


//Get all banner details

function getAllBannerDetails(){
    
    $arr = [];

    $qry = "SELECT * FROM studio_banner ORDER BY ban_id DESC";
    $run = mysqli_query($GLOBALS['conn'],$qry);

    while($row = mysqli_fetch_array($run)){
        $arr[] = $row;
    }

    return $arr;
}


// Get banner details by id

function getBannerDetailsByid($ban_id){

    $qry = "SELECT * FROM studio_banner WHERE ban_id='$ban_id'";
    $run = mysqli_query($GLOBALS['conn'],$qry);
    $num = mysqli_num_rows($run);

    if($num > 0){
        $row = mysqli_fetch_array($run);
        
        return $row;

    }else{

        return false;
        
    }
}


// delete image details by id

function deleteBanner($ban_id){

    $qry = "DELETE FROM studio_gallery WHERE ban_id='$ban_id'";
    $delete = mysqli_query($GLOBALS['conn'],$qry);

    if($delete){

        return true;

    }else{

        return false;

    }
}










