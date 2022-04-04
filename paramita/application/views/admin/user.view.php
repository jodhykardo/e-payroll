<?php
   create_title("Tambah User");   
?>

<form id="form-setting" class="form form-horizontal" method="post">   
<?php

start_content();
   form_input("Username", "username", "text", 4, "", "required");
   form_input("Password", "password", "password", 4, "", "required");
   form_input("Ulang Password", "ulang", "password", 4, "", "required");
   form_input("Nama", "nama", "text", 4, "", "required");
   $list = array('Super_Admin'=>'Super Admin','User'=>'User');
   form_combobox('Level', 'level', $list, 4, '', 'required');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_perusahaan'];
	   $list[$key] = $d['nm_perusahaan'];
   }
   form_combobox('Untuk Cabang','nm_perusahaan', $list, 4, '', 'required');
   echo '<div class="col-sm-offset-2"> ';
   create_button("Tambah Baru", "primary", "", "floppy-disk");
   echo '</div>';
	
	
end_content();
?>
</form>

<?php
start_content();
create_table(array("Username","Nama","Level","Untuk Cabang", "Aksi"));
end_content();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/user/listData",
         "type" : "POST"
      }
   }); 
});
	
$(function(){
   $('#form-setting').submit(function(){
      if($('#password').val() != $('#ulang').val()){
         alert('Password tidak sama dengan Ulang Password');
      }else{
         $.ajax({
            url : "<?= BASE_PATH ?>/admin/user/insert",
            type : "POST",
            data : $('#form-setting').serialize(),
            success : function(data){
               if(data == 'success') alert('User Telah Ditambahkan');
				
               else alert('User Telah Ditambahkan');
			   window.location.reload();
			   
            },
            error : function(){
              alert("Tidak dapat menyimpan data!");
            }   
         });
      }
      return false;
   });
});
	
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/user/delete/"+id,
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