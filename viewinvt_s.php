<?php
session_start();
include_once 'database.php';
if (isset($_SESSION['user'])) {
$user=$_SESSION['user'];
$result = mysqli_query($conn,"SELECT * FROM supplier where email='$user'");
 $row = mysqli_fetch_assoc($result);
 $user_status=$row['status'];
 $token=$row['token']; 
 echo "$user";
  $user_type=$row['type'];
 if($user_type!='Official' && $user_status=='Active')
 {
$result3 = mysqli_query($conn,"SELECT * FROM inventory where email='$user'");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   National Jute Board
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="sassets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="sassets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="sassets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
     
         <?php 
      if($user_type=='Official')
      {
     include('offsidebar.php');
   }else
   {
    include('supsidebar.php');
   }

      ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <?php include('action.php');?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Inventory</h4>
                 <p class="card-category">24 Hours Record</p>
              </div>
              <div class="card-body " style="overflow: scroll;">
                <div class="table-responsive">
                  <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class=" text-primary">
                     <tr> 
                      <th>Supplier Name</th>
                      <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>Qty</th> 
                      <th>Germination</th> 
                      <th>Purity</th> 
                      <th>Lot No</th> 
                      <th>Seed Inspection Officer</th>
                      <th>Bag No</th>
                      <th>Upload Certificate</th>
                      <th>Upload Seed Analysis Report</th>  
                    </tr> 
                  </thead> 
                  <tbody> 
                   <?php 

                   
                    if ($result3->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result3->fetch_assoc()) {

                    

                      echo" <tr>"; 
                      echo"<td>".$row1['supplier']."</td>";
                       echo"<td>".$row1['seedtype']."</td>"; 
                       echo"<td>".$row1['seed']."</td>"; 
                       echo"<td>".$row1['qty']."</td>"; 
                       echo"<td>".$row1['germination']."</td>"; 
                       echo"<td>".$row1['purity']."</td>"; 
                       echo"<td>".$row1['lot']."</td>"; 
                       echo"<td>".$row1['insofficer']."</td>";
                       echo"<td>".$row1['bag']."</td>";
                      ?>
                       <td><a href="uploads/<?php echo($row1['certificate']); ?>" target="_blank" >View Certificate </a></td>
                        <td><a href="uploads/<?php echo($row1['analysis']); ?>" target="_blank" >View Analysis Report </a></td>
                       <?php
                     
                       
                         echo" </tr>"; }
                        }
                        ?>
                             </tbody> 
                  <tfoot> 
                    <tr>
                   <th>Supplier Name</th>
                      <th>Seed Type</th> 
                      <th>Seed Name</th> 
                      <th>Qty</th> 
                      <th>Germination</th> 
                      <th>Purity</th> 
                      <th>Lot No</th> 
                      <th>Seed Inspection Officer</th>
                      <th>Bag No</th>
                      <th>Upload Certificate</th>
                      <th>Upload Seed Analysis Report</th>  
                    </tr> 
                  </tfoot> 
                  </table>
                </div>
              </div>
            </div>
          </div>
          
     <?php include('footer.php'); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="sassets/js/core/jquery.min.js"></script>
  <script src="sassets/js/core/popper.min.js"></script>
  <script src="sassets/js/core/bootstrap.min.js"></script>
  <script src="sassets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="sassets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="sassets/js/plugins/bootstrap-notify.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#example').DataTable();
    });
  </script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="sassets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="sassets/demo/demo.js"></script>
</body>

</html>
<?php 
}
}
else{
  header("location: ./login.php");
}?>