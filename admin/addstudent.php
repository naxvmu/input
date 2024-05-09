<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">اضافه تفاصيل الطالب</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      رقم الطالب.:<input type="text" class="form-control" name="roll" placeholder="ادخل رقم الطالب" >
				  </div>
				  <div class="form-group">
				    
				    الاسم الكامل<input type="text" class="form-control" name="fullname" placeholder="الاسم بالكامل" required>
				  </div>
				  <div class="form-group">
				      المدينه: <input type="text" class="form-control" name="city" placeholder="ادخل المدينه" required>
				  </div>
				  <div class="form-group">
				    
				    رقم الوالد.:<input type="text" class="form-control" name="pphone" placeholder="رقم الوالد" required>
				  </div>
				  <div class="form-group">
				    
				    المستوى:<input type="number" class="form-control" name="standard" placeholder="المستوى" required>
				  </div>

				   <div class="form-group">
				    
				   الصوره:<input type="file" class="form-control" name="simg" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-info btn-lg">اضافه</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['roll']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$roll=$_POST['roll'];
			$name=$_POST['fullname'];
			$city=$_POST['city'];
			$pphone=$_POST['pphone'];
			$standard=$_POST['standard'];
			include('ImageUpload.php');

			$sql = "INSERT INTO `student`( `rollno`, `name`, `city`, `pcontact`, `standard`,`image`) VALUES ('$roll','$name','$city','$pphone',$standard,'$imgName')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("تمت الاضافه بنجاح");
				</script>
				<?php
			} else {
				echo "خطا : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("الرجاء ادخل الرقم و الاسم");
				</script>
				<?php
		}


	}

 ?>








