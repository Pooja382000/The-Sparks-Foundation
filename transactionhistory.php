<?php

         $conn = mysqli_connect("localhost", "root", "", "db_banksystem");
		 

		 $sql = "SELECT * FROM transaction";
		 $result = $conn-> query($sql);
		 $row_count=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
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
	h1{
		color: #fff;
			padding-left: 20px;
			padding-top: 5px;
	}
	tr:hover{
		background-color: lightblue;
	}
	</style>
</head>
<body>
	<h1>Sparks Foundation Bank</h1>
	<div class="class1">
			<ul>
				<li class=""><a href="home.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				
			</ul>
		</div>
		
		
		<div>
			<h1><center>TRANSACTION HISTORY</center></h1>
	
		</div>
	<table>
		
			<th>SENDER</th>
			<th>RECIEVER</th>
			<th>AMOUNT</th>
			<th>DATE AND TIME</th>
			
			
	 <tr>
	 	

	 <?php
	        while($row = $result-> fetch_assoc()){
	      ?>
	      <td><?php echo  $row["SENDER"];  ?></td>
	      <td><?php echo  $row["RECIEVER"];  ?></td>
	      <td><?php echo  $row["AMOUNT"];  ?></td>
	      <td><?php echo  $row["DATE AND TIME"];  ?></td>
	      <tr align="center">
	      <?php }
	      ?>

	      </tr>
	  </table>
       </body>
</html>
