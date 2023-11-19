<?php
    include 'header.php';
    include 'sidebar.php'; 
    include 'nav.php'; 
    include_once '../model/danhmuc.php';
    if(isset($_GET['action'])){
        $url = $_GET['action'];
        switch($url){
            case 'danhmuc':
                $brands = getAllbrands();
                renderAD('danh_muc/list',['list_brand'=>$brands]);
                break;
            case 'createbrand':
            // createbrand();
            // include_once '../admin/danh_muc/add_brand.php';
                if (isset($_POST['btn_brand_create'])) {

                    $brand_name = $_POST['brand_name'];
                    try {
                        create_brand($brand_name);
                        echo "<script>alert('Thêm thành công!');window.location='index.php?action=danhmuc'</script>";
                    } catch (\Throwable $th) {
                        echo "<script>alert('thất bại');</script>";
                    }
                    
                }
                renderAD('danh_muc/add_brand');
                break;
            case 'editBrand':
                if(isset($_GET['id_brand'])){
                    $brand = getBrandId($_GET['id_brand']);
                    renderAD('danh_muc/update_brand',['brand'=>$brand]);
                }
                break;
            case 'update_brand':
                if (isset($_POST['btn_brand_update'])) {
                    $brand_id = $_POST['id_brand'];
                    $brand_name = $_POST['brand_name'];
                    try {
                        //code...
                        brand_update($brand_name, $brand_id);
                        echo "<script>alert('Sửa thành công!');window.location='index.php?action=danhmuc'</script>";
                    } catch (\Throwable $th) {
                        echo "<script>alert('Sửa thất bại');</script>";
                    }
                }
                break;
            case 'deletebrand':
                if (isset($_GET['id_brand']) && $_GET['id_brand']) {
                    delete_productbyIdbrand($_GET['id_brand']);
                    delete_brand($_GET['id_brand']);
                    echo "<script>alert('Đã xóa thành công!');window.location='index.php?action=danhmuc'</script>";
                }
                break;
        }
    }else 
        header('location: index.php?action=sanpham');
?>
<?php include 'footer.php'?>