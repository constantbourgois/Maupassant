<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class VerifyLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User', '', true);
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {

    //This method will have the credentials validation
    $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('password', 'Password', 'callback_check_database');

        if ($this->form_validation->run() == false) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_view');
        } else {
          $data['name'] = $this->session->userdata('name');
          $data['id'] = $this->session->userdata('id');
          $data['email'] = $this->session->userdata('email');

          redirect('adminevents', 'refresh');
        }
    }

    public function check_database($password)
    {
        //Field validation succeeded.  Validate against database
    $email = $this->input->post('email');
    //query the database
    $result = $this->User->login($email, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
          'name' => $row->name,
          'email' => $row->email,
          'id' => $row->id,
        );
            }
            $this->session->set_userdata($sess_array);

        //check if admin//
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('is_logged_in');
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }
}
