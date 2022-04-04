<?php
create_title("Data Penjualan Per Bulan");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Perusahaan","Merk Produk", "Total Penjualan", "Bonus(Persentase)","Bonus(Angka)", "Bonus Bulan", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   $list = array();
   foreach($data as $d){
	   $key = $d['id_perusahaan'];
	   $list[$key] = $d['nm_perusahaan'];
   }
   form_combobox('Perusahaan','id_perusahaan', $list, 4, '', 'required');
   //$list2 = array();
   //foreach($data as $d){
//	   $key = $d['id_merk'];
//	   $list2[$key] = $d['merk'];
  // }
   $list = array();
   form_combobox('Merk','id_merk', $list, 4, '', '');
   form_input("Total Penjualan", "total_penjualan", "text", 5, "", "required");
   form_input("Bonus (Persentase)", "bonus", "text", 5, "", "required");
   form_input("Bonus Bulan","bulan_bonus", "date", 5, "", "required");
   
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/penjualan/listData",
         "type" : "POST"
      }
   }); 
});

//Fungsi untuk mengubah pilihan link dengan AJAX
function getLink(){
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/penjualan/datalink/",
      type : "GET",
      success : function(data){
         $('#id_merk').html(data);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Menampilkan form tambah data
function addForm(){
	$.ajax({
      url : "<?= BASE_PATH ?>/admin/penjualan/datalink/",
      type : "GET",
      success : function(data){
         $('#id_merk').html(data);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Data Penjualan Per Bulan');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/penjualan/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data Penjualan');
         
         $('#id').val(data.id_penjualan);
         $('#id_perusahaan').val(data.id_perusahaan);
		 getLink(data.id_merk);
		 $('#id_merk').val(data.id_merk);
		 $('#total_penjualan').val(data.total_penjualan);
		 $('#bonus').val(data.bonus);
		 $('#bulan_bonus').val(data.bulan_bonus);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/penjualan/insert";
   else url = "<?= BASE_PATH ?>/admin/penjualan/update";
   
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
         url : "<?= BASE_PATH ?>/admin/penjualan/delete/"+id,
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