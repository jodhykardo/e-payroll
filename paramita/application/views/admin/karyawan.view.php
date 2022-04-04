<?php
create_title("Data Karyawan");

//Membuat tabel
start_content();
   create_button("Tambah Data Karyawan", "success", "addForm()", "plus-sign");
   //create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama", "Tempat Lahir","Tanggal Lahir","Jenis Kelamin","Alamat","Agama","Kerja Di","Tanggal Masuk","Email","NPWP", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Karyawan", "nm_karyawan", "text", 5, "", "required");
   form_input("Tempat Lahir", "tmpt_lahir", "text", 5, "", "required");
   form_input("Tanggal Lahir", "tgl_lahir", "date", 5, "", "required");
   $list = array('Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan');
   form_combobox('Jenis Kelamin', 'jk', $list, 4, '', 'required');
   form_input("Alamat", "alamat", "text", 5, "", "required");
   $list2 = array('Islam'=>'Islam','Kristen Protestan'=>'Kristen Protestan','Kristen Katholik'=>'Kristen Katholik','Buddha'=>'Buddha','Hindu'=>'Hindu');
   form_combobox('Agama','agama', $list2, 4, '', 'required');
   $list3 = array();
   foreach($data as $d){
	   $key = $d['id_perusahaan'];
	   $list3[$key] = $d['nm_perusahaan'];
   }
   form_combobox('Kerja Di','nm_perusahaan', $list3, 4, '', 'required');
   form_input("Tanggal Masuk","tgl_masuk", "date", 5, "", "required");
   form_input("Email", "email", "text", 5, "", "required");
   form_input("NPWP", "npwp", "text", 5, "");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/karyawan/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Data Karyawan');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/karyawan/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data Karyawan');
         
         $('#id').val(data.id_karyawan);
         $('#nm_karyawan').val(data.nm_karyawan);
		 $('#tmpt_lahir').val(data.tmpt_lahir);
		 $('#tgl_lahir').val(data.tgl_lahir);
		 $('#jk').val(data.jk);
		 $('#alamat').val(data.alamatkar);
		 $('#agama').val(data.agama);
		 $('#nm_perusahaan').val(data.id_perusahaan);
		 $('#tgl_masuk').val(data.tgl_masuk);
		 $('#email').val(data.email);
		 $('#npwp').val(data.npwp);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/karyawan/insert";
   else url = "<?= BASE_PATH ?>/admin/karyawan/update";
   
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
         url : "<?= BASE_PATH ?>/admin/karyawan/delete/"+id,
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