<?php 

	$imgName = $_FILES['simg']['name'];
	$imgTmpName =$_FILES['simg']['tmp_name'];
	$imgSize = $_FILES['simg']['size'];
	$imgError = $_FILES['simg']['error'];
	$imgExt = explode('.', $imgName);

	$actualFileExt = strtolower(end($imgExt));
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 50000) {
				$fileDestination = '../databaseimg/'.$imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
			} else {
				echo "حجم الملف كبير";
			}
		}else{
			echo "خطا برفع املف";
		}
	}else {
			echo "نوع غير معروف";
	}
	


 