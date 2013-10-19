<?php

// Controller (index)
//include 'views/view.php';

include 'viewModel.php';

$viewModel = new viewModel();

$data = array("name"=>"mike");

if(!empty($_GET["action"]))
{
	if($_GET["action"] == "form")
	{
		$viewModel->getView('views/form.php',$data);

	}else if($_GET["action"] == "process")
	{
		// var_dump($_POST);
		echo $_POST["username"];

		$em = $_POST["username"];
		$p = '#^[\w.-]+@[\w.-]+[a-zA-Z]{2,6}$#';

		if (preg_match($p, $em)) {
   		 	echo " True";
		} else {
    		echo " False";
		}

	}

}else
{
		$viewModel->getView('views/form.php',$data);
};

?>