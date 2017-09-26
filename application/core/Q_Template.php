<?php 

/**
* Qapuas Templating
*/
class Q_Template extends MX_Controller {

	private $data = array();
	private $view = "default";
	private $js = "";
	private $css = "";
	private $viewData = "";
	
	public function view ($viewName = "default", $data = "") {
		$this->view = $viewName;
		$this->viewData = $data;
		return $this;
	}

	public function css ($css = "") {
		$this->css = $css;
		return $this;
	}

	public function js ($js = "") {
		$this->js = $js;
		return $this;
	}

	public function master ($loadTemplate, $data = "", $viewDataReturn = FALSE) {
		$dataParsing = array(
			"VIEW" => array(
				"CONTENT" => $this->view,
				"DATA" => $this->viewData
			),
			"MASTER" => array(
				"JS" => $this->js,
				"CSS" => $this->css,
				"DATA" => $data
			)
		);
		array_push($dataParsing, $this->data);
		$this->load->view($loadTemplate, $dataParsing, $viewDataReturn);
		return $this;
	}
}