<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

    
    public function about(){
        $this->load->view('front/about');
    }
    public function academic(){
        $this->load->view('front/academic');
    }
    public function contact(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

        if($this->form_validation->run() == true){
            $config = array(
                'protocol' => 'smtp', 
                'smtp_host' => 'ssl://smtp.gmail.com', 
                'smtp_port' => 465,
                'smtp_user' => 'no-reply@example.com',
                'smtp_pass' => '12345!',
                'mailtype' => 'html', 
                'charset' => 'iso-8859-1',
            );

            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");

            $this->email->to('vnjfdnf@gmail.com');
            $this->email->from('vnjfdnf@gmail.com');
            $this->email->subject('You have received an enquiry');

            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $message=$this->input->post('message');

            $html="Name: ".$name;
            $html .="<br>";
            $html="Email: ".$email;
            $html .="<br>";
            $html="Message: ".$message;
            $html .="<br>";
            $html .="<br>";
            $html .="Thanks";
            $this->email->message($html);

            $this->session->set_flashdata('msg','Thanks for your enquiry, we will get back to you soon');
            redirect(base_url().'page/contact');

        }else{
            $this->load->view('front/contact_us');
        }

        
    }
}

?>