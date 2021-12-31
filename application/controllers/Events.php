<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->helper('url');

        $this->load->model('Events_model');
    }

	public function index()
	{
        $eventsModel = new Events_model();
        
        $data['eventsDetails'] = $eventsModel->getEvents();

		$this->load->view('events/index', $data);
	}

    public function create()
	{
		$this->load->view('events/create');
	}

    public function edit($id)
	{
        $eventDetail = $this->Events_model->findEvent($id);
        if(empty($eventDetail)) {
            redirect(base_url('events/index'));
        }
		$this->load->view('events/create',array('eventDetail' => $eventDetail));
	}

    public function view($id)
	{
        $eventDetail = $this->Events_model->findEvent($id);
        if(empty($eventDetail)) {
            redirect(base_url('events/index'));
        }
		$this->load->view('events/view',array('eventDetail' => $eventDetail));
	}

    public function store()
	{
		$this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        $this->form_validation->set_rules('repeat_type','Repeat Type','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('events/create'));
        } else {
            $this->Events_model->insertEvents();
            redirect(base_url('events/index'));
        }
	}

    public function update($id)
	{
		$this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        $this->form_validation->set_rules('repeat_type','Repeat Type','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('events/create'));
        } else {
            $this->Events_model->updateEvent($id);
            redirect(base_url('events/index'));
        }
	}

    public function delete($id)
	{
        $this->Events_model->deleteEvent($id);
        redirect(base_url('events/index'));
    }
}
