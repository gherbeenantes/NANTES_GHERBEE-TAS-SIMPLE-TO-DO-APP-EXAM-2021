<?php

	$conn = mysqli_connect("localhost","root","","db_student_record");
	$displaydata = mysqli_query($conn,"SELECT * FROM student_info");	
	$chkdup = "SELECT * FROM student_info";
	$edit_state = false;
	$fname = "";
	$lname = "";
	$course = "";
	$id = 0;
if (isset($_POST['btnsave'])){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$course=$_POST['course'];


		if ($fname=="" || $lname=="" || $course=="")
		{
				echo "<script>alert('Invalid Input!');
				location.href='index.php';
				</script>";
		}
		else
		{	
			$dbexecute = mysqli_query($conn,$chkdup);
			$result = mysqli_fetch_array($dbexecute);
			if ($result[1]==$fname && $result[2]==$lname){
				echo "<script>alert('Duplicate information!');
				location.href='index.php';
				</script>";
			}
			else{
				$cmd = "INSERT INTO student_info (stud_fname,stud_lname,stud_course) VALUES ('$fname','$lname','$course')";
				$query = mysqli_query($conn,$cmd);
				echo "<script>alert('Information saved!');
				location.href='index.php';
				</script>";
			}

		}
}	
if (isset($_POST['btnupdate'])){

	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$course = ($_POST['course']);
	$id = ($_POST['id']);

	$dbexecute = mysqli_query($conn,$chkdup);
	$result = mysqli_fetch_array($dbexecute);
	if ($result[1]==$fname && $result[2]==$lname){
		echo "<script>alert('Duplicate information!');
		location.href='index.php';
		</script>";
	}else{
		mysqli_query($conn, "UPDATE student_info SET stud_fname='$fname', stud_lname='$lname', stud_course='$course' WHERE stud_id=$id");
		echo "<script>alert('Information updated!');
	 	location.href='index.php';
	 	</script>";	
	}
}
if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$edit_state = true;

	$getrec = mysqli_query($conn, "SELECT * FROM student_info WHERE stud_id=$id");
	$record = mysqli_fetch_array($getrec);
	$fname = $record['stud_fname'];
	$lname = $record['stud_lname'];
	$course = $record['stud_course'];
	$id = $record['stud_id'];
}	

if (isset($_GET['del'])){
	$id = $_GET['del'];
	$edit_state = true;
	
	mysqli_query($conn, "DELETE FROM student_info WHERE stud_id=$id");
	echo "<script>alert('Information deleted!');
	location.href='index.php';
	</script>";	
}
?>