<?php

class Controller_company extends CI_Controller {


//shortcut of loading and using a model
public function load()
    {
        $this->load->model('Model_company');
        return $this->Model_company;
    }

//direct to view_company.php  
public function index()
    {
        // redirect('/company');
        
$this->load->view('view_company');

    }
public function addCompany()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|regex_match[/^[0-9a-zA-Z \.]+$/]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|regex_match[/^[0-9a-zA-Z \.]+$/]');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|regex_match[/^[0-9a-zA-Z \.]+$/]');


        $this->form_validation->set_rules('address', 'Address', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('zipcode', 'Zip Code', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('location', 'Location', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'numeric');
        $this->form_validation->set_rules('timetype', 'Donation type', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('referral_method', 'Referral', 'trim|alpha_numeric_spaces');

        $postData = $this->input->post(null, true);
        // var_dump($postData);
        // die();
       
        // $isUser = $this->session->userdata('user');

        if ( $this->form_validation->run() == FALSE)
        {
            $errors = validation_errors();
            $this->load->view('view_company.php', [
                'errorsMsg' => $errors]);
        }
        else
        {
            $data = array(
                'firstname' => $postData['firstname'],
                'lastname' => $postData['lastname'],
                'company_name' => $postData['company_name'],
                'address' => $postData['address'],
                'zipcode' => $postData['zipcode'],
                'location' => $postData['location'],
                'email' => $postData['email'],
                'phone' => $postData['phone'],
                'timetype' => $postData['timetype'],
                'referral_method' => $postData['referral_method']

                
            );
            //   var_dump($data);
            //     die();
            $this->load()->addCompany($data);
            $this->session->set_flashdata('success_message', 'Your registration has been done.' );
            // redirect('../view.php');
            $this->load->view('thankyou_company');
        }
    }
} 




 
