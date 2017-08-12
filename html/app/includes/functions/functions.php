<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 8/12/2017
 * Time: 6:30 PM
 */

/**
 * Globally access the App singleton
 * @see \App
 * @return \App
 */
function App() {
    return \App::getInstance();
}

function View($query) {
    $view = new \View();
    $view->setAccessQuery($query);
    return $view;
}