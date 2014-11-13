<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
    public function index() {
        $data['page_title'] = "SparkLess's Blog";
        $this->load->view('blog_view', $data);
    }
}
