<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        $data['result']=$this->Common_model->get_all('destination');
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

    public function destination_details($tour_name='')
    {
        if($tour_name == ''){
            redirect('main','refresh');
        }
        else
            {

            $tour = str_replace("%20"," ",$tour_name);
            $tour_id=$this->Common_model->get_tour_id($tour);
            if($tour_id)
            {
                $data['destination'] = $this->Common_model->get_one('destination','id',$tour_id['id']);
                $data['text']=$this->Common_model->get_one('destination_text','tour_id',$tour_id['id']);
                $data['img']=$this->Common_model->get_all_where('destination_img','tour_id',$tour_id['id']);

                $data['view'] = 'book_trip';
                $this->load->view('layout/main',$data);
            }
            else{
                redirect('main','refresh');

            }

        }

    }

    public function book_now($tour_name=''){
        if($tour_name == ''){
            redirect('main','refresh');
        }
        else {
            $tour = str_replace("%20", " ", $tour_name);
            $tour_id = $this->Common_model->get_tour_id($tour);
            if($tour_id) {
                $data['destination'] = $this->Common_model->get_one('destination', 'id', $tour_id['id']);
                $data['view'] = 'book_now';
                $this->load->view('layout/main', $data);
            }
            else{
                redirect('main','refresh');

            }
        }
    }

    public function bookings(){
            $data=array(
                'tour_id' => $this->input->post('tour_id'),
                'tour_name' => $this->input->post('tour_name'),
                'name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'people' => $this->input->post('people'),
                'date_from' => $this->input->post('date_from'),
                'date_to' => $this->input->post('date_to'),
                'price' => $this->input->post('price'),
                'created' => date('Y-m-d H:i:s')
            );
            $data = $this->security->xss_clean($data);
            $result = $this->Common_model->add('orders',$data);

            if($result){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Booking Successful"
                );
                echo json_encode($data);
            }
    }


}
