<?php

class Xml extends CI_Model {

    public function getXml($url) {
        try {
            $xml = simplexml_load_file($url);
            return $xml;
        } catch (Exception $e) {
            throw $e;
        }
    }
}