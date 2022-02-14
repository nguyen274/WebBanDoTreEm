<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/Sign_in.css">
	<title>Baby Store - Đăng ký thành viên</title>
	<?php include("include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("include/user_side_bar.php") ?>
		<div id="dang_ki">
			<form method="post" action="process/signin_process.php">
				<table cellspacing="0" cellpadding="3">
					<tr>
						<td colspan="2"><h1>ĐĂNG KÝ THÀNH VIÊN</h1></td>
					</tr>
					<tr>
						<td class = "form">Họ và tên:</td>
						<td class="input"><input type="text" name="ho_ten" required="" placeholder="Nguyễn Văn A..."></td>
					</tr>
					<tr>
						<td class = "form">Username:</td>
						<td class="input"><input type="text" name="username" required="" placeholder="abcdef123..."></td>
					</tr>
					<tr>
						<td class = "form">Password:</td>
						<td class="input"><input type="password" name="password" required=""></td>
					</tr>
					<tr>
						<td class = "form">Số điện thoại:</td>
						<td class="input"><input type="text" name="dien_thoai" required=""></td>
					</tr>
					<tr>
						<td class = "form">Ngày sinh:</td>
						<td class="input"><input type="date" name="dob" required=""></td>
					</tr>
					<tr>
						<td class = "form">Email:</td>
						<td class="input"><input type="email" name="email" required="" placeholder="NguyenA@gmail.com ..."></td>
					</tr>
					<tr>
						<td class = "form">Địa chỉ:</td>
						<td class="input" required=""><textarea name="dia_chi" placeholder="35 Giảng Võ..."></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="checkbox" required="">Tôi đã đọc và đảm bảo mọi thông tin là chính xác.
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php 
								if (isset($_GET["error"])) {
									echo "Đăng kí thất bại. Vui lòng thử điền lại thông tin đúng định dạng.";
								}
							?>
							<br>
							<button class="button">ĐĂNG KÍ</button>
						</td>
					</tr>
				</table>
			</form>

			<img src="https://i.pinimg.com/originals/2b/2f/9c/2b2f9cea8b94babdbc522b3428536781.jpg" width="100%" height="800px">
		</div>

		<?php include("include/infor.php") ?>

		<?php include("include/move.php")?>
	</div>
</body>
</html>