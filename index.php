<?php
require_once './operations.php';
include './display.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Image Upload</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <h1 class="text-center my-3">REGISTRATION FORM</h1>
    <div class="container d-flex justify-content-center">
      <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
        <!-- <div class="form-group my-4">
          <input
            type="text"
            name="Username"
            placeholder="Username"
            class="form-control"
          />
        </div>
        <div class="form-group my-4">
          <input
            type="text"
            name="Mobile"
            placeholder="Mobile"
            class="form-control"
          />
        </div> -->
        <!-- instead of the above the below code and operations. php file is used to reduced the lines of code -->
        <?php inputFields("Username", "username", "", "text")?>
        <?php inputFields("Mobile", "mobile", "", "text")?>
        <?php inputFields("", "file", "", "file")?>
        <button class="btn btn-dark" type = "submit" name="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
