<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gammu extends CI_Controller {

    public function index()
    {
        $this->load->view('gammu');
    }
}