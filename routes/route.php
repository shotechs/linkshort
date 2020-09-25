<?php

class Route
{
    private $_url = [];
    private $_method = [];
    /**
     * Builds a collection of internal URL's to look for
     */
    public function add($uri, $method = null)
    {
        $this->_uri[] = '/'.trim($uri, '/');

        if ($method != null) {
            $this->_method[] = $method;
        }
    }

    public function submit()
    {
        $uriGetParam  = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
        //return trim($uriGetParam, '\/view\/');
        return $uriGetParam;

        // foreach ($this->_uri as $key => $value) {
        //     if (preg_match("#^$value$#", $uriGetParam)) {
        //         echo 'This page3';
        //         if (is_string($this->_method[$key])) {
        //             echo 'This page';
        //             $useMethod = $this->_method[$key];
        //             new $useMethod();
        //         } else {
        //             echo 'This page2';
        //             call_user_func($this->_method[$key]);
        //         }
        //     }
        // }
    }
}
