<!<!doctype html>
<html>
    <head>
        
    <meta charset="UTF-8"><!-- comment -->
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=ADLaM Display' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    
    </head>
    
    
    <body>
        
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
			<div class="container">
			
			<a href="#"
                            class="navbar-brand mb-0 h1">
				<img
					class="d-inline-block align-top"
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
                            
			<div
				class="collapse navbar-collapse justify-content-end"
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
        
        
    
        <?php
        //Error messeges
        if ($error_message!=""){
            echo "<h3>ERROR: ".$error_message;
            echo "<h3><br>";
        }
        if ($message!=""){
            echo "<h4> $message";
            echo "<h4><br>";
        } ?>
        
        
        <div class="container">

        <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                <div class="login">
          
        <h1>Welcome</h1>
        
        <form action="login.php" method="post">
             
          <div class="mb-3 mt-3">  
            <label>Email address:</label>
            <input type="text" name="email_address" class="form-control"/>
          </div>
            
          <div class="mb-3">  
            <label>Password:</label>
            <input type="password" name="password" class="form-control"/>
          </div>  
            
            
            <label>&nbsp;</label>
            <input type="submit" value="Login" class="form-control"/>
            
        </form>
                    
               <div class="col-2"></div>
                </div>    
            </div> 
        </div>      
            
         
        <div class="footer">
                <p>2024 JustCalories, Inc.</p>
            </div>    
            
                    
    </body>
    
    
    
</html>
