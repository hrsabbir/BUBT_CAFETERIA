<nav class="navbar nav_back navbar-inverse navbar-fixed-top pos">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="">BUBT Cafeteria</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li ><a href="#myCarousel">Home</a></li>
            <li ><a href="#item_list_link">Item List</a></li>
            <li class="<?php echo $user_type=="admin"?"hide":""?>"><a href="#order_link">Order</a></li>
            <li class="<?php  echo ($flag && $user_type=="client") ?"":"hide";?>"><a href="#ordered_items_link">Orderd Foods</a></li>
            <li class="<?php  echo $flag ?"hide":"";?>"><a href="#signup_link" >Sign up</a></li>
            <li class="<?php  echo $flag ?"hide":"";?>"><a href="#signin_link">Sign in</a></li>
            <li class="<?php  echo ($flag && $user_type=="admin")?"hide":"";?>"><a href="#contact_link">Contact us</a></li>
            <li class="<?php  echo ($flag && $user_type=="admin")?"":"hide";?>"><a href="#view_orders_link">View Orders</a></li>
            <li class="<?php  echo ($flag && $user_type=="admin")?"":"hide";?>"><a href="#add_items_link">Add items</a></li>
            <li class="<?php  echo ($flag && $user_type=="admin")?"":"hide";?>"><a href="#sold_items_link">Sold items</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right <?php  echo $flag?"":"hide";?>" style="margin-right: 20px">
            <li class="<?php  echo ($flag==1 && $user_type=="admin")?"hide":"";?>"><a href="">Due: <?php echo payCheck();?> TK</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username ?>
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Sign out</a></li>

                </ul>
            </li>
        </ul>
    </div>
</nav>