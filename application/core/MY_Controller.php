<?php

class MY_Controller extends CI_Controller {

    protected function error($e, $active = 'home') {
        $this->load->template('errors/error', [
            'error' => $e->getMessage(),
            'active' => $active
        ]);
    }
}