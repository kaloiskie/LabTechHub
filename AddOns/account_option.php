<div>
<div class="row rounded" style="margin-left:100px; 
 padding-top:3px;  padding-bottom:3px;">
    <div class="col-sm-4">
    <img src="<?php if($row["displayed_pic"] == "admin/image/"){echo "admin/image/temp_profile.png";}
                            else{echo $row["displayed_pic"];};?>" 
                            class="rounded-circle" 
                            style="max-width: 50px; border-radius: 100%; border:1px solid grey;">
    </div>
    <div class="col-sm-8" style="padding-top:2px;">
        <b><?php echo htmlspecialchars($_SESSION["username"]);?></b><br>
        <a href="account.php"><span class="glyphicon glyphicon-edit"></span>Edit profile</a>
    </div>
    
    <div class="row" style="padding-top:20px; padding-left:30px;">
        <div class="col-sm">
            <a href="account.php" style="padding-top:20px;color:grey;"><i style='font-size:24px' class='fas'>&#xf007;</i> My Account</a>           
        </div>
    </div>
    <div class="row" style="padding-top:20px; padding-left:30px;">
        <div class="col-sm">           
            <a href="purchases.php" style="padding-top:20px;color:grey;"><i class='fas fa-clipboard' style='font-size:24px'></i> My Purchases</a>          
        </div>
    </div>
    <div class="row" style="padding-top:20px; padding-left:30px;">
        <div class="col-sm">
            <a href="logout.php" style="padding-top:20px;color:grey;"><i style='font-size:24px' class='fas'>&#xf2f5;</i> Log Out</a>
        </div>
    </div>
</div>
</div>
