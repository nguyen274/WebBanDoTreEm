<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sản phẩm tìm kiếm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/BS.css">
    <?php include("include/icon.php") ?>
    <style>
        #page{
            width: 74.5%;
            float: right;
            font-family: segoe ui light;
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
    </style>
</head>
<body>
    <div id="tong">
        <?php include("include/user_side_bar.php") ?>
        <div id="tools"><?php include("include/tool.php") ?></div><br>
        <div align="center" id="page">
            
            <h4>Sản phẩm tìm kiếm:</h4>
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