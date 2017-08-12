<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 8/12/2017
 * Time: 2:25 PM
 */

class View
{
    private $_scripts;
    private $_stylesheets;
    private $_metatags;
    private $_charset;
    private $_title;

    public function setTitle($title = APP_NAME)
    {
        $this->_title = $title;
    }

    public function setCharSet($charSet = CS_UTF8)
    {
        $this->_charset = $charSet;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getCharSet()
    {
        return $this->_charset;
    }

    public function addScriptFile($fileUrl)
    {

    }

    public function addScriptTag($scriptText)
    {

    }

    public function addStylesheet($fileUrl, $mediaQuery = 'all')
    {

    }

    public function addMetaTag($metaName, $metaValue)
    {

    }

    public function __construct()
    {
        $this->setTitle();
        $this->setCharSet();
    }

    public function getOutput() {
        return 'test';
    }

    public function __toString()
    {
        return $this->getOutput();
    }

    public function renderOutput() {
        echo $this;
    }
}