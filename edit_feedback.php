<?php
session_start();
if (empty($_SESSION['adminuser']))
	header("Location:index.php");
?> 
<!DOCTYPE html>
<html>
<head>
<title>Admin |Gannon</title>
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="./plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<?php
include ('menu.php');
?>
      <!-- Content Wrapper. Contains page contentww -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Feedback
          </h1>
          <ol class="breadcrumb">
            <!--<li><a href="#"><i class="fa fa-dashboard"></i>Categories</a></li>
            <li><a href="add_comapny.php">Add Categories Posts</a></li>-->
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <!-- left column -->
           
              <!-- general form elements -->
             <div class="box box-primary">
             <div class="box-header with-border">
             <div class="box-header with-border">
<h3 class="box-title"> 
<a onclick="back()"><i class="fa fa-arrow-left"></i><b>Feedback</b></a>
</h3>
                </div><!-- /.box-header -->
                </div><!-- /.box-header -->
                <!-- form start -->
<?php 
if(isset($_SESSION['res3'])){
if($_SESSION['res3']=="success"){
?>
<center>
<span style="color:green; font-size:18px">Feedback Updated Successfully </span>
</center>
<?php
unset($_SESSION['res3']);	
}
else{
	?>
	<center>
	<span style="color:green; font-size:18px">Not Updated Details</span>
	</center>
<?php	
unset($_SESSION['res3']);
}
}
?>

<?php 
if(isset($_SESSION['res4'])){
if($_SESSION['res4']=="success")	{
?>
<center>
<span style="color:green; font-size:18px">Feedback Deleted Successfully </span>
</center>
<?php
unset($_SESSION['res4']);	
}
else{
	?>
	<center>
	<span style="color:green; font-size:18px">Not Deleted Details</span>
	</center>
<?php	
unset($_SESSION['res4']);
}
}
?>				
 <form action="update_controller.php" method="POST" enctype="multipart/form-data">
<div class="box-body">	
<div class="col-md-6">
<?php
include 'dbconnections.php';
$feedback_id=$_REQUEST['feedback_id'];
$query ="select * from gu_feedback where feedback_id=$feedback_id";
$rowCount=mysql_query($query);
 if($rowCount > 0){
while($cat= mysql_fetch_assoc($rowCount)){	 
?>
<input type="hidden" name="feedback_id" value="<?=$cat['feedback_id']?>">

 <div class="form-group">
<label>Feedback </label>
<input type="text" name="feedback"  value="<?=$cat['feedback_title']?>" class="form-control"required />
 </div>		
<div class="box-footer">
<button type="submit" name="action" value="update_feedback" class="btn btn-primary">Update</button>
  </div>
  <?php
}
 }?>
</div> 
</div>
</form>

  </div><!-- /.box body-->
   </div><!--/.col (right) -->
</section><!-- /.content -->
  </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">

</div>
</footer>
    <!-- jQuery 2.1.4 -->
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js" type="text/javascript"></script>
   <!-- Bootstrap WYSIHTML5 -->
   <script src="./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
   <!-- CK Editor -->
   <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
   <script src="./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
   <script src="js/custom.js"></script>
   
  </body>
</html>
 