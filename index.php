<?php
include('connect.php');
include('cek-login.php');
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
  include 'navbar.php';
  include 'sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome
        <small>data collection</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
		<?php
			if (!empty($_GET['message']) && $_GET['message'] == 'update') {
				echo '<div class="alert alert-success">' ;
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo '<h4>Success Make Submission</h4>';
				echo '</div>';
			}
        ?>

          <!-- /.box -->
		</div>
		<?php
			$query = mysqli_query($conn, "select * from data");

			$no = 1;
			while ($data = mysqli_fetch_array($query)) {
			?>
				<div class="col-md-4">
				  <div class="box box-primary box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title"><?php echo $no; ?></h3>


					  <!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <?php echo $data['name']; ?>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					  <a href="data.php?id=<?php echo $data['dataId']; ?>" class="btn btn-sm btn-primary btn-flat pull-left">Join</a>
					  <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Leader: <?php echo $data['leaderboard']; ?></a>
					</div>
				  </div>
				  <!-- /.box -->
				</div>
			<?php
				$no++;
			}
		?>

	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
