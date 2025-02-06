<?php
abstract class BaseController 
{
    abstract public function __construct();
    public function render($view,$data=[])
    {
extract ($data);
require"./app/Views/$view.php";
    }
}
?>