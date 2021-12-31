<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Events_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getEvents() {
        $query = $this->db->get('event_details');
        return $query->result();
    }

    public function insertEvents() {
        $data = array(
            'title' => $this->input->post('title'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'repeat_type' => $this->input->post('repeat_type')
        );

        if($this->input->post('repeat_type') == '1') {
            $data['repeat_interval'] = NULL;
            $data['repeat_day'] = NULL;
            $data['repeat_month_year'] = NULL;

            $data['repeat_every'] = $this->input->post('repeat_every');
            $data['repeat_on'] = $this->input->post('repeat_on');
        } else {
            $data['repeat_every'] = NULL;
            $data['repeat_on'] = NULL;

            $data['repeat_interval'] = $this->input->post('repeat_interval');
            $data['repeat_day'] = $this->input->post('repeat_day');
            $data['repeat_month_year'] = $this->input->post('repeat_month_year');
        }

        return $this->db->insert('event_details', $data);
    }

    public function updateEvent($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'repeat_type' => $this->input->post('repeat_type')
        );

        if($this->input->post('repeat_type') == '1') {
            $data['repeat_interval'] = NULL;
            $data['repeat_day'] = NULL;
            $data['repeat_month_year'] = NULL;

            $data['repeat_every'] = $this->input->post('repeat_every');
            $data['repeat_on'] = $this->input->post('repeat_on');
        } else {
            $data['repeat_every'] = NULL;
            $data['repeat_on'] = NULL;

            $data['repeat_interval'] = $this->input->post('repeat_interval');
            $data['repeat_day'] = $this->input->post('repeat_day');
            $data['repeat_month_year'] = $this->input->post('repeat_month_year');
        }

        $this->db->where('id', $id);
        return $this->db->update('event_details', $data);
    }

    public function deleteEvent($id) {
        return $this->db->delete('event_details', array('id' => $id));
    }
    
    public function findEvent($id) {
        return $this->db->get_where('event_details', array('id' => $id))->row(0);
    }
}