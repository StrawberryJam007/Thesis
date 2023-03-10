<?php
include 'connect.php';


if(isset($_POST['submit'])) {
    
    $mconcepcionId  = $_POST['mconcepcionId'];
    $patientCode = $_POST['patientCode'];
    $patientName = $_POST['patientName'];
    $sched = $_POST['sched'];
    $mnd = $_POST['mnd'];
    $bp = $_POST['bp'];
    $weight = $_POST['weight'];
    $sot = $_POST['sot'];
    $remarks = $_POST['remarks'];


$sql= "INSERT INTO maternalconcepcion(patientCode,patientName,sched,mnd,bp,weight,sot,remarks) VALUES ('$patientCode','$patientName','$sched','$mnd','$bp','$weight',$sot,'$remarks')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "";
}else{
    die(mysqli_error($conn));
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternity-Record-Management-System</title>
    <!-- Tab Logo -->
    <link rel="icon" type="image/x-icon" href="../asset/img/Logo2.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
        td p {
            margin: 2px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light elevation-1" style="background-color: rgb(60, 179, 113);">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <img src="../asset/img/avatar.png" class="img-circle elevation-2" alt="User Image" width="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="../index.html">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-2" style="background-color: rgb(32, 116, 70);">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link animated swing">
                <img src="../asset/img/Logo2.png" alt="Logo" width="200">
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="maternal.php" class="nav-link">
                                <i class="nav-icon fa fa-child"></i>
                                <p>
                                    Maternal Records
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="child.html" class="nav-link">
                                <i class="nav-icon fa fa-baby"></i>
                                <p>
                                    Child Records
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="child.html" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Family Planing
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><span class="fa fa-child"></span> Camp One Maternal Records</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Maternal</li>
                            </ol>

                        </div>
                        <a class="btn btn-sm elevation-2" href="#" data-toggle="modal" data-target="#add" style="margin-top: 20px;margin-left: 10px;background-color: rgb(60, 179, 113);"><i class="fa fa-plus"></i> Add New</a>
                        <!-- dropdown menu -->
                        <div class="dropdown show elevation-2" style="margin-top: 20px;margin-left: 10px;background-color: rgb(60, 179, 113);">
                            <a class="btn btn-Info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Barangays
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Concepcion</a>
                                <a class="dropdown-item" href="#">Camp One</a>
                                <a class="dropdown-item" href="#">Tabtabungao</a>
                                <a class="dropdown-item" href="#">Tay-ac</a>
                                <a class="dropdown-item" href="#">Alipang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    
                    <div class="card card-info elevation-2">
                        <br>
                        <!-- table -->
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <!-- maternal info column -->
                                    <tr>
                                        <th></th>
                                        <th>Patient Code</th>
                                        <th>Patient Info</th>
                                        <th>Midwife/Nurse/Doctor</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                               
                               $sql="Select * from maternalconcepcion";
                               $result=mysqli_query($conn,$sql);
                               if($result){
                              while($row=mysqli_fetch_assoc($result)){
                                $mconcepcionId  = $row['mconcepcionId'];
                                $patientCode = $row['patientCode'];
                                $patientName = $row['patientName'];
                                $sched = $row['sched'];
                                $mnd = $row['mnd'];
                                $bp = $row['bp'];
                                $weight = $row['weight'];
                                $sot = $row['sot'];
                                $remarks = $row['remarks'];
                                echo '
                                <tr>
                                <td>'.$mconcepcionId .'</td>
                                <td>'.$patientCode.'</td>
                                <td>
                                   
                                   <p class="info">Patient Name: <b>'.$patientName.'</b></p>
                                   <p class="info"><small>Schedule: <b>'.$sched.'</b></small></p>
                                   <p class="info"><small>Blood Pressure: <b>'.$bp.'</b></small></p>
                                   <p class="info"><small>Weight: <b>'.$weight.'</b></small></p>
                                   <p class="info"><small>Size of tummy: <b>'.$sot.'</b></small></p>
                                  
                               </td>
                           <!-- mid wife/nurse/dr column -->
                           <td>'.$mnd.'</td>
    
                            <!-- remakrs column -->
                            <td>'.$remarks.'</td>
                            <!-- action column -->
                                <td class="text-right">
                                 <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#edit"><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-sm btn-danger" href="delete.php?deleteId='.$mconcepcionId.'"><i class="fa fa-trash"></i></a>
                                    </td>
                                
                                    </tr>
                                ';
                              }
                              
                               }
                               ?>
                                   
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- modal delete -->
    
    <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="../asset/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Maternal Record?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- mainn modal edit of maternal -->
  
   
    <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
    
    
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
         <div class="modal-content">
             <div class="modal-body text-center">
                 <form action="update_query.php" method="POST">
                     
                     <div class="card-body">
                        
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="card-header">
                                     <span class="fa fa-child"> Maternal Information</span>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="patientCode">Patient Code</label>
                                             <input type="text" class="form-control" placeholder="PTC-111">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Patient Name</label>
                                             <input type="text" name="patientName" class="form-control" placeholder="Name">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Maternal Schedule</label>
                                             <input type="date" name="maternalSched" class="form-control" placeholder="Sched">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Midwife/Nurse/Doctor</label>
                                             <input type="text" name="mnd" class="form-control" placeholder="Name">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Blood Pressure</label>
                                             <div class="input-group my-colorpicker2">
                                                 <input type="text" name="bp" class="form-control" placeholder="120/80">
                                                 <div class="input-group-append">
                                                     <span class="input-group-text">mmHg</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Weight</label>
                                             <div class="input-group my-colorpicker2">
                                                 <input type="text" name="weight" class="form-control" placeholder="KG">
                                                 <div class="input-group-append">
                                                     <span class="input-group-text">kg</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Size of Tummy</label>
                                             <input type="number" name="sot" class="form-control" placeholder="tummy size">
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Remarks</label>
                                             <input type="text" name="remarks" class="form-control" placeholder="remarks">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                                
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                         <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                         <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                     </div>
                 </form>
                 
             </div>
         </div>
     </div>
       
    </div>
        <!-- add modal -->
       
    <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <span class="fa fa-child"> Maternal Information</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Patient Code</label>
                                                <input type="text" name="patientCode" class="form-control" placeholder="PNT-123" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Patient Name</label>
                                                <input type="text" name="patientName" class="form-control" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Maternal Schedule</label>
                                                <input type="date" name="sched" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Midwife/Nurse/Doctor</label>
                                                <input type="text" name="mnd" class="form-control" placeholder="Midwife/Nurse/Doctor" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Blood Pressure</label>
                                                <div class="input-group my-colorpicker2">
                                                    <input type="text" name="bp" class="form-control" placeholder="120/80" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <div class="input-group my-colorpicker2">
                                                    <input type="text" name="weight" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sise of Tummy</label>
                                                <input type="number" name="sot" class="form-control" placeholder="Size of Tummy" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Remarks</label>
                                                <input type="text" name="remarks" class="form-control" placeholder="Remarks" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
</body>

</html>