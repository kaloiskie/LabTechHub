
<nav class="navbar navbar-expand-sm justify-content-center" style="background-color: #000E12;">
<div class="row">
    <div class="col-sm-3" style="border: none;">
            <!-- Brand/logo -->

  <a class="navbar-brand " href="<?php 
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                "index.php";
            }else{echo "home.php";}
            ?>">
    <img src="admin/image/LOGO.png" alt="logo" style="width:100px;">
  </a>
    </div>
  
  <!-- Links -->
        <div class="col-sm-6" style="width:700px">
            <div class="row">
                <div class="col">
                |<a href="home.php" style="padding-left: 4px;"><span class="navtext">HOME</span></a>
                |<a href="purchases.php" style="padding-left: 4px;"><span class="navtext">PURCHASES</span></a>
                |<a href="login.php" style="padding-left: 4px;"><span class="navtext">LOG IN</span></a>
                |<a href="register.php" style="padding-left: 4px;"><span class="navtext">SIGN UP</span></a>
                </div>
            </div>
        <div class="row">
        <div class="col">
        <ul class="navbar-nav" style="width:100%;">
            <li class="nav-item" style="width:100%;">
            <form method='post' action="searchbar.php">
                <div class="input-group">
                    <input type="text" class="form form-control" placeholder="Search" name="search" id="search"
                    style="height: 40px; width:90%;">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit" name="searchbar" id="searchbar" value="submit" style="height: 40px;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
            </form>
            </li>
        </ul>
        </div>
        </div>
        <style>
                                        button.submit1{
                                            background-color: #000E12;
                                        }
                                        .imagelogo{
                                            max-width: 80px;
                                        }
                                    </style>
            <div class="row">
                <div class="col">
                    <center>
                <form method='post' action='categorizelaptop.php'>
                    <button class='submit1'name='submit' type='submit' value="asus"><img class="imagelogo" src="admin/image/asus-logo.png" alt="">
                    </button>
                    <button class='submit1'name='submit' type='submit' value="acer"><img class="imagelogo" src="admin/image/acer-logo.png" alt="">
                    </button>
                    <button class='submit1'name='submit' type='submit' value="dell"><img class="imagelogo" src="admin/image/dell-logo.png" alt="">
                    </button>
                    <button class='submit1'name='submit' type='submit' value="hp"><img class="imagelogo" src="admin/image/hp-logo.png" alt="">
                    </button>
                    <button class='submit1'name='submit' type='submit' value="lenovo"><img class="imagelogo" src="admin/image/lenovo-logo.png" alt="">
                    </button>
                    </form>
                    </center>       
                </div>
            </div>
        </div>

        <div class="col-sm-3" style="border:none; width:100%">
            <div class="row">
                <div class="col-sm-12">
                <div class="float-right">
                    <a class="" href="login.php" >
                    <span class="navtext">SIGN IN</span></a> |
                    <a class="" href="logout.php" >
                    <span class="navtext">SIGN OUT</span></a> |
                    <a class=" " href="account.php"> 
                    <span class='navtext' style='font-size:14px; text-transform:uppercase; padding-left:1px;'><img src="<?php if(!isset($_SESSION['displayed_pic'])== "admin/image/"){ echo "admin/image/temp_profile.png";}else{echo $_SESSION['displayed_pic'];}?>" class="rounded-circle" alt=""
                    style="max-width:20px; border-radius: 100%; border:1px solid grey;"
                    >  <?php if(!empty($_SESSION["username"])){echo htmlspecialchars($_SESSION["username"]);}else{echo 'ME';} ?></span></a>                            
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <a href="cart.php"><i class="fa fa-cart-arrow-down" style="font-size:90px;color:grey"></i></a>                        
            </div>
              <div class="row">
                                            <div class="col-sm"style="height: 60px;">
                                            </div>
                                        </div>                            
            </div>
            
        </div>  
  </div>
</nav>