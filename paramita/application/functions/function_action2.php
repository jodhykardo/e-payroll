<?php 
function create_action($id, $edit=true, $delete=true, $download=true){
	$button = "";
	if($edit) $button .= '<a class="btn btn-primary" onclick="editForm('.$id.')"><i class="glyphicon glyphicon-pencil"></i></a>';
	
	if($delete) $button .= ' <a class="btn btn-danger" onclick="deleteData('.$id.')"><i class="glyphicon glyphicon-trash"></i></a>';
	
	if($download) $button .= '<a class"btn btn-primary" onclick="download('.$id.')"><i class="glyphicon glyphicon-download-alt"></i></a>';
	
	return $button;
}