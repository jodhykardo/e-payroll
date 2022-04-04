<?php
create_title("Data Komponen Gaji Karyawan");

//Membuat tabel
start_content();
   create_button("Tambah Data Komponen gaji Karyawan", "success", "addForm()", "plus-sign");
   //$list = array();
   //foreach($data as $d){
//	   $key = $d['id_karyawan'];
//	   $list[$key] = $d['nm_karyawan'];
  // }
   //form_combobox2('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
   
   
   create_table(array("Nama Karyawan","Kerja Di","Gaji Pokok", "Tunjangan Tetap", "Tunjangan Transportasi (Per Hari)","Tunjangan Prestasi (Per Minggu)", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_karyawan'];
	   $list[$key] = $d['nm_karyawan'];
   }
   form_combobox('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
   form_input("Gaji Pokok", "gaji_pokok", "text", 5, "", "required");
   form_input("Tunjangan Tetap", "tj_tetap", "text", 5, "", "required");
   form_input("Tunjangan Transportasi (Per Hari)","transportasi", "text", 5, "", "required");
   form_input("Tunjangan Prestasi (Per minggu)","prestasi2", "text", 5, "", "required");
   
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/komponen/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Data Komponen Gaji Karyawan');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/komponen/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data Komponen Gaji Karyawan');
         
         $('#id').val(data.id_mastergaji);
         $('#id_karyawan').val(data.id_karyawan);
		 $('#gaji_pokok').val(data.gaji_pokok);
		 $('#tj_tetap').val(data.tj_tetap);
		 $('#transportasi').val(data.transportasi);
		 $('#prestasi2').val(data.prestasi2);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/komponen/insert";
   else url = "<?= BASE_PATH ?>/admin/komponen/update";
   
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

//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/komponen/delete/"+id,
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