<!doctype html>
      
  <html lang="en-US">
	<head>
		<meta name="viewport" content="width=100vw, height=100vw, initial-scale=1.0">
		<title>Home Page</title>
		<link rel = "stylesheet" href = "styles.css">
		<meta charset="UTF-8">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                <link href='https://fonts.googleapis.com/css?family=ADLaM Display' rel='stylesheet'>
	</head>

	<body>

		<nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
			<div class="container">
			
			<a href="#"class="navbar-brand mb-0 h1">
				<img class="d-inline-block align-top"
                                    src="Logo-vertical.png"
                                    width="220" height="80" />
			</a>
                            
			<button
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNav"
			class="navbar-toggler"
			aria-controls="navbarNav"
			aria-expanded="false"
			aria-label="Toggle navigation">
                            
                            
			<span class="navbar-toggler-icon"></span>
			</button>
                            
			<div class="collapse navbar-collapse justify-content-end"
				id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a href="index.php" class="nav-link active">Home</a>
					</li>
					<li class="nav-item active">
						<a href="join.php" class="nav-link">Join</a>
					</li>
					<li class="nav-item active">
						<a href="login.php" class="nav-link">Login</a>
					</li>

				</ul>
			</div>
                        </div>
		</nav>
	


		<div class="container">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
				<div class="box">
				Welcome to <strong>Just Calories</strong>, your ultimate solution for effortless calorie tracking! Our application is 
				designed with one primary goal in mind: to make calorie counting <u>easier</u> and more convenient for you. <br></br>
				Say goodbye to the hassle of manual calculations and confusing interfaces - Just Calories simplifies the 
				process, allowing you to focus on your health and wellness journey.<br></br>
                                <p><center><a href="join.php" >Join Today!</a></center></p>
				</div>
				<div class="col-2"></div>
			</div>

                <div class="footer">
                        <p>2024 JustCalories, Inc.</p>
                </div>
		

                                
        </body>
		
     <?php

        session_start();   
      ?>



</html>
