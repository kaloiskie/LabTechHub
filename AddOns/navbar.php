<div class="navbarLogRis" style=" height:140px; background-color: #000E12;">
        <div class="row" style="margin-top:-3px; height: 140px;">
            <a  style="height: 140px;" href="<?php 
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                "index.php";
            }else{echo "home.php";}
            ?>"><img class="mainlogo col-sm" src="admin/image/LOGO.png" alt="" 
            style="max-width: 140px; height: 140px; padding:0px"></a>
            <div class="col-sm-7">
            <style>
                .mainlogo{
                    margin-left: 150px;
                    margin-right: 10px;
                }
            </style>
                                    <div class="row">
                                        <div class="col" style="height: 25px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="height: 25px; padding-left:30px; color:grey;">
                                        <div>
                                        |<a href="home.php" style="padding-left: 4px;"><span class="navtext">HOME</span></a>
                                        |<a href="purchases.php" style="padding-left: 4px;"><span class="navtext">PURCHASES</span></a>
                                        |<a href="login.php" style="padding-left: 4px;"><span class="navtext">LOG IN</span></a>
                                        |<a href="register.php" style="padding-left: 4px;"><span class="navtext">SIGN UP</span></a>
                                        </div>
                                        </div>
                                    </div>
                                    <form method='post' action="searchbar.php">
                                    <div class="input-group col-sm">
                                        <input type="text" class="form form-control" placeholder="Search" name="search" id="search"
                                        style="height: 40px; width: 90%">
                                        <div class="input-group-append">
                                        <button class="btn btn-info" type="submit" name="searchbar" id="searchbar" value="submit" style="height: 40px;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </form>
                                    <style>
                                        button.submit1{
                                            background-color: #000E12;
                                        }
                                        .imagelogo{
                                            max-width: 80px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-sm">
                                        <form method='post' action='categorizelaptop.php'>
                                            <center>
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
                                            </center>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                                    <div class="col-sm">
                                        <div class="row">
                                            <div class="col-sm " style="height: 30px; padding-top:5px;" >
                                            <div class='' style="text-align:left; margin-left:-30px;">
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
                                            <a href="cart.php"><i class="fa fa-cart-arrow-down" style="font-size:90px;color:grey"></i></a>
                                        <div class="row">
                                            <div class="col-sm"style="height: 60px;">
                                            </div>
                                        </div> 
                                    </div>
                                        
                </div>
            </div>  