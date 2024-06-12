<?php 
session_start();
  include "../../lib/koneksi.php";
  $session_admin = $_SESSION['admin']; 
  if(isset($_SESSION['admin']))
  {
    include "../template/header.php";
?>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
          <li class="breadcrumb-item active">Santri</li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Data Santri</div>
                  <div class="card-body">
                    <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0">
                      <a href="insert_Santri.php" class="btn btn-primary">
                        <i class="fa fa-plus-circle"> Tambah Santri</i>
                      </a>
                    </div>
                    <table class="table table-responsive-sm table-striped" style="margin-top: 20px">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Asal Sekolah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                          $tampilSantri = mysqli_query($mysqli, "SELECT No_Pendaftaran,Nama,Asal_Sekolah FROM santri");
                          while($Santri = mysqli_fetch_array($tampilSantri))
                          {
                        ?>
                        <tr>
                          <td><?php echo $Santri['No_Pendaftaran']; ?></td>
                          <td><?php echo $Santri['Nama']; ?></td>
                          <td><?php echo $Santri['Asal_Sekolah']; ?></td>
                          <td>
                            <a href="detail_Santri.php?No_Pendaftaran=<?php echo $Santri['No_Pendaftaran']; ?>">
                              <button class="btn btn-primary" type="button">
                                <i class="fa fa-file-text"></i>
                              </button>
                            </a>
                            <a href="edit_Santri.php?No_Pendaftaran=<?php echo $Santri['No_Pendaftaran']; ?>">
                              <button class="btn btn-success" type="button">
                                <i class="fa fa-pencil"></i>
                              </button>
                            </a>
                            <a href="delete_Santri.php?No_Pendaftaran=<?php echo $Santri['No_Pendaftaran']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        <?php  
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>
<?php
    include "../template/footer.php";
  }
  else
  {
    header("location: ../login/");
  } 
?>