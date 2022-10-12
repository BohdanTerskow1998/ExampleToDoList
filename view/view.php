<?php 

  // ../view/view.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To-Do list using jQuery and with MVC structure</title>
  <script type="text/javascript" src="../public/js/jQuery.js"></script>
  <link rel = "stylesheet"  href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="../public/css/style.css">
  <script type="text/javascript"></script>
</head>
<body>

  <header>

    <div class="form">
      <h1 class="title-h1">Please, fulling form to continue!</h1>
      <form method="POST" name="form" id="form">
        Name:
        <input type="text" name="name" id="name" class="form-control">
        Email:
        <input type="email" name="email" id="email" class="form-control">
        <button type="submit" name="btn" id="btn" class="btn btn-primary form-control">SEND DATA</button>
      </form>
    </div>

  </header>

  <main>
 
    <div class="TodoList">
      <br />
      <h2> Example </h2>  
      <h3> How to Create a TO-DO list using jQuery </h3>      
      <br />  
      <br /> 
      <div class = "foot">  
        <input type="text" id="task" class="form-control" placeholder = "Add Task">
        <div class = "input-group-btn">
          <button type="submit" id="button" class="section__continer_button btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <article class="section__container_article">
          <h2 class = "text text-success"> List of Tasks: </h2>  
          <div class="container__article_ul">
            <!-- <p>...</p> -->
          </div>
        </article>
      </div>
    </div>

  </main>

  <script type="text/javascript">
    
    $("#btn").on("click", function(e) {
      e.preventDefault();
      let name = $("#name").val();
      let email = $("#email").val();

      $.ajax({
        type: "POST",
        url: "../model/model.php",
        data: ({
          "name": name, 
          "email": email
        }),
        success: function(data) {
          if(name == "" || email == "") {
            alert("Please, fulling form!")
          } else {
            alert(`Thank's, ${name}! Now, you can try to use our TodoList!`);
            $(".TodoList").css("display", "block");
            $(".form").css("display", "none");
          }
        }
      })
    })

    let input = document.getElementById("task");
    input.addEventListener("keyup", function(e) {
      if(e.keyCode === 13) {
        e.preventDefault();
        document.getElementById("button").click();
      }
    }); 

    $(document).ready(function() {
      $("#task").css("resize", "none");
      $("#button").on("click", function() {
        let task = $("#task").val();
        if(task !== "") {
          $(".section__container_article .container__article_ul").append(`<p class="container__article_li item" title="Delete?">- ${task}</p>`);
        } else {
          alert("Please, write your task! Form can't to be empty!");
        }
      });

      $(document).on("click", ".item", function() {
        $(this).empty();
        $(this).css('list-style', "none");
      })
    })

  </script>

</body>
</html>

