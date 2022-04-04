<?php
create_title("Pinjaman Karyawan");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama Karyawan","Jumlah Pinjaman","Cicilan","Tanggal Peminjaman","Keterangan", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
     $list = array();
   foreach($data as $d){
	   $key = $d['id_karyawan'];
	   $list[$key] = $d['nm_karyawan'];
   }
   form_combobox('Nama Karyawan','id_karyawan', $list, 4, '', 'required');
	 form_input("Jumlah Pinjaman", "jml_pinjam", "text", 5, "", "required");
     form_input("Cicilan Per Bulan", "cicilan", "text", 5, "", "required");
     form_input("Tanggal Peminjaman", "tgl_pinjam", "date", 5, "", "required");
     form_textarea("Keterangan", "keterangan", "richtext", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method,level;

$(function(){
	
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
	   
      "ajax" : {
         //"url" : url,
         "url" : "<?= BASE_PATH ?>/admin/pinjaman/listData",
		  "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Pinjaman Karyawan');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/pinjaman/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data Pinjaman');
         
         $('#id').val(data.id_pinjaman);
         $('#id_karyawan').val(data.id_karyawan);
		 $('#jml_pinjam').val(data.jml_pinjam);
		 $('#cicilan').val(data.cicilan);
		 $('#keterangan').val(data.keterangan);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/pinjaman/insert";
   else url = "<?= BASE_PATH ?>/admin/pinjaman/update";
   
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
         url : "<?= BASE_PATH ?>/admin/pinjaman/delete/"+id,
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