<?php

class MY_Loader extends CI_Loader {

    public function template($templateName, $vars = ['active' => 'home'], $return = false) {
        if ($return) {
            $content = $this->view('header', $vars, $return);
            $content .= $this->view($templateName, $vars, $return);
            $content .= $this->view('footer', $vars, $return);
            return $content;
        } else {
            $this->view('header', $vars, $return);
            $this->view($templateName, $vars, $return);
            $this->view('footer', $vars, $return);
        }
    }

    private function error(Exception $ex, $active = 'home') {
        $data = [
            'error' => $ex->getMessage(),
        ];
        $data['active'] = $active;
        print $data['active'];
        $this->template('errors/error', $data);
    }
}