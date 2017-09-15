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
        $this->load->helper('directory');
    }

    public function index()
    {
        if ($this->session->userdata('name')) {
            $sess = $this->session->userdata('name');
            $data['email'] = $this->session->userdata('email');

            $data['events'] = $this -> Eventsadmin -> listEvents();
           /* $data['event_info'] = $this -> Eventsadmin -> getEventinfo();*/
            $data['error'] = array('error'=>'');
            $data['pictures'] = $this->listUploadedfiles();
            $data['thumbnails'] = $this->listUploadedthumbnails();

            $this->load->view('admin_events_view', $data);
        } else {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
        };
    }

    public function json()
    {
        $options = [
        'script_url' => site_url('Adminevents/json'),
        'upload_dir' => APPPATH . '../uploads/files/',
        'upload_url' => site_url('uploads/files/'),
        'max_file_size' => 1000
        ];
        $this->load->library('UploadHandler', $options);
    }


    /*public function do_upload()
    {
       echo 'aeaze'
            # Started working with file upload.
            $validFiles = array(
                'upload_path'   => 'assets',
                'allowed_types' => 'jpg|png|gif',
                'max_size'      => 2048
            );
            $this->load->library('upload', $validFiles);
        if ($this->upload->do_upload('newsphoto')) {
            $return['msg']='Image Uploaded Successfully!';
            echo json_encode($return);
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function do_upload_logo()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;


            $this->load->library('upload', $config);

        if (! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
    }
    public function do_upload_background()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
           

            $this->load->library('upload', $config);

        if (! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
    }*/
    public function add_event()
    {
        if ($this->input->post('background_select') == 'background_image') {
            $background_image_displayed = $this->input->post('background_image');
        } else {
            $background_image_displayed = $this->input->post('background_image_2');
        }

       // convert date to the right format //

        $from = $this->input->post('date');
        if ($from){
            $date = DateTime::createFromFormat('d/m/Y',$from);
            $from_date = $date->format("Y-m-d");

        }
	
	
        $data = array(
            'date' => $from_date,
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'background_image' => $this->input->post('background_image'),
            'background_image_2' => $this->input->post('background_image_2'),
            'background_select' => $this->input->post('background_select'),
            'background_image_displayed' => $background_image_displayed,
            'logo' => $this->input->post('logo'),
            'link'=>   $this->input->post('link'),
            'view_rank' => $this->input->post('view_rank'),
            'title_event_info' => $this->input->post('title_event_info'),
            'description_event_info' => $this->input->post('description_event_info'),
           	'date_event_info' => $this->input->post('date_event_info'),
			'champ2_event_info' => $this->input->post('champ2_event_info'),
			'champ3_event_info' => $this->input->post('champ3_event_info'),
            'picture_event_info' => $this->input->post('picture_event_info'),
            'logo_event_info' => $this->input->post('logo_event_info'),
            'link_event_info'=>   $this->input->post('link_event_info'),
            'linklogo_event_info'=>   $this->input->post('linklogo_event_info'),
        );

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
        if ($this->input->post('background_select') == 'background_image_1') {
            $background_image_displayed = $this->input->post('background_image');
        } else {
            $background_image_displayed = $this->input->post('background_image_2');
        }
		
		
		// convert date to the right format //
		$from = $this->input->post('date');
		$date = DateTime::createFromFormat('d/m/Y',$from);
		$from_date = $date->format("Y-m-d");
		

        $data = array(
            'date' => $from_date,
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'background_image' => $this->input->post('background_image'),
            'background_image_2' => $this->input->post('background_image_2'),
            'background_select' => $this->input->post('background_select'),
            'background_image_displayed' => $background_image_displayed,
            'logo' => $this->input->post('logo'),
            'link'=>   $this->input->post('link'),
            'view_rank' => $this->input->post('view_rank'),
            'title_event_info' => $this->input->post('title_event_info'),
            'description_event_info' => $this->input->post('description_event_info'),
           	'date_event_info' => $this->input->post('date_event_info'),
			'champ2_event_info' => $this->input->post('champ2_event_info'),
			'champ3_event_info' => $this->input->post('champ3_event_info'),
            'picture_event_info' => $this->input->post('picture_event_info'),
            'logo_event_info' => $this->input->post('logo_event_info'),
            'link_event_info'=>   $this->input->post('link_event_info'),
            'linklogo_event_info'=>   $this->input->post('linklogo_event_info'),
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

    /*public function event_info_update()
    {

        $data = array(
        'title' => $this->input->post('title_event_info'),
        'description' => $this->input->post('description_event_info'),
        'date' => $this->input->post('date_event_info'),
        'picture' => $this->input->post('picture_event_info'),
        'logo' => $this->input->post('logo_event_info'),
        'link'=>   $this->input->post('link_event_info'),
        'linklogo'=>   $this->input->post('linklogo_event_info'),
        );


        $this->Eventsadmin->event_info_update($data);

        echo json_encode(array("status" => true));
        $data['events'] = $this -> Eventsadmin -> listEvents();
        $data['event_info'] = $this -> Eventsadmin -> getEventinfo();
        $this->load->view('admin_events_view', $data);
    }*/

    public function listUploadedfiles()
    {
        $pictures = directory_map(APPPATH . '../uploads/files/');
        return $pictures;
    }

    public function listUploadedthumbnails()
    {
        $thumbnails = directory_map(APPPATH . '../uploads/files/thumbnail');
        return $thumbnails;
    }

    public function delete_files()
    {
        $files = $this->input->post('deletePictures[]');
      
        foreach ($files as $file) {
            unlink('uploads/files/thumbnail/'.$file);
            unlink('uploads/files/'.$file);
          
        }

        echo json_encode(array("status" => true));
    }
}
