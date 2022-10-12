<?php 

// ../controller/controller.php

require_once "../view/view.php";
require_once "../model/model.php";

class Controller
{
  static public function index() :void
  {
    @$name = $_POST["name"];
    @$email = $_POST["email"];
    Model::user($name, $email);
  }
}


