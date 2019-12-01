<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['view'] = 'home';
        $this->load->view('layout/main',$data);
    }


    public function about_us(){
        $data['view'] = 'about';
        $this->load->view('layout/main',$data);
    }

    public function contact_us(){
        $data['view'] = 'contact';
        $this->load->view('layout/main',$data);
    }

    public function testimonial(){
        $data['view'] = 'testimonial';
        $this->load->view('layout/main',$data);
    }

    public function services(){
        $data['view'] = 'services';
        $this->load->view('layout/main',$data);
    }

    public function blog(){
        $data['view'] = 'blog';
        $this->load->view('layout/main',$data);
    }


}
