<?php 
session_start();
include('includes/config.php');
//error_reporting(0);

?>
			<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT id,Status,EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{

$_SESSION['login']=$_POST['email'];


require("connection1.php");
$sql="SELECT * From tblusers WHERE EmailId= '$_POST[email]'"; 	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$_SESSION['fname']=$row['FullName'];
		$_SESSION['Status']=$row['Status'];
	}}
	
	if($_SESSION['Status'] == '2'){
		//echo "<script type='text/javascript'>alert('2'); </script>";
			echo "<script type='text/javascript'>window.location.href= 'driver/index.php' </script>";
	}elseif($_SESSION['Status'] == 1){
		$currentpage=$_SERVER['REQUEST_URI'];
		//echo "<script type='text/javascript'>alert('1'); </script>";
		echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
	}else{

		echo "<script type='text/javascript'>window.location.href= 'admin/index.php' </script>";
	}
	
		
	
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/fav.png">
				<meta name="author" content="colorlib">
		<meta name="description" content="">
		
		<meta name="keywords" content="">
	<meta charset="UTF-8">
		<title>Taxi</title>
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			

			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
		<?php
			include('includes/header.php');
			?>  
		

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-6 col-md-6 ">
							
							<h1 class="text-uppercase">
								Book a cab now				
							</h1>
							<p class="pt-10 pb-10 text-white">
								Whether you enjoy city breaks or extended holidays in the sun, you can always improve your travel experiences by staying in a small.
							</p>
							
						</div>
						<div class="col-lg-4  col-md-5 header-right">
							<h4 class="pb-60">
							</h4>
							<form class="form" method="post">
							    <div class="from-group">
							    	
							    	<input class="form-control txt-field" type="email" name="email" placeholder="Email address*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'">
							    	<input class="form-control txt-field" type="password" name="password" placeholder="Password*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							    </div>								
							    					    
							    <div class="form-group">

							            <button type="submit" name="login" class="btn btn-default btn-lg btn-block text-center text-uppercase">Login</button>
										<p>Don't have an account? <a href="register.php" >Signup Here</a></p>
							    </div>
							</form>
						</div>											
					</div>
				</div>					
			</section>

			<section class="services-area pb-120">
				<div class="container">
					<div class="row section-title">
						<h1>What Services we offer to our clients</h1>
						
					</div>
					<div class="row">
						<div class="col-lg-4 single-service">
							<span class="lnr lnr-car"></span>
							<a href="#"><h4>Taxi Service</h4></a>
							
						</div>
						<div class="col-lg-4 single-service">
							<span class="lnr lnr-briefcase"></span>
							<a href="#"><h4>Office Pick-ups</h4></a>
							
						</div>
																	
					</div>	
				</div>	
			</section>
			
			<section class="image-gallery-area section-gap">
				<div class="container">
					<div class="row section-title">
						<h1>Image Gallery that we like to share</h1>
						
					</div>					
					<div class="row">
						<div class="col-lg-4 single-gallery">
							<a href="img/g1.jpg" class="img-gal"><img class="img-fluid" src="img/micro.png" alt=""></a>
							<a href="img/g4.jpg" class="img-gal"><img class="img-fluid" src="img/mini.png" alt=""></a>
						</div>	
						<div class="col-lg-4 single-gallery">
							<a href="img/g2.jpg" class="img-gal"><img class="img-fluid" src="img/6s.png" alt=""></a>
							<a href="img/g5.jpg" class="img-gal"><img class="img-fluid" src="img/g5.jpg" alt=""></a>						
						</div>	
						<div class="col-lg-4 single-gallery">
							<a href="img/g3.jpg" class="img-gal"><img class="img-fluid" src="img/benz.jpg" alt=""></a>
			<a href="img/g6.jpg" class="img-gal"><img class="img-fluid" src="img/g6.jpg" alt=""></a>
						</div>				
					</div>
				</div>	
			</section>
	</body>
	</html>
