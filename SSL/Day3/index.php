<?php
	
include 'models/viewModel.php';

$viewModel = new viewModel();		
$data = array("name"=>"mike");

$viewModel->getView('views/header.php',$data);
$viewModel->getView('views/body.php',$data);
$viewModel->getView('views/footer.php',$data);


?>