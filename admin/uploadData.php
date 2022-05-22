<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labtech_hub</title>
  <link rel="icon" href="admin/image/mainlogo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/index.css">
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
    <div class="navbarLogRis">
        <div class="row">
            <a href="../index.php"><img class="mainlogo col-sm" src="image/mainlogo1.png" alt=""></a>
            <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col" style="height: 25px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="height: 25px; padding-left:30px; color:grey;">
                                        <div>
                                        |<a href="home.php" style="padding-left: 4px;"><span class="navtext">HOME</span></a>
                                        |<a href="categorizelaptop.php" style="padding-left: 4px;"><span class="navtext">LAPTOPS</span></a>
                                        |<a href="login.php" style="padding-left: 4px;"><span class="navtext">LOG IN</span></a>
                                        |<a href="register.php" style="padding-left: 4px;"><span class="navtext">SIGN UP</span></a>
                                        </div>
                                        </div>
                                    </div>
                                    <form method='post' action="searchbar.php">
                                    <div class="input-group col-sm">
                                        <input type="text" class="form form-control" placeholder="Search" name="search" id="search"
                                        style="height: 55px; width: 700px">
                                        <div class="input-group-append">
                                        <button class="btn btn-info" type="submit" name="searchbar" id="searchbar" value="submit" style="height: 55px;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </form>

                                    <div class="row">
                                        <div class="col-sm">
                                        <form method='post' action='../categorizelaptop.php'>
                                            <center>
                                            <button class='submit'name='submit' type='submit' value="asus"><img class="imagelogo" src="../admin/image/asus-logo.png" alt="">
                                            </button>
                                            <button class='submit'name='submit' type='submit' value="acer"><img class="imagelogo" src="../admin/image/acer-logo.png" alt="">
                                            </button>
                                            <button class='submit'name='submit' type='submit' value="dell"><img class="imagelogo" src="../admin/image/dell-logo.png" alt="">
                                            </button>
                                            <button class='submit'name='submit' type='submit' value="hp"><img class="imagelogo" src="../admin/image/hp-logo.png" alt="">
                                            </button>
                                            <button class='submit'name='submit' type='submit' value="lenovo"><img class="imagelogo" src="../admin/image/lenovo-logo.png" alt="">
                                            </button>
                                            </center>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                                    <div class="col-sm">
                                        <div class="row">
                                            <div class="col-sm " style="height: 30px;">
                                            <a class="" href="login.php" >
                                                <span class="navtext">SIGN IN</span></a> |
                                            <a class="" href="register.php" >
                                                <span class="navtext">SIGN UP</span></a>
                                            <a class="float-right" href="account.php" style="margin-right: 30px;">
                                                <span class="navtext"><i class='fas fa-user-alt'></i>ME</span></a>
                                            </div>
                                        </div>  
                                            <a href="cart.php"><i class="fa fa-cart-arrow-down" style="font-size:90px;color:grey"></i></a>
                                        <div class="row">
                                            <div class="col-sm"style="height: 60px;">
                                            </div>
                                        </div> 
                                    </div>
                                        
                </div>
            </div>
            </div>
    <div style="border: 1px solid grey; border-top:none; border-left:none; border-right:none;"></div>
    <div style="background-color: whitesmoke; padding-top:5%;  padding-bottom:8%;">
    <div class="container-fluid" style="border: 1px solid grey; padding: 50px; width:900px; height: 500px; 
    margin-left:20%; margin-right: 33%; background-color:white;">
        <form method="post" action="../admin/sendData.php" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-4">
        Select image to upload:<input type="file" name="the_file" id="fileToUpload" style="padding-bottom: 10px;"><br> 
        Brand name:<br> 
        <input type="checkbox" id="brand_name" name="brand_name" value="asus">
        <label>Asus</label><br>
        <input type="checkbox" id="brand_name" name="brand_name" value="acer">
        <label>Acer</label><br>
        <input type="checkbox" id="brand_name" name="brand_name" value="dell">
        <label>Dell</label><br>
        <input type="checkbox" id="brand_name" name="brand_name" value="hp">
        <label>Hp</label><br>
        <input type="checkbox" id="brand_name" name="brand_name" value="lenovo">
        <label style="padding-bottom: 10px;">Lenovo</label><br>
        Product Name: <input type="text" name="pname" class="pname"><br>
        <p style="padding-bottom: 10px;"></p>
        </div>
        <div class="col-sm-8    ">
        <label>Product Description:</label><br>
        <textarea id="text" name="pdescrip" class="descrip" rows="12" cols="50"></textarea><br>
        <p style="padding-bottom: 10px;"></p>
        </div>
        </div>
        Price: <input type="text" name="price"><br>
        <p style="padding-bottom: 10px;"></p>
        <input type="submit" class="btn btn-primary" value="Submit" >
</div>
</div>
</body>
</html>
