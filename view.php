<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER DETAILS</title>
	
	<style>
		body{
		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(about.jpg);
		height: 90vh;
		background-size: cover;
		
		
	}
		
		
		table {
			margin-left: auto;
			margin-right: auto;
			top: 30%;
		
			color: black;
			font-family: times new roman;
			font-size: 25px;
			text-align: left;


		}
		th {
			background-color: black;
			color: white;
		}
		tr {
			background-color: white;
			text-align: left;
		}
		tr:hover{
		background-color: lightblue;
	}
		
		
	h1{
			color: #fff;
			padding-left: 20px;
			padding-top: 5px;
		}
		
		
		ul{
	float: right;
	list-style-type: none;
	margin-top: -50px;
	}
	ul li a{
	text-decoration: none;
	color: #fff;
	padding: 5px 20px;
	border: 1px solid transparent;
	transition: 0.6s ease;
}
ul li{
	display: inline-block;
	left:10px;
}
ul li a:hover{
	background-color: lightblue;
	color: #000;
	}
	

	</style>
  </head>
   <body>
	<h1>Spark Foundation Bank</h1>
	<div class="class1">
			<ul>
				<li class=""><a href="home.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				
			</ul>
		</div>
		<h1><center>CUSTOMER DETAILS</center></h1>
	<table>
		<tr>
			<th>SL_NO</th>
			<th>NAME</th>
			<th>EMAIL_ID</th>
			<th>CURRENT BALANCE</th>
			
			
	    </tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "db_banksystem");
		

		 $sql = "SELECT * FROM customer";
		 $result = $conn-> query($sql);

		 if ($result-> num_rows > 0) {
		 	while ($row = $result-> fetch_assoc()) {
		 		echo "<tr><td>". $row["SL_NO"] ."</td><td>". $row["NAME"] ."</td><td>". $row["EMAIL_ID"] ."</td><td>". $row["CURRENT BALANCE"] ."</td></tr>";
		 		

		 	}
		 	echo "</table>";
		 }
		 else {
		 	echo "0 result";
		 }
		 $conn-> close();

		 ?>
	</table>

</body>
</html>