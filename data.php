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
        Data
        <small>detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data <?php echo $_GET['id']; ?></li>
      </ol>
    </section>
    <?php
      $id = $_GET['id'];
      $qlead = mysqli_query($conn, "select * from score WHERE dataId='$id'");
    ?>
    <?php
      $id = $_GET['id'];
      $query = mysqli_query($conn, "select * from data WHERE dataId='$id'");
      $data = mysqli_fetch_array($query);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <h2><?php echo $data['name'] ?></h2>
          <img src="images/<?php echo $data['image'];?>" width="640px" height="480px"><br><br>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <h3><?php echo mysqli_num_rows($qlead)?></h3>

              <p>Leader Table</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

            <a href="leaderboard.php?id=<?php echo $data['dataId']; ?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>

        </div>
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Download Data</span>
              <span class="info-box-number"><?php echo $data['link']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Task</th>
                  <th>Description</th>
                  <th style="width: 40px">Leader</th>
                </tr>
                <?php
				$id = $_GET['id'];
				$query = mysqli_query($conn, "select * from data WHERE dataId='$id'");
				$data = mysqli_fetch_array($query);
				?>
					<tr>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo nl2br(stripcslashes($data['description'])); ?></td>
						<td><?php echo $data['leaderboard']; ?></td>
					</tr>
              </table>
            </div>

          </div>
          <!-- /.box -->

        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Submission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="upload.php" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="csv" value="">
				  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <p class="help-block">Make sure submission match example</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		</div>
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
<!-- ./wrapper -->
<?php include 'footer.php'; ?>
</body>
</html>
