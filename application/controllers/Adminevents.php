<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Adminevents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Eventsadmin', '', true);
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        if ($this->session->userdata('name')) {
            $sess = $this->session->userdata('name');
            $data['email'] = $this->session->userdata('email');
            // get the events registered by admin //

            $data['events'] = $this -> Eventsadmin -> listEvents();
            $data['error'] = array('error'=>'');

            $this->load->view('admin_events_view', $data);
        } else {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
        };
    }

    public function json()
  	{  $options = [
   'script_url' => site_url('Adminevents/json'),
   'upload_dir' => APPPATH . '../uploads/files/',
   'upload_url' => site_url('uploads/files/')
   ];
  		$this->load->library('UploadHandler', $options);
  	}


    public function do_upload(){

            # Started working with file upload.
            $validFiles = array(
                'upload_path'   => 'assets',
                'allowed_types' => 'jpg|png|gif',
                'max_size'      => 250000
            );
            $this->load->library('upload', $validFiles);
            if ($this->upload->do_upload('newsphoto'))
            {
                $return['msg']='Image Uploaded Successfully!';
                echo json_encode($return);


            }
            else
            {
                echo $this->upload->display_errors();
            }


    }

    public function do_upload_logo()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                  var_dump($error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                      var_dump($data);
            }
    }
    public function do_upload_background()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                  var_dump($error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                      var_dump($data);
            }
    }
    public function add_event()
    {

        $data = array(
  'date' => $this->input->post('date'),
  'title' => $this->input->post('title'),
  'description' => $this->input->post('description'),
  'background_image' => $this->input->post('background_image'),
  'logo' => $this->input->post('logo'),
  'link'=>   $this->input->post('link'),
  'view_rank' => $this->input->post('view_rank'),
  );
var_dump($data);
var_dump($this->input->post('title'));

        $insert = $this->Eventsadmin->createEvent($data);

        echo json_encode(array("status" => true));

        $data['events'] = $this -> Eventsadmin -> listEvents();
        $this->load->view('admin_events_view', $data);
    }

    public function ajax_edit($id)
    {
        $data = $this->Eventsadmin->get_by_id($id);

        echo json_encode($data);
    }

    public function event_update()
    {

        $data = array(
    'date' => $this->input->post('date'),
    'title' => $this->input->post('title'),
    'description' => $this->input->post('description'),
    'background_image' => $this->input->post('background_image'),
    'logo' => $this->input->post('logo'),
    'link'=>   $this->input->post('link'),
    'view_rank' => $this->input->post('view_rank'),
    );


        $where =  array('id' => $this->input->post('id'));

        $this->Eventsadmin->event_update($where, $data);

        echo json_encode(array("status" => true));
        $data['events'] = $this -> Eventsadmin -> listEvents();
        $this->load->view('admin_events_view', $data);
    }


    public function event_delete($id)
    {
        $this->Eventsadmin->delete_by_id($id);

        echo json_encode(array("status" => true));
    }


}
