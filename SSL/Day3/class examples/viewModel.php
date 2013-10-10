<?php

class viewModel{

	// PHP constructor function
	//public function __construct(){};

	public function getView($myfile,$data=array()){

		include $myfile;

	}

};

?>