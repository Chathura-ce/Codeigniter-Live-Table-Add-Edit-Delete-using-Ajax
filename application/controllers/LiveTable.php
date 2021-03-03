<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveTable extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LiveTable_model');
    }

    function index()
    {
        $this->load->view('live_table');
    }

    function load_data(){
        $data = $this->LiveTable_model->load_data();
        echo json_encode($data);
    }

    function insert()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'age'   => $this->input->post('age')
        );

        $this->LiveTable_model->insert($data);
    }

    function update()
    {
        $data = array(
            $this->input->post('table_column') => $this->input->post('value')
        );

        $this->LiveTable_model->update($data, $this->input->post('id'));
    }

    function delete()
    {
        $this->LiveTable_model->delete($this->input->post('id'));
    }



}