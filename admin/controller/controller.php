<?php 
function render($path, $data = [])
{
    extract($data);
    $view = "view/" . $path . ".php";
    include_once $view;
}
