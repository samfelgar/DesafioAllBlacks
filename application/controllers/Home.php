<?php

class Home extends MY_Controller {

    public function index() {
        try {
            $this->load->model('dao/torcedorDAO');
            $this->load->template('home', [
                'active' => 'home',
                'torcedores' => $this->torcedorDAO->listar()
            ]);
        } catch (Exception $e) {
            $this->error($e);
        }
    }

}