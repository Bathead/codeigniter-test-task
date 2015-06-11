<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    const itemsPerPage = 5;
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language', 'text'));
        $this->load->library('ion_auth');
    }

	public function index()
	{
        $data['articlesArray'] = $this->db->select('*')
            ->from('articles')
            ->limit(self::itemsPerPage, (int)$this->uri->segment(2))
            ->order_by('published', 'desc')
            ->get()->result();

        $articlesCount = $this->db->select('count(*) as articlesCount')
            ->from('articles')
            ->get()
            ->result()[0]->articlesCount;

        $config['base_url'] = base_url('page');
        $config['total_rows'] = $articlesCount;
        $config['per_page'] = self::itemsPerPage;
        $config['first_url'] = '/';
        $config['full_tag_open'] = '<p class="pagination">';
        $config['full_tag_close'] = '<p>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['user'] = $this->ion_auth->user()->row();
        $this->load->view('main', $data);
	}
}
