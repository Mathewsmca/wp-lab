<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>
<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,FullName,Status FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->FullName;
$_SESSION['status']=$results->EmailId;
 echo "<script type='text/javascript'> alert($_SESSION[fname]); </script>";
    if($_SESSION['status'] == '1'){
    $currentpage=$_SERVER['REQUEST_URI'];
    echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    }else{
		
        echo "<script type='text/javascript'> document.location = 'driver/'; </script>";   
    }
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
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
			
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Sing In		
							</h1>	
							
                        </div>	
					</div>
				</div>
			</section>
			
			<section class="contact-page-area section-gap">
			<form  method="post" >
				<div class="container">
					<div class="row">
						
						<div class="col-lg-6 d-flex flex-column address-wrap">
                      		
                                    <input name="email" id="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
																		
						</div>
						<div class="col-lg-6">
							
								<div class="row">	
									<div class="col-lg-12 form-group">
									
                                        <input name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="common-input mb-20 form-control" required="" type="Password">
                                     
                                    </div>
									
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary"  type="submit" name="login" id="submit"style="float: right;">Sign In</button>											
                                        <p>Don't have an account? <a href="register.php" >Signup Here</a></p>
                                    </div>
								</div>
							
						</div>
					</div>
				</div>	
				</form>
			</section>
			
		</body>
	</html>
