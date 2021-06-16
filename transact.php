<?php

         $conn = mysqli_connect("localhost", "root", "", "db_banksystem");
         if(isset($_GET['NAME'])){
         	$Name=$_GET['NAME'];
         }
                    
         
         if(isset($_POST['submit']))
         {
         	
         	$to = $_POST['user'];
         	$amount = $_POST['amount'];
         	$from = $_GET['NAME'];

         	$sql = "SELECT * FROM customer WHERE NAME='$from'";
         	$query = mysqli_query($conn,$sql);
         	$sql1 = mysqli_fetch_array($query);

         	$sql = "SELECT * from customer where NAME='$to'";
         	$query = mysqli_query($conn,$sql);
         	$sql2 = mysqli_fetch_array($query);


         	if(($amount) <= 0)
         	{
         		echo '<script type="text/javascript">';
         		echo 'alert("oops! Negative values and zero cannot be transformed")';
         		echo '</script>';
         	}


         	else if($amount > $sql1['CURRENT BALANCE'])
         	{
         		echo '<script type="text/javascript">';
         		echo 'alert("Bad luck! insufficiant balance")';
         		echo '</script>';
         	}

         	

         	else{
         		
         		
         		        		
                
         		$newbalance = $sql1['CURRENT BALANCE']-$amount;
         		$sql= "UPDATE customer SET CURRENT BALANCE = $newbalance  WHERE NAME ='$from'";
         		mysqli_query($conn,$sql);

         		$newbalance = $sql2['CURRENT BALANCE']+$amount;
         		$sql= "UPDATE customer SET 'CURRENT BALANCE' = $newbalance WHERE NAME ='$to'";
         		mysqli_query($conn,$sql);

         		
         		$sql = "INSERT INTO transaction(SENDER,RECIEVER,AMOUNT) VALUES ('$from', '$to', '$amount')";
         		$query=mysqli_query($conn,$sql);


         		if($query){
         			echo "<script> alert('Transaction Successful');
                                window.location='transactionhistory.php';
                        </script>";

         		}
            }
         }
        

         
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
	margin-top: -35px;
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
		</div>
		<div>
			<table>
		
			<th>SL_NO</th>
			<th>NAME</th>
			<th>EMAIL_ID</th>
			<th>CURRENT BALANCE</th>
			
	 <tr>
	 	
	 	

	 	 <?php
	 	             $q="SELECT * from customer WHERE NAME='$Name'";
					$result=mysqli_query($conn,$q);
	 	            
	                $row = mysqli_fetch_array($result)
	      ?>
	      <td><?php echo  $row["SL_NO"];  ?></td>
	       <td><?php echo  $row["NAME"];  ?></td>
	       <td><?php echo  $row["EMAIL_ID"];  ?></td>
	        <td><?php echo  $row["CURRENT BALANCE"];  ?></td>
	      

	 </tr>
	  </table>
	</div>
	<form method='post' action=''>
		<br><br>
		<table border="0.5px"  style="background-color: black; color: grey;">
			<tr>
				<td>Transfer To:</td>
				<input type="text" name="to" value="<?php echo $row['NAME']; ?>"hidden>
				<td><select name="user">
					<option>SELECT</option>
					<?php
					$sql="select * from customer";
					$result=mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['NAME']; ?>"> <?php echo $row["NAME"]; ?></option>
					<?php }
					?>
				</select></td></tr>
				<tr><td>Amount:</td><td><input type="text" name="amount"></td></tr>
				<tr><td></td><td><input type="submit" class="button1" name="submit" value="submit"></td></tr>
					
				

			
		</table>
	</form>
	<br>
	<br>
	

</body>
</html>

