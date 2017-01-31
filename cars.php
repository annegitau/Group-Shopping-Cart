<?php
error_reporting(0);
include("options.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cars Classified</title>    
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href='cars.css' rel='stylesheet' />
</head>
<body>
<?php
	$sql = "SELECT * FROM ".$SETTINGS["CARS"]."";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);

?>
    <div class="jumbotron text-center">            
            <h1>Cars Classified </h1>
            <p>Online Shop!</p>
        </div>
    <div class="container-fluid">
            <ul class="nav navbar-nav">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
            <div id="id01" class="modal">
                <form class="modal-content animate" action="action_page.php">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="user.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                        <br>
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <br>
                        <input type="checkbox" checked="checked"> Remember me
                        <br>
                        <button type="submit" name="login_btn">Login</button>   
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button><br>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </form>
            </div>
            <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button>
            <div id="id02" class="modal">
                <form class="modal-content animate" action="action_page.php">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><img src="adduser.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        <label><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="uname" required>
                        <br>
                        <label><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="uname" required>
                        <br>
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Set Username" name="uname" required>
                        <br>
                        <label><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="uname" required>
                        <br>
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <br>
                        <label><b>Confirm Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <br>
                        <button type="submit" name="register_btn">Sign Up</button>
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
    </ul>
    </div>
<div class="container">
	<?php while ($row = mysql_fetch_assoc($sql_result)) { ?>
    <div class="card-container">
        <div class="card">
            <div class="front">
                <div class="cover">
					<img src="images/<?php echo $row['photo'] ?>">
				</div>
				<div class="content">
                    <div class="main">
                        <h3 class="name"><?php echo $row['title'] ?></h3>
                       
                        <div class="first float_left">
                        	<span class="icon_mileage"></span><?php echo $row['mileage'] ?>&nbsp;km
                        </div>
                        <div class="first">
                        	<span class="icon_power"></span><?php echo $row['top_speed'] ?>&nbsp;km/h
                        </div>
                        <div class="second float_left">
                        	<span class="icon_fuel"></span><?php echo $row['fuel'] ?>
                        </div>
                        
                        <div class="second">
                        	<span class="icon_gearbox"></span><?php echo $row['gearbox'] ?>
                        </div>
                    </div>
                    <div class="price">
                    	&euro;<?php echo $row['price'] ?>
                    </div> 
                </div>
            </div> <!-- end front panel -->
            <div class="back">
                <p>
                	<label class="title">Type</label>
                	<span class="value"><?php echo $row['car_type'] == 'new' ? 'New car' : 'Used car'?></span>
                </p>
                <p>
                	<label class="title">Make</label>
                	<span class="value"><?php echo stripcslashes($row['make']) ?></span>
                </p>
                <p>
                	<label class="title">Model</label>
                	<span class="value"><?php echo stripcslashes($row['model']) ?></span>
                </p>
                 <p>
                	<label class="title">Year</label>
                	<span class="value"><?php echo stripcslashes($row['year']) ?></span>
                </p>
                <p>
                	<label class="title">Mileage</label>
                	<span class="value"><?php echo stripcslashes($row['mileage']) ?></span>
                </p>
                <p>
                	<label class="title">Color</label>
                	<span class="value"><?php echo stripcslashes($row['color']) ?></span>
                </p>
                <p>
                	<label class="title">Fuel</label>
                	<span class="value"><?php echo stripcslashes($row['fuel']) ?></span>
                </p>
                <p>
                	<label class="title">Gearbox</label>
                	<span class="value"><?php echo stripcslashes($row['gearbox']) ?></span>
                </p>
                <p>
                	<label class="title">Number of seats</label>
                	<span class="value"><?php echo stripcslashes($row['number_of_seats']) ?></span>
                </p>
                <p>
                	<label class="title">Vehicle Type</label>
                	<span class="value"><?php echo stripcslashes($row['vehicle']) ?></span>
                </p>
                <button> Add to Cart</button>                
                
            </div> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
    <?php } ?>
</div>
    	
    <script src="js/jquery.js"></script>   
        <script src="js/bootstrap.min.js"></script>
</body>
</html>