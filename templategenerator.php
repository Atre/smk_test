<?php

class TemplateGenerator {

    private $data = array();

    public function __get($var) {
        if(isset($this->data[$var])) {
            return $this->data[$var];
        }
        return 0;
    }

    public function loadTemplate($template, $data) {
        $this->data = $data;
        include('templates/' . $template . '.tpl');
    }
} 