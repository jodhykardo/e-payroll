<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Halaman Administrator</title>

<?php
//Memanggil function_html.php, file CSS dan library jQuery
   require_once ROOT."/application/functions/function_html.php";
   
   load_css('bootstrap/css/bootstrap.min.css');
   load_css('bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
   load_css('dataTables/css/dataTables.bootstrap.min.css');
   load_css('css/admin2.css');
   //load_css('jquery-ui-1.7.2/themes/base/jquery-ui.css');
   
   load_script('jquery/jquery-2.0.2.min.js');

$nama = $_SESSION['nama'];
	
?>   
   
</head>
<body>

<!-- Menu bar -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><font color="#FFF">Selamat Datang Di Sistem Informasi Payroll Dan Cloud Storage</font></a>
            <ul class="user-menu">
               <li class="dropdown pull-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-user"></i> 
                     <?php echo "$nama" ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
<?php
//Membuat menu user
   if($_SESSION['level']=="Super_Admin"){
	create_menu("admin/profil", "file", "Profil");
   create_menu("admin/user", "cog", "User");
   create_menu("admin/logout", "off", "Logout");   
   }else{
   create_menu("admin/profil", "file", "Profil");
   create_menu("admin/logout", "off", "Logout");}
?>
                  </ul>
               </li>
            </ul>
         </div>
                     
      </div>
   </nav>
<!-- /Menu bar-->
      
<!-- Sidebar -->
   <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <ul class="nav menu">
<?php
//Membuat menu pada sidebar
   if($_SESSION['level']=="Super_Admin"){
   create_menu("admin", "dashboard", "Dashboard");
   create_menu("admin/perusahaan", "briefcase", "Perusahaan");
   create_menu("admin/merk", "cd", "Merk");
   create_menu("admin/karyawan", "user", "Karyawan");
   create_menu("admin/pinjaman", "euro", "Pinjaman Karyawan");
   create_menu("admin/penjualan", "usd", "Penjualan");
   create_menu("admin/komponen", "superscript", "Komponen Gaji");
   create_menu("admin/laporangaji", "equalizer", "Laporan Gaji");
   create_menu("admin/laporanabsen", "stats", "Laporan Absensi");
   create_menu("admin/tidakhadir", "ok", "Input Ketidakhadiran");
   create_menu("admin/absen","list-alt", "Rekap Absen");
   create_menu("admin/tanggal", "calendar", "Input Tanggal Merah");
   }else{
   create_menu("admin", "dashboard", "Dashboard");
   //create_menu("admin/perusahaan", "briefcase", "Perusahaan");
   //create_menu("admin/merk", "cd", "Merk");
   create_menu("admin/karyawan", "user", "Karyawan");
   create_menu("admin/pinjaman", "euro", "Pinjaman Karyawan");
   create_menu("admin/penjualan", "usd", "Penjualan");
   create_menu("admin/komponen", "superscript", "Komponen Gaji");
   create_menu("admin/laporangaji", "equalizer", "Laporan Gaji");
   create_menu("admin/laporanabsen", "stats", "Laporan Absensi");
   create_menu("admin/tidakhadir", "ok", "Input Ketidakhadiran");
   create_menu("admin/absen","list-alt", "Rekap Absen");
   create_menu("admin/tanggal", "calendar", "Input Tanggal Merah");
   }
?>      
   
      </ul>
   </div>
<!-- /Sidebar-->

<!-- Content -->
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
         <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
            <li class="active"><?= $breadcrumb ?></li>
         </ol>
      </div>
   <?php
//Menampilkan konten halaman
      $view = new View($viewName);
      $view->bind('data', $data);
      $view->render();
   ?>      
   </div>
<!-- /Content-->

<?php
//Memanggil semua file javascript yang diperlukan
   load_script('bootstrap/js/bootstrap.min.js');
   load_script('bootstrap-datepicker/js/bootstrap-datepicker.min.js');
   load_script('dataTables/js/jquery.dataTables.min.js');
   load_script('dataTables/js/dataTables.bootstrap.min.js');
   load_script('tinymce/tinymce.min.js');
   load_script('chart/chart.min.js');
   load_script('js/tinymce.config.js');
   load_script('jquery-ui-1.7.2/ui/minified/jquery-ui.min.js');
   

//Memanggil file javascript untuk export laporan dengan dataTables
   load_script('dataTables/js/dataTables.buttons.min.js');  
   load_script('dataTables/js/buttons.bootstrap.min.js');  
   load_script('dataTables/js/jszip.min.js');
   load_script('dataTables/js/pdfmake.min.js');
   load_script('dataTables/js/vfs_fonts.js');
   load_script('dataTables/js/buttons.html5.min.js');
   load_script('dataTables/js/buttons.print.min.js');
 
?>
</body>
</html>
