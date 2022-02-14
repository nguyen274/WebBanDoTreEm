<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		th{
			width: 300px;
			height: 360px;
			border: 1px solid orange;
			float: left;
			border-radius: 20px;
			margin-bottom: 10px;
			margin-right: 10px;
		}
		th:hover{
			border: 1px solid red;
		</style>
	</head>
	<body>
		<div>	
			<?php 
			include 'open_sql.php';
			$search = "";
			if(isset($_GET["search"])){
				$search = $_GET["search"];
				if($search==""){
					$search="fdsfdsfds";
				}
			}
			$sql = "SELECT * from san_pham where ten_sp like '%$search%'";
			$result = mysqli_query($con,$sql);
			// var_dump($result);
			// die();
			mysqli_close($con);
			?>
			
			<table border="0" align="center">
				<tr><br></tr>
				<?php 
				if(isset($_GET["search"])){
					if($result !=null){
						while ($row = mysqli_fetch_array($result)) {
							?>
							<tr>
								<th>
									<img src="<?php echo $row['image'] ?>" alt="" height="150px" width="150px">
									<li><?php echo $row['ten_sp'] ?></li>
									<li><?php echo $row['gia_tien'].'.000đ' ?></li>
									<li><?php echo 'số lượng sp còn lại:'.$row['so_luong'] ?></li>
									<?php
									include 'them_gio_hang.php';
									?><br>
									<?php
									include 'chi_tiet.php';
									?>
								</th>
							</tr>

							<?php 
							
						}}}
						?>

						
					</table>
				</div>
			</body>
			</html>