<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>Lista de alumnos</h1>
	<table class="table table-responsive table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Paterno</th>
			<th>Materno</th>
			<th>CI</th>
			<th>Sexo</th>
			<th>Facultad</th>
			<th>Carrera</th>
			<th>Reg. Universitario</th>
		</tr>
	</thead>
	<?php
	$mysqli = new mysqli("localhost", "root", "cechus", "alumno");

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$query = "SELECT * FROM alumno ";
	if ($mysqli->multi_query($query)) {
	    do {
	        if ($result = $mysqli->store_result()) {
	            while ($row = $result->fetch_row()) {
	            	echo "<tr>";
	                echo "<td>$row[0]</td>";
	                echo "<td>$row[1]</td>";
	                echo "<td>$row[2]</td>";
	                echo "<td>$row[3]</td>";
	                echo "<td>$row[4]</td>";
	                echo "<td>$row[5]</td>";
	                echo "<td>$row[6]</td>";
	                echo "<td>$row[7]</td>";
	            	echo "</tr>";
	            }
	            $result->free();
	        }
	        if ($mysqli->more_results()) {
	            printf("-----------------\n");
	        }
	    } while ($mysqli->next_result());
	}

	$mysqli->close();
	 ?>
	</table>
</div>
</body>
</html>
