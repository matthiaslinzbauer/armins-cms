<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 8/12/2017
 * Time: 6:20 PM
 */

class App
{
    /**
     * @var \App
     */
    private static $_app = null;

    /**
     * @var \View
     */
    private $_view = null;

    /**
     * @return \App
     */
    public static function getInstance() {
        if(self::$_app === null) {
            self::$_app = new self();
        }
        return self::$_app;
    }

    private function __construct()
    {
        $this->_view = new \View();
    }

    public function getDefaultView() {
        return $this->_view;
    }

    public function getOutput() {
        return $this->getDefaultView()->getOutput();
    }

    public function __toString()
    {
        return $this->getOutput();
    }

    public function renderOutput() {
        echo $this;
    }
}