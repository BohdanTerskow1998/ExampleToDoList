<?php 

// ../model/model.php

class Model
{
  static public function user($name, $email)
  {
    if($name == "" || $email == "" ) 
    {
      return "Fail!";
    }
    else 
    {
      return "Thank's, $name! Now, you can try to use our TodoList!";
    }
  } 
}

