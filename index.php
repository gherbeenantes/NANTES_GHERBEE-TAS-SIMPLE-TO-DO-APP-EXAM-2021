<?php include('server.php'); ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Student Record</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Course</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($displaydata)) { ?>
				<tr>
					<td><?php echo $row['stud_id']; ?></td>
					<td><?php echo $row['stud_fname']; ?></td>
					<td><?php echo $row['stud_lname']; ?></td>
					<td><?php echo $row['stud_course']; ?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['stud_id']; ?>">Edit</a>
					</td>
					<td>
						<a href="server.php?del=<?php echo $row['stud_id']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<form  method="POST" action="">
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="fname" value="<?php echo $fname; ?>">
	</div>
	<div class="input-group">
		<label>Last Name</label>
		<input type="text" name="lname" value="<?php echo $lname; ?>">
	</div>
	<div class="input-group">
		<label>Course</label>
		<input type="text" name="course" value="<?php echo $course; ?>">
	</div>
	<div class="input-group">
		<?php if($edit_state == false): ?>
			<button type="submit" name="btnsave" class="btn">Save</button>
		<?php else: ?>
			<button type="submit" name="btnupdate" class="btn">Update</button>
		<?php endif ?>
	</div>
</form>



</body>
</html>