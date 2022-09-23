<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Coffre fort</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/logo/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/logo/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/logo/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/core.css">

	<link rel="stylesheet" type="text/css" href="assets/css/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	
</head>
<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Chercher un document">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" >
                            <i class="ion-arrow-down-c"></i>
                        </a>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="assets/logo/photo1.jpg" alt="">
						</span>
						<span class="user-name"><?php echo $_SESSION['user']->first_name.' '.$_SESSION['user']->last_name ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="fa fa-question"></i> Guide Utilisateur</a>
						<a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Se deconnecter</a>
					</div>
				</div>
			</div>
		</div>
	</div>