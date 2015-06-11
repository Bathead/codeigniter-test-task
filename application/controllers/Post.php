<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->load->library('ion_auth');
    }
	public function index()
	{
        $newsId = (int)$this->uri->segment(2);
        $data['article'] = $this->db->select('*')->from('articles')
            ->where('id', $newsId)
            ->limit(1)
            ->get()->result()[0];
        $data['user'] = $this->ion_auth->user()->row();
        $this->load->view('single', $data);
    }


    public function edit()
    {
        if(!$this->ion_auth->logged_in()) exit('Not logged in');
        $newsId = (int)$this->uri->segment(3);
        $data['user'] = $this->ion_auth->user()->row();

        if($this->input->post()) {
            $dataUpdate = array(
                'id' => $newsId,
                'title' => $this->input->post('title'),
                'text'  => $this->input->post('text'),
                'published'  => time()
            );
            $this->db->replace('articles', $dataUpdate);
            $data['article'] = $this->db->select('*')->from('articles')
                ->where('id', $newsId)
                ->limit(1)
                ->get()->result()[0];
        }
        else
        {
            $data['article'] = $this->db->select('*')->from('articles')
                ->where('id', $newsId)
                ->limit(1)
                ->get()->result()[0];
        }

        $this->load->view('edit', $data);


    }
    public function delete()
    {
        if(!$this->ion_auth->logged_in()) exit('Not logged in');
        $this->db->delete('articles', array('id' => (int)$this->uri->segment(3)));
        redirect('/', 'norefresh');
    }
    public function add()
    {
        if(!$this->ion_auth->logged_in()) exit('Not logged in');
        $data['user'] = $this->ion_auth->user()->row();

        if($this->input->post()) {
            $dataUpdate = array(
                'title' => $this->input->post('title'),
                'text'  => $this->input->post('text'),
                'published'  => time()
            );
            $this->db->insert('articles', $dataUpdate);
            redirect('/', 'norefresh');
        }


        $this->load->view('add', $data);
    }
}
