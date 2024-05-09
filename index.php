
<?php
//include header  of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                مرحــــــباً بكم في نظام معلومات الطلاب
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">تسجيل دخول المشرف</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>معلومات الطلاب</h2>
                            <form action="index.php" method="post">
                <input type="text" name="roll" placeholder="ادخل رقم الطالب" style="width: 240px;height: 35px;"><span><span>
                 <select name="standard" class="btn btn-info" >
                             <option>اختيار المستوى</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
								</select>
                  <input type="submit" name="show" value="عرض السجلات" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center" >
    <tr  dir="rtl">
        <th class="text-center">الرقم</th>
        <th class="text-center">المستوى</th>
        <th class="text-center">الاسم الكامل</th>
        <th class="text-center">المدينه</th>
        <th class="text-center">رقم الوالد.</th>
        <th class="text-center">الصوره</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $Standard = $_POST['standard'];
        $RollNo = $_POST['roll'];

        $sql = "SELECT * FROM `student` WHERE `standard` = '$Standard' OR `rollno`='$RollNo'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $RollNo = $DataRows['rollno'];
                $Name = $DataRows['name'];
                $City = $DataRows['city'];
                $Pcontact = $DataRows['pcontact'];
                $Standard = $DataRows['standard'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td><?php echo $RollNo;?></td>
                    <td><?php echo $Standard;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $City; ?></td>
                    <td><?php echo $Pcontact; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>لاتوجد سجلات</td></tr>";
        }
    }

 ?>
    


<!--include header  of html-->
<?php include('footer.php') ?>

