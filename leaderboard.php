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
        Leader
        <small>Sort by accuracy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="data.php?id=<?php echo $_GET['id']; ?>">Data <?php echo $_GET['id']; ?></a></li>
        <li class="active">LeaderBoard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leader Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Username</th>
				  <th>Last Submission</th>
                  <th>Score</th>
                  <th style="width: 40px">Version</th>
                </tr>
                <?php
				$id = $_GET['id'];
				$query = mysqli_query($conn, "select score.score, score.version, score.timestamp, users.userName from score
				INNER JOIN users ON score.userId = users.userId WHERE dataId='$id' order by score.score desc");
				$no = 1;
				while ($data = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['userName']; ?></td>
						<td><?php echo $data['timestamp']; ?></td>
						<td><?php echo $data['score']; ?>%</td>
						<td><?php echo $data['version']; ?></td>
					</tr>
				<?php
					$no++;
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
