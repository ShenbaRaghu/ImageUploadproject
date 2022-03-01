<?php

include './connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];
    // echo $username;
    // echo "<br/>";
    // echo $mobile;
    // echo "<br/>";
    // print_r($image);
    // echo "<br/>";
    //to access the individual types int he array attributes like file name , error, type, size seperately
    $imagefilename = $image['name'];
    // print_r($imagefilename);
    // echo "<br/>";
    $imagefileerror = $image['error'];
    // print_r($imagefileerror);
    // echo "<br/>";
    $imagefiletemp = $image['tmp_name'];
    // print_r($imagefiletemp);
    // echo "<br/>";
    //$imagefilesize = $image['size'];
    // print_r($imagefilesize);
    // echo "<br/>";
    // $imagefiletype = $image['type'];
    // print_r($imagefiletype);
    // echo "<br/>";

    //to seperate the filename from the extensions like shenba.jpeg
    $filename_seperate = explode('.', $imagefilename);
    // print_r($filename_seperate);
    // echo "<br/>";

    // method 1 or method 2 (use any one to seperate the type of file alone)
    // $file_extension = strtolower($filename_seperate[1]);
    // print_r($file_extension);
    // echo "<br/>";
    // method 2
    $file_extension1 = strtolower(end($filename_seperate));
    //print_r($file_extension1);
    //echo "<br/>";

    $extension = array('jpeg', 'jpg', 'png');
// now in the array (file_extension) whatever extension we get from file_extensions , if its has the extendion variable types only then we can output it in database
    if (in_array($file_extension1, $extension)) {

        // create a folder images and store all the images
        $upload_image = 'images/' . $imagefilename;
        //then move the uploaded imge to imagefiletemp
        move_uploaded_file($imagefiletemp, $upload_image);
        $sql = "insert into `registration` (name, mobile, image) values ('$username', '$mobile','$upload_image' )";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo '<div class="alert alert-success" role="alert">
           <strong>Success</strong> Data inserted Successfully
          </div>';
        } else {
            die(mysqli_error($con));
        }
    }

}

?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Image Upload</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
        img{
            width:200px;
        }
    </style>
    </head>
    <body>
        <h1 class = "text-center my-4">USER DATA</h1>
        <div class= "container mt-5 d-flex justify-content-center">
        <table class="table table-bordered w-50">
  <thead class = "table-dark text-center">
    <tr>
      <th scope="col">SL.NO.</th>
      <th scope="col">USERNAME</th>
      <th scope="col">IMAGE</th>
    </tr>
  </thead>
  <tbody>
      <?php
$sql = "Select * from `registration`";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $image = $row['image'];
    echo '  <tr>
   <td>' . $id . '</td>
    <td>' . $name . '</td>
    <td><img src = ' . $image . '  /></td>
  </tr>';
}

?>


  </tbody>
</table>

        </div>


    </body>
</html>
