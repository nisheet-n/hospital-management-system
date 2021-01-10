<?php
	session_start();
	$servername ="localhost";
	$username = "root";
	$password = "";
	$dbname = "hospital";
	$link = mysqli_connect($servername, $username, $password, $dbname);
	$con = mysqli_select_db($link, $dbname);
?>


<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../style.css">
		<link rel="shortcut icon" href="../icon.jpg" type="image/gif">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
			crossorigin="anonymous">

		<title>Discharge Patient- Tide Hospitals</title>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="../index.html">HOME</a>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<!-- <li class="nav-item">
									<a class="nav-link" href="#services">Services</a>
								</li> -->
						<li class="nav-item">
							<a class="nav-link" href="../login.html">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="./discharge.html">
								<strong> Discharge Patient</strong>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
								<strong>TIDE HOSPITALS</strong>
							</a>
						</li>
					</ul>
					<!-- <form class="d-flex">
								<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-success" type="submit">Search</button>
							</form> -->
				</div>
			</div>
		</nav>
		<!-- Navbar Ends -->

		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
			crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
			integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
			crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
			integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
			crossorigin="anonymous"></script> -->

	</body>
</html>

<?php
	if($con)
	{
		if(isset($_POST['submit']))
		{
			$id=$_POST['p_id'];
			$name=$_POST['p_name'];
			$email=$_POST['p_email'];

			$pat_list=mysqli_query($link, "select * from patient where PAT_ID=$id and EMAIL='$email'");

			echo"	
			<style>
				table,
				th,
				td 
				{
					padding: 10px;
					border: 2px solid black;
					border-collapse: collapse;
					text-align: center;
				}
				table
				{
					margin-left: 5%;
				}
				.center 
				{
					margin-left: auto;
					margin-right: auto;
					margin-top: auto;
					margin-bottom: auto;
				}
			</style>";

			echo"
			<h1 class='text-center' style='margin-top: 10vh'>
				<br>
				PATIENT DISCHARGED 
				<br>
				<i class='fas fa-clinic-medical' style='color:red'></i>
			</h1>
			<br>
			";

			echo"<table class='center'>
			<tr >
				<th >PATIENT ID</th>
				<th >PATIENT NAME</th>
				<th >PROBLEM/DISEASE</th>
				<th >EMAIL</th>
				<th >NUMBER</th>
				<th >ADDRESS</th>
			</tr>";

			while($row=mysqli_fetch_array($pat_list))
			{
				echo"<tr>";
				echo"<td>" . $row['PAT_ID'] . "</td>";
				echo"<td>" . $row['PAT_NAME'] . "</td>";
				echo"<td>" . $row['PROBLEM'] . "</td>";
				echo"<td>" . $row['EMAIL'] . "</td>";
				echo"<td>" . $row['NUMBER'] . "</td>";
				echo"<td>" . $row['ADDRESS'] . "</td>";
				echo"</tr>";
			}
			echo"</table>";

			$del_pat = mysqli_query($link, "DELETE FROM patient WHERE PAT_ID=$id");
		}
		mysqli_close($link);

		echo"
		<br><br>
		<p style='font-size: large; text-align: center;'>
			Thank You!
			<br>
			We wish for your speedy recovery and good health.
			<br>
			Stay safe!
			<br>
			<i class='fas fa-heart' style='font-size:250%;color:red'></i>
		</p>
		";
	}
	else
	{
		die("Connection Failed".mysqli_connect_error());
	}
?>