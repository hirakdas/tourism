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
        $data['view'] = 'admin/bookings';
        $this->load->view('admin/layout',$data);
    }

    public function view_destination(){
        $data['view'] = 'admin/view_destination';
        $this->load->view('admin/layout',$data);
    }

    public function fetch_destination(){
        $result=$this->Common_model->get_all('destination');
        $data=array();
        foreach($result as $row){
            $sub_array=array();
            $sub_array[]='
                           <td>
                               <a href="'.base_url().'admin/edit_destination/'.$row['id'].'" class="btn btn-primary btn-sm update" id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                               <a href="" class="btn btn-danger btn-sm item_delete delete" id="'. $row['id'] .'" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                           </td>
                        ';
            $sub_array[]=$row['tour_name'];
            $sub_array[]=$row['location'];
            $sub_array[]=$row['introduction'];
            $sub_array[]=$row['duration'];
            $sub_array[]=$row['price'];
            $sub_array[]=$row['image'];
            $data[]=$sub_array;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    public function add_destination(){
        $data['view'] = 'admin/add_destination';
        $this->load->view('admin/layout',$data);
    }

    public function edit_destination(){
        $id=$this->uri->segment(3);
        $data['result'] = $this->Common_model->get_one('destination','id',$id);
        $data['view'] = 'admin/edit_destination';
        $this->load->view('admin/layout',$data);
    }
    public function insert_destination(){
        $config['upload_path']="./assets/images/destination";
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("image")){
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'tour_name' => $this->input->post('tour_name'),
                'location' => $this->input->post('location'),
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

    public function update_destination($id){
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = "./assets/images/destination";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("image")) {
                $data = array('upload_data' => $this->upload->data());
                $data1 = array(
                    'tour_name' => $this->input->post('tour_name'),
                    'location' => $this->input->post('location'),
                    'introduction' => $this->input->post('introduction'),
                    'duration' => $this->input->post('duration'),
                    'price' => $this->input->post('price'),
                    'image' => $data['upload_data']['file_name']
                );
                $result = $this->Common_model->update('destination', 'id', $id, $data1);

                if ($result) {
                    $data = array(
                        'error' => 0,
                        'msg' => "Record Updated Successfully"
                    );
                    echo json_encode($data);
                } else {
                    $data = array(
                        'error' => 1,
                        'msg' => "Something Went Wrong"
                    );
                    echo json_encode($data);
                }
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Upload jpg and png only"
                );
                echo json_encode($data);
            }
        }
        else{
            $data1 = array(
                'tour_name' => $this->input->post('tour_name'),
                'location' => $this->input->post('location'),
                'introduction' => $this->input->post('introduction'),
                'duration' => $this->input->post('duration'),
                'price' => $this->input->post('price'),
            );
            $result = $this->Common_model->update('destination', 'id', $id, $data1);

            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }

    }

    public function view_destination_details(){
        $data['result'] = $this->Common_model->get_all('destination');
        $data['view'] = 'admin/view_destination_details';
        $this->load->view('admin/layout',$data);
    }

    public function add_destination_details(){
        $data['view'] = 'admin/add_destination_details';
        $this->load->view('admin/layout',$data);
    }

    public function fetch_destination_dropdown(){
        $result=$this->Common_model->get_all('destination');
        echo json_encode($result);
    }

    public function insert_destination_details(){
        $tour_id = $this->input->post('tour_id');
        $image_data = array();

        if($_FILES["files"]["name"] != '')
        {
            $config["upload_path"] = './assets/images/destination_details/';
            $config["allowed_types"] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
            {
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
                if($this->upload->do_upload('file'))
                {
                    $data = $this->upload->data();
                    $data1 = array(
                        'tour_id' => $tour_id,
                        'image' => $data['file_name']
                    );

                    $image_data[] = $data1;
                }
                else{
                    $data=array(
                        'error'=> 1,
                        'msg'=> "Make sure to upload png and jpg image"
                    );
                    echo json_encode($data);
                    die();
                }
            }
            $data=array(
                'tour_id' => $tour_id,
                'about' => $this->input->post('about'),
                'details' => $this->input->post('details')
            );
            $result = $this->Common_model->add('destination_text',$data);
            $result2 = $this->Common_model->add_batch('destination_img',$image_data);

            if($result && $result2){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Succesfully"
                );
                echo json_encode($data);
            }
        }
    }

    public function delete($table_name,$id){
        $result=$this->Common_model->delete($table_name,'id',$id);
        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );
            echo json_encode($data);
        }
    }
}