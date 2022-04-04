<?php
create_title("Data Ketidakhadiran Karyawan");

//Membuat tabel
start_content();
   create_button("Tambah Izin", "success", "addForm()", "plus-sign");
   create_button("Tambah Sakit", "success", "addForm2()", "plus-sign");
   create_button("Tambah Cuti", "success", "addForm3()", "plus-sign");
   //create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama Karyawan", "Jenis Ketidakhadiran","Tanggal Tidak Hadir","Alasan","Surat Dokter","Jam Keluar","Jam Masuk", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Jenis Ketidakhadiran","jenis_tidakhadir","text",5 ,"", 'value="Izin" readonly');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_karyawan'];
	   $list[$key] = $d['nm_karyawan'];
   }
   form_combobox('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
   form_input("Tanggal Tidak Hadir", "tgl_tidakhadir", "date", 5, "", "required");
   //form_input("Surat Dokter","suratdokter","text",5);
   form_textarea("Alasan", "alasan", "richtext");
   form_input("Jam Keluar","waktu1","time",5);
   form_input("Jam Masuk","waktu2","time",5);
end_modal();

start_modal('modal-form2', 'return saveData2()');
form_input("Jenis Ketidakhadiran","jenis_tidakhadir","text",5 ,"", 'value="Sakit" readonly');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_karyawan'];
	   $list[$key] = $d['nm_karyawan'];
   }
   form_combobox('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
   form_input("Tanggal Tidak Hadir", "tgl_tidakhadir", "date", 5, "", "required");
   form_input("Surat Sakit (Jika ada)","suratdokter","text",5,"");
end_modal();

start_modal('modal-form3', 'return saveData3()');
form_input("Jenis Ketidakhadiran","jenis_tidakhadir","text",5 ,"", 'value="Cuti" readonly');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_karyawan'];
	   $list[$key] = $d['nm_karyawan'];
   }
   form_combobox('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
   form_input("Tanggal Tidak Hadir", "tgl_tidakhadir", "date", 5, "", "required");
   form_textarea("Alasan", "alasan", "richtext");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/tidakhadir/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Data Izin');
}

function addForm2(){
   save_method = "add";
   $('#modal-form2').modal('show');
   $('#modal-form2 form')[0].reset();                
   $('.modal-title').text('Tambah Data Sakit');
}
	
function addForm3(){
   save_method = "add";
   $('#modal-form3').modal('show');
   $('#modal-form3 form')[0].reset();                
   $('.modal-title').text('Tambah Data Cuti');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/tidakhadir/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data Ketidakhadiran');
         
         $('#id').val(data.id_tidakhadir);
         $('#id_karyawan').val(data.id_karyawan);
		 $('#jenis_tidakhadir').val(data.jenis_tidakhadir);
		 $('#tgl_tidakhadir').val(data.tgl_tidakhadir);
		 $('#suratdokter').val(data.suratdokter);
		 $('#alasan').val(data.alasan);
		 $('#waktu1').val(data.waktu1);
		 $('#waktu2').val(data.waktu2);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/tidakhadir/insert";
   else url = "<?= BASE_PATH ?>/admin/tidakhadir/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         table.ajax.reload();
		  
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
	return false;
}
	
function saveData2(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/tidakhadir/insert";
   else url = "<?= BASE_PATH ?>/admin/tidakhadir/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form2 form').serialize(),
      success : function(data){
         $('#modal-form2').modal('hide');
         table.ajax.reload();
		  
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });	
   return false;
}

function saveData3(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/tidakhadir/insert";
   else url = "<?= BASE_PATH ?>/admin/tidakhadir/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form3 form').serialize(),
      success : function(data){
         $('#modal-form3').modal('hide');
         table.ajax.reload();
		  
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });	
   return false;
}
	
//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/tidakhadir/delete/"+id,
         type : "GET",
         success : function(data){
            table.ajax.reload();
         },
         error : function(){
           alert("Tidak dapat menghapus data!");
         }
      });
   }
}
</script>