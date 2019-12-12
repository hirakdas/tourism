<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Common_model');
    }

    public function index()
    {
        $data['view'] = 'admin/destination';
        $this->load->view('admin/layout',$data);
    }

    public function insert_destination(){
        print_r($this->input->post());
        die();
        $config['upload_path']="./uploads/destination";
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("image")){
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'location' => $this->input->post('brand'),
                'introduction' => $this->input->post('introduction'),
                'duration' => $this->input->post('duration'),
                'price' => $this->input->post('price'),
                'image' => $data['upload_data']['file_name']
            );
            $result= $this->Common_model->add('destination',$data1);

            if($result) {
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );
                echo json_encode($data);
            }
            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Upload jpg and png only"
            );
            echo json_encode($data);
        }
    }
}