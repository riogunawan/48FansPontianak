<?php 

/**
* Qapuas Controller :D
*/

class Q_Controller extends MX_Controller {
	
	public $template;
	
	public function __construct() {
		parent::__construct();
		$this->template = new Q_Template();
	}

}