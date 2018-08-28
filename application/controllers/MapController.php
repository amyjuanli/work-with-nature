<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapController extends CI_Controller {
	public function index()
	{
        //list all map data 
        
        $this->load->view('maps/index.php');
	}
}
