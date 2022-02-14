<?php 
if(session_id() === '') {session_start();}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<style>
		#tool{
			width: 74.5%;
			height: 110px;
			float: right;
			position: relative;
			background-color: white ;
			border-left: 4px outset #ea654d;
		}
		#cart{
			background-color: #FC8787 ;
			padding: 3px 4px ;
			border-radius: 15px;
			border:1px solid #FF0012;
			position:absolute;
			left: 900px;
			top:55px;
			box-shadow: 5px 7px 8px #888888;
		}
		#cart:hover{
			opacity: 80%;
		}
		#search{
			background-color: #F7FAE3 ;
			padding: 10px 300px;
			margin-top:10px;
			border-radius: 20px;
			box-shadow: 5px 7px 8px #888888;
		}
		#find{
			border-radius: 30px;
			box-shadow: 5px 7px 8px #888888;
			background-color: #F7FECB ;
		}
		#find:hover{
			opacity: 70%;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="tool">
		<div id="login">
			<?php 
			if(!empty($_SESSION['username'])) 
				{ ?> 
					<font size="4px">
						<b>
							&nbsp;&nbsp; Xin chào bạn 
							<?php echo $_SESSION['username'] ?>, 
							<a href="logout.php">
							Đăng xuất </a> 
						</b><br><br> 
					</font>
				<?php } 
				else{ ?> 
					<li> 
						<a href="login.php">
							&nbsp; Đăng nhập
						</a> 
					</li> 
				<?php } ?>
			</div>
			<form action="show_search.php" method="GET">
				&nbsp&nbsp<input type="text" placeholder="Nhập tên sản phẩm, từ khóa" id="search" name="search">  <button id="find">Find</button>
			</form>
			<?php 
			if(isset($_SESSION['username'])){ ?>
				<div id="cart"><a href="gio_hang.php"><img src="https://img.icons8.com/pastel-glyph/2x/shopping-cart--v2.png" width="28px"></a></div>
			<?php } ?>
		</div>
	</body>
	</html>


