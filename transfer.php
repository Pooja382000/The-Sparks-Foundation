<?php

         $conn = mysqli_connect("localhost", "root", "", "db_banksystem");
		 

		 $sql = "SELECT * FROM customer";
		 $result = $conn-> query($sql);
		 $row_count=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		
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




		body{
		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(about.jpg);
		height: 90vh;
		background-size: cover;
		
		
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
			<h1><center>CUSTOMER DETAILS</center></h1>
			<h1><center>Click on the Name to Transfer Money</center></h1>
		</div>
	<table>
		
			<th>SL_NO</th>
			<th>NAME</th>
			<th>EMAIL_ID</th>
			<th>CURRENT BALANCE</th>

			
	 <tr>
	 	

	 <?php
	        while($row = $result-> fetch_assoc()){
	      ?>
	      <td><?php echo  $row["SL_NO"];  ?></td>
	      <td> <a href='transact.php?NAME=<?php echo $row["NAME"];?>' style=color:black;text-decoration:none><?= $row["NAME"]?></a></td>
	      <td><?php echo  $row["EMAIL_ID"];  ?></td>
	      <td><?php echo  $row["CURRENT BALANCE"];  ?></td>
	      <tr align="center">
	      <?php }
	      ?>

	      </tr>
	  </table>
	</body>
</html>
