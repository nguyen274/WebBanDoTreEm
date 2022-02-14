<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CHO BÉ NGỦ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/BS.css">
    <?php include("include/icon.php") ?>
    <style>
        #page{
            font-family: segoe ui light;
            width: 74.5%;
            float: right;
        }
        #page a {
            background: #F6FBBB;
            color: red;
            border: 1px solid red ; 
            padding: 2px 8px ;
            border-radius: 5px;
            text-decoration: none;
            box-shadow: 5px 2px 8px #888888;
        }
        #tools{
            font-family: segoe ui light;
        }
        span{
            background: white;
            color: black;
            border: 1px solid black ; 
            padding: 2px 8px ;
            border-radius: 5px;
            text-decoration: none;
            box-shadow: 5px 2px 8px #888888;
        }
        #index a{
            color:#1c94db;
            background:white;
            border:0px;
            box-shadow: 0px 0px 0px white;
        }
        .test{
            width: 300px;
            height: 400px;
            border: 1px solid orange;
            float: left;
            border-radius: 20px;
            margin-bottom: 10px;
            margin-right: 10px;
        }
        .test:hover{
            border: 1px solid red;
        }
        .show{
            width: 74.5%;
            float: left;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php include("include/user_side_bar.php") ?>
        <div id="tools"><?php include("include/tool.php") ?></div><br>
        <div align="center" id="page">
            <div id="index">            
                <p><b><a href="Index.php">Trang chủ</a> > Cho bé ngủ</b></p>
            </div>
            <h4><font color="#E59604"><i>Giường, đệm, ga, nôi, chăn, chiếu, túi ngủ, màn chắn giường.</i></font>
            </h4>
            <?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
            include 'include/open_sql.php';
            
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($con, 'select count(ma_dm) as total from san_pham');
            $row = mysqli_fetch_array($result);
            $total_records = $row['total'];
            
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 6;
            
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
            $total_page = ceil($total_records / $limit);
            
        // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            
        // Tìm Start
            $start = ($current_page - 1) * $limit;
            
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH SẢN PHẨM
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $result = mysqli_query($con, "SELECT * FROM san_pham where ma_dm = 4 LIMIT $start, $limit");
            
            ?>
            <div>
                <?php 
            // PHẦN HIỂN THỊ SẢN PHẨM
            // BƯỚC 6: HIỂN THỊ DANH SÁCH SẢN PHẨM
                while ($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="test">
                        <br>
                        <img src="<?php echo $row['image'] ?>" alt="" height="150px" width="150px">
                        <?php
                        echo '<li>' . $row['ten_sp'] . '</li>';
                        echo '<li>' . $row['gia_tien'] .'.000đ'. '</li>';
                        include 'include/them_gio_hang.php';
                        ?>
                        <br>
                        <?php
                        include 'chi_tiet.php';
                        ?>
                    </div>  
                    <?php
                    
                }
                ?>
            </div>
            <br>
            <div class="show">
             <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
             
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
             if ($current_page > 1 && $total_page > 1){
                echo '<a href="cho_be_ngu.php?page='.($current_page-1).'">Trước</a>  ';
            }
            
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span>  ';
                }
                else{
                    echo '<a href="cho_be_ngu.php?page='.$i.'">'.$i.'</a>  ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="cho_be_ngu.php?page='.($current_page+1).'">Sau</a>  ';
            }
            ?>
        </div>
        <?php  
        include 'include/search.php';
        ?>
    </div>
    <br>
    <?php include ("include/infor.php") ?>

    <?php include("include/move.php") ?>
    
</div>
</body>
</html>