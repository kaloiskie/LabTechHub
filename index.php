<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
require_once "config.php";
require_once "AddOns/retrieve_product_available.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labtech_hub</title>
  <link rel="icon" href="admin/image/LOGO.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>

  <style>
      .tableFixHead {
        overflow-y: auto;
        height: 300px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th {
        background: #eee;
        text-align: center;
      }
    </style>
</head>
<body>
<?php require_once "AddOns/navbar2.0.php"; ?>
    <div class="row" style="margin-top: 150px;">
        <div class="col-sm-3">
            <div class="tableFixHead">
            <table>
                    <thead>
                    <tr>
                        <th>Product Brands</th>
                    </tr>
                    </thead>
                    <tbody>
                    <style>
                    button {
                        border: none;
                        background-color: white;
                        text-align: center;
                    }
                    
                    button:focus {
                        border: none;
                        outline: none;
                    }
                    
                    button:focus{
                        outline:none;
                    }
                    </style>
                    <form method='post' action='categorizelaptop.php'>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="asus"><img class="imagelogo" src="admin/image/asus-logo.png" alt="">
                        <span class="logoname">ASUS <span class="badge badge-secondary"><?php echo $_SESSION['asus'];?></span></span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="acer"><img class="imagelogo" src="admin/image/acer-logo.png" alt="">
                        <span class="logoname">ACER <span class="badge badge-secondary"><?php echo $_SESSION['acer'];?></span></span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="dell"><img class="imagelogo" src="admin/image/dell-logo.png" alt="">
                        <span class="logoname">DELL <span class="badge badge-secondary"><?php echo $_SESSION['dell'];?></span></span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="hp"><img class="imagelogo" src="admin/image/hp-logo.png" alt="">
                        <span class="logoname">HP <span class="badge badge-secondary"><?php echo $_SESSION['hp'];?></span></span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="lenovo"><img class="imagelogo" src="admin/image/lenovo-logo.png" alt="">
                        <span class="logoname">LENOVO <span class="badge badge-secondary"><?php echo $_SESSION['lenovo'];?></span></span></button></td>
                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-9">
                <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="admin/image/11th-Gen-Intel-Core-Desktop-Processors-Shop-Page-Banner.jpg">
                    </div>
                    <div class="carousel-item">
                    <img src="admin/image/loaded up and ready to go.jpg">
                    </div>
                    <div class="carousel-item">
                    <img src="admin/image/intel nuc mini pc.jpg">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                </div>
                <form method='post' action='categorizelaptop.php'>
                <div class="row row2">
                    <div class="col-sm-12" style="text-align: left;">
                        <img class="laptop" src="admin/image/Aspire_Vero_National_Geographic_Edition.jpg" alt="">
                        <button class='submit'name='submit' type='submit' value="acer"><img class="laptoplogo" src="admin/image/acer-logo.png" alt=""></button>
                    </div>
                    <div class="col-sm-12" style="text-align: left;">
                        <img class="laptop" class="laptop" src="admin/image/asus-laptop.png" alt="">
                        <button class='submit'name='submit' type='submit' value="asus"><img class="laptoplogo" src="admin/image/asus-logo.png" alt=""></button>
                    </div>
                    <div class="col-sm-12" style="text-align: left;">
                        <img class="laptop" src="admin/image/dell-laptop.webp" alt="">
                        <button class='submit'name='submit' type='submit' value="dell"><img class="laptoplogo" src="admin/image/dell-logo.png" alt=""></button>
                    </div>
                    <div class="col-sm-12" style="text-align: left;">
                        <img class="laptop" src="admin/image/Hp.png" alt="">
                        <button class='submit'name='submit' type='submit' value="hp"><img class="laptoplogo" src="admin/image/hp-logo.png" style="margin-left: 40px;"></button>
                    </div>
                
                    <div class="col-sm-12" style="text-align: left;">
                        <img class="laptop" src="admin/image/lenovo-laptops-v-series-v14-gen2-14inch-intel-hero.png" alt="">
                        <button class='submit'name='submit' type='submit' value="lenovo"><img class="laptoplogo" src="admin/image/lenovo-logo.png" alt=""></button>
                    </div>
                </div>
                </form>  
            </div>
        </div>
    </div>
    
</body>
</html>
