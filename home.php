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
        <div style="center">
        <table>
             <td><input type="text" placeholder="Search" name="uname"></td>
                    <td>    <button type="submit" name="cart">Search</button></td>
            <td>
                   <img src="adduser.png" alt="Avatar" class="avatar"></td>
                  <td>      <button type="submit" name="cart">Purchace</button></td>
        </table>        
        </div>
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