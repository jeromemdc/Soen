<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    function __construct() {
        parent::__construct();
 
    }

    public function index(){
        $this->load->view('template');
    }   

    public function home(){
        $this->load->view('pages/home');
    }

    public function category(){
        $this->load->view('pages/categories');
    }

    public function subcategory(){
        $this->load->view('pages/category_product');
    }

    public function product(){
        $this->load->view('pages/product');
    }

    public function header_container(){
        $this->load->view('pages/header_container');
    }

    public function footer_container(){
        $this->load->view('pages/footer_container');
    }

    public function fit_quiz(){
        $this->load->view('pages/fit_quiz');
    }

    public function meta(){
        $this->load->view('pages/meta_container');
    }

    public function about(){
        $this->load->view('pages/about');
    }

    public function collection(){
        $this->load->view('pages/collections');
    }

    public function search(){
        $this->load->view('pages/search');
    }

}   