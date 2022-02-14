<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		#cart_1 a{
			background: #FEEAEA;
			color: black;
			border: 1px solid black ; 
			padding: 2px 8px ;
			border-radius: 5px;
			text-decoration: none;
			font-weight: bold;
		}

	</style>
</head>
<body>
	<div id="cart_1">	
		<?php if(isset($_SESSION['username'])){ ?>
			<a href="them_san_pham.php?ma_sp=<?php echo $row['ma_sp'] ?>">
				<img src="https://img.icons8.com/pastel-glyph/2x/shopping-cart--v2.png" width="17px"> Thêm vào giỏ</a>
			<?php } ?>
		</div>
	</body>
	</html>