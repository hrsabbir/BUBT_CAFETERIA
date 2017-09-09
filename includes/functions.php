<?php
/**
 * Created by PhpStorm.
 * User: Hanif
 * Date: 8/15/2017
 * Time: 5:19 PM
 */

    $msg="";
    $form="";
    $type="";
    $username="";
    $user_type="";

    function strip($string){
        $string=strip_tags($string);
        $string=htmlspecialchars($string);
        return $string;
    }

    function loginCheck(){
        global $form,$msg,$type;
        if (isset($_POST['submit_signin']) && isset($_POST['email']) && isset($_POST['password'])) {
            $emailoruser = $_POST['email'];
            $password = $_POST['password'];
            $form="login";
            if (!empty($emailoruser) && !empty($password)) {
                $connection = new db();
                $emailoruser = strip($emailoruser);
                $result = $connection->getSingleResult("select username,session,password from login where email='$emailoruser' or username='$emailoruser'");
                $password_hash="";
                if(count($result)==1){
                   $password_hash = $result[0]['password'];
               }
               else{
                   $msg = "Wrong Username/Email or Password";
                   $type="fail";
                   return;
               }

                if (password_verify($password, $password_hash)) {

                    $_SESSION['session'] = $result[0]['session'];
                    //$_SESSION['username']=$result['username'];
                } else {
                    $msg = "Wrong Username/Email or Password";
                    $type="fail";
                }
                $connection->close();
            }

        }
    }

function registerCheck(){
    global $form,$msg,$type;
    if(isset($_POST['submit']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['r_username']) && isset($_POST['r_password'])
        && isset($_POST['confirm_password']) && isset($_POST['mobile']) && isset($_POST['r_email'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $r_username=$_POST['r_username'];
            $r_password=$_POST['r_password'];
            $confirm_password=$_POST['confirm_password'];
            $mobile=$_POST['mobile'];
            $r_email=$_POST['r_email'];
            $form="register";

        if(!empty($fname) && !empty($lname) && !empty($r_username) && !empty($r_password) && !empty($confirm_password)
            && !empty($mobile) && !empty($r_email)){
            $connection=new db();
            $fname=strip($fname);
            $lname=strip($lname);
            $r_username=strip($r_username);
            $r_username=ucfirst($r_username);
            
            $r_password=strip($r_password);
            $confirm_password=strip($confirm_password);
            if($confirm_password!=$r_password){
                 $type="fail";
                $msg="Passwords Don't match";
                return;
            }

            $session=generateRandomString(30);
            $session=password_hash("$session",PASSWORD_BCRYPT,['cost' => 12]);
            $mobile=strip($mobile);
            $r_email=strip($r_email);
            $r_password=password_hash("$r_password",PASSWORD_BCRYPT,['cost' => 12]);
            $result=$connection->getSingleResult("select username from login where username='$r_username'");
            if(count($result)>0){
                $type="fail";
                $msg="Username already exists";
                return;
            }
            $result=$connection->getSingleResult("select email from login WHERE email='$r_email'");
            if(count($result)>0){
                $type="fail";
                $msg="Email already exists";
                return;
            }
            $result=$connection->getSingleResult("select mobile from registration WHERE mobile='$mobile'");
            if(count($result)>0){
                $type="fail";
                $msg="Mobile already exists";
                return;
            }
            
            $result=$connection->insert("registration",array(
                'fname'=> $fname,
                'lname' => $lname,
                'username' => $r_username,
                'mobile' => $mobile,
                'email' => $r_email
            ));
            $result1=$connection->insert("login",array(
                'username'=> $r_username,
                'email' => $r_email,
                'password' => $r_password,
                'session' => $session,
                'user_type' => 'client'

            ));


            if($result && $result1){
                    $type="success";
                    $msg="Sign up Successful";
            }

            $connection->close();
        }
    }
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    function loggedIn(){
        global $username,$user_type;
        if(isset($_SESSION['session'])){
            $session=$_SESSION['session'];
            if(!empty($session)){
                $conn=new db();
                $session=strip($session);
                $result=$conn->getSingleResult("select username,user_type from login where session='$session'");
                if(count($result==1)){
                    $username= $result[0]['username'];
                    $user_type=$result[0]['user_type'];
                    return true;
                }
                else
                    return false;
            }
        }
    }
    function get_items(){
        global $flag;
        $item=new db();
        $results=$item->getSingleResult("select * from item");
        ?>

        <?php
        $i=0;
        foreach($results as $result) {
            $id[$i]=$result['id'];
            $image[$i]=$result['image_name'];
            $name[$i]=$result['name'];
            $price[$i]=$result['price'];
            $stock[$i]=$result['stock'];
            $i++;
        }
            $item->close();
        $quo=$i/6;
        ?>
        <div id="mCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
        <?php
        for($k=0;$k<=$quo;$k++){
           ?><li data-target="#mCarousel" data-slide-to="<?php echo $k;?>" class="<?php echo ($k==0)?"active":""?>"></li>
            <?php
        }
        ?>
            </ol>
            <div class="carousel-inner">
        <?php
            for($j=0;$j<$i;$j++){
                if($j%6==0){?>
                <div class="item <?php echo $j==0?"active":""?>">
<?php                }
                    ?>
                             <div class="col-md-4 col-sm-6 col_padding" >
                <div class="img_hover">

                    <img src="img/<?php echo $image[$j]; ?>" alt="" class="menu_item">
                    <div class="middle">
                        <h4>
                            <?php echo $name[$j];?><br>
                            Available: <?php echo $stock[$j];?><br>
                            <strong>Price: </strong><?php echo $price[$j];?> TK <br>
                        </h4>
                        <button type="button" class="btn btn-success text dy" data-toggle="modal" value="<?php echo $id[$j].'|'.$name[$j].'|'.$name[$j];?>"
                                data-target="<?php echo $flag ? ".bs-example1-modal-sm" : ".bs-example-modal-sm"; ?>">
                            Order
                        </button>
                    </div>


                </div>
            </div>



                    <?php

                if($j%6==5 || $j==$i-1){?>
                    </div>
<?php                }
            }
        ?>


            </div>

        </div>
        <?php
    }
    function orderItems(){
        global $username,$type,$msg,$form;
        if(isset($_POST['item_submit'])){
            $form="order";
            $id=$_POST['item_id'];
            $amount=$_POST['item_amount'];
            if(!empty($id) && !empty($amount)){
                $id=strip($id);
                $amount=strip($amount);
                $connection = new db();
                $username=strip($username);
                $session=$_SESSION['session'];
                $result=$connection->getSingleResult("select stock,name,price from item where id='$id'");
                if(count($result)==1){
                    $price=$amount*$result[0]['price'];
                    $name=$result[0]['name'];
                    $stock=$result[0]['stock'];
                    $r=$connection->insert("orders",array(
                        'username'=> $username,
                        'session' => $session,
                        'item_id' => $id,
                        'item_name' => $name,
                        'amount' => $amount,
                        'total_price' => $price,
                        'stock' => $stock
                    ));
                    if(!$r) {
                        $type="fail";
                        $msg="Order failed";
                        return;}
                    $type="success";
                    $msg="Added to Order List";

                }
                else
                return;
            }
        }
    }
    function getOrderedItems(){
        global $username,$flag;
        $connection=new db();
        $results=$connection->getSingleResult("select * from orders where username='$username'");
        if(count($results>0)){
            $i=1;$sum=0;
            foreach($results as $result){
                ?>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td align="center" ><?php echo $result['item_name']?></td>
                    <td align="center" ><?php echo $result['amount']?></td>
                    <td align="center"><?php echo $result['total_price']." Tk"?></td>
                    <td align="center"><button type="button" class="btn btn-default btn-sm edit_order" value="<?php echo $result['id'].'|'.$result['item_name'].'|'.$result['stock'];?>"
                                data-toggle="modal" data-target="<?php echo $flag ? ".bs-example1-modal-sm" : ".bs-example-modal-sm"; ?>">
                            <i  class="fa fa-pencil-square-o"></i>
                        </button>
                    </td>

                </tr>
                <?php
                $i++;
                $sum+=$result['total_price'];
            }
            ?>
            <tr>
                <td align="center" colspan="3"><center>Total Amount</center> </td>
                <td align="center"><?php echo $sum." Tk"?></td>
                <td align="center"><?php echo $sum?
                        '<form action="#ordered_items_link" method="post"><button type="submit" name="confirm_order" class="btn btn-success">
                                    Confirm order
                         </button>
                         </form>'
                        :""?>
                </td>
            </tr>
            <?php
        }
    }

function confirmOrder(){
    global $flag,$username,$form,$type,$msg;
    if(isset($_POST['confirm_order']) && $flag){
        $conn=new db();
        $session=$_SESSION['session'];
        $token=generateRandomString(5);
        $token=strip($token);
        $results=$conn->getSingleResult("select * from orders where session='$session'");
        if(count($results)>0){
            foreach ($results as $result){
               extract($result);
                $r=$conn->insert("confirmed_orders",array(
                    'username'=> $username,
                    'session' => $session,
                    'item_id' => $item_id,
                    'item_name' => $item_name,
                    'quantity' => $amount,
                    'total_price' => $total_price,
                    'token' => $token
                ));
                $form="ordered_items";
                if(!$r) retrun;
                $data=$conn->getSingleResult("select stock from item where id='$item_id'");
                if(count($data)==1) $stock=$data[0]['stock'];
                $available=$stock;
                $stock=$stock-$amount;
                if($stock<0){
                    $type="fail";
                    $msg="Only <strong>".$available."</strong> ".$item_name."s are in stock";
                    return;
                }
                if(!$data=$conn->update("update item set stock='$stock' where id='$item_id'")) return;
                if(!$data=$conn->update("delete from orders where id='$id'")) return;


                $type="success";
                $msg="Order is placed. Your token number is <strong>".$token."</strong> Please pay the bill first";
            }
        }
    }
}
function itemsUpdate(){
    global $msg,$type,$form;
    if(isset($_POST['item_update'])){
        $form="ordered_items";
        $id=$_POST['item_id'];
        $amount=$_POST['item_amount'];
        $conn=new db();
        $data=$conn->getSingleResult("select item_id from orders where id='$id'");
        if(count($data)==1){
            $item_id=$data[0]['item_id'];
            $conn->close();
            $conn=new db();
            $result=$conn->getSingleResult("select price from item where id='$item_id'");
            if(count($item_id)==1){
                $price=$result[0]['price'];
                $price=$price*$amount;

                $conn->close();
                $conn="";
                $conn=new db();
                if($amount!=0)
                    $r=$conn->update("update orders set total_price='$price',amount='$amount' where id='$id'");
                else
                    $r=$conn->update("delete from orders where id='$id'");
                $type="success";
                $msg="Order Update Successful";

            }

        }

    }

}
function payCheck(){
    $session=$_SESSION['session'];
    $conn=new db();
    $result=$conn->getSingleResult("select sum(total_price) from confirmed_orders where session='$session'");
    if(count($result)==1) {
        if ($result[0][0] <= 0)
            return 0;
        else
           return  $result[0][0];
    }
}
function viewOrders(){
    $conn=new db();
    $results=$conn->getSingleResult("select item_name,quantity,token,total_price from confirmed_orders order by token");
    $tk="";
$arr[0]='';
    if(count($results)>0){
        $i=1;$sum=0;
        foreach($results as $result){
            extract($result);
            if($tk==""){
                $tk=$token;
            }
            else{
                if($tk!=$token){
                    ?>
                    <tr class="bg-success">

                        <td align="center" align="center">
                            <button type="button" class="btn btn-success btn-sm admin_modal_paid" value="<?php echo $arr[$i-1]?>" data-toggle="modal" data-target=".bs-example-admin-modal-sm">Paid</button></td>
                          <td align="center">  <button type="button" class="btn btn-danger btn-sm admin_modal_canceled" value="<?php echo  $arr[$i-1]?>" data-toggle="modal" data-target=".bs-example-admin-modal-sm">Canceled</button></td>
                        <td align="center" colspan="2"><center>Total Price</center></td>
                        <td align="center"><center><?php echo $sum?></center></td>
                    </tr>
                    <?php
                    $sum=0;
                    $tk=$token;
                }
            }
            $arr[$i]=$token;
            ?>
            <tr>

                    <th scope="row"><?php echo $i++?></th>
                    <td align="center"><?php echo $item_name?></td>
                    <td align="center"><?php echo $quantity?></td>
                    <td align="center"><?php echo $token?></td>
                    <td align="center"><?php echo $total_price?></td>
            </tr>
        <?php
            $sum+=$total_price;
        }
        ?>

        <tr class="bg-success">

            <td align="center" align="center">
                <button type="button" class="btn btn-success btn-sm admin_modal_paid" value="<?php echo $token?>" data-toggle="modal" data-target=".bs-example-admin-modal-sm">Paid</button></td>
               <td align="center"> <button type="button" class="btn btn-danger btn-sm admin_modal_canceled" value="<?php echo $token?>" data-toggle="modal" data-target=".bs-example-admin-modal-sm">Canceled</button>
            </td>
            <td align="center" colspan="2"><center>Total Price</center></td>
            <td align="center"><center><?php echo $sum?></center></td>
        </tr>
        <?php
    }
    else{?>

        <tr>
            <td colspan="5" class="nodata"><center>No available orders</center></td>
        </tr>

        <?php
    }
}
function orderPaid(){
    if(isset($_POST['submit_paid'])){
        $order_token=$_POST['order_token'];
        $order_token=strip($order_token);
        $conn=new db();
        $results=$conn->getSingleResult("select item_name,quantity,total_price,username from confirmed_orders where token='$order_token'");
        if(count($results)>0){
            foreach ($results as $result){
                extract($result);
                $result=$conn->insert("sold",array(
                    'item_name'=> $item_name,
                    'item_quantity' => $quantity,
                    'item_price' => $total_price,
                    'username' => $username
                ));
            }
        }
        if(!$r=$conn->update("delete from confirmed_orders where token='$order_token'")) return;
    }
}
function orderCanceled(){
    if(isset($_POST['submit_canceled'])){
        $order_token=$_POST['order_token'];
        $order_token=strip($order_token);
        $conn=new db();
        $results=$conn->getSingleResult("select item_id,quantity from confirmed_orders where token='$order_token'");
        if(count($results)>0){
            foreach($results as $result){
                extract($result);
                $datas=$conn->getSingleResult("select stock from item where id='$item_id'");
                if(count($datas)==1){
                    $stock=$datas[0]['stock'];
                }
                $stock=$stock+$quantity;
                if(!$r=$conn->update("update item set stock='$stock' where id='$item_id'")) return;
            }
        }
        if(!$r=$conn->update("delete from confirmed_orders where token='$order_token'")) return;

    }
}

function addItems(){
    global $type,$form,$msg;
    if(isset($_POST['submit_add_item'])){
        $name=$_POST['item_name'];
        $quantity=$_POST['stock'];
        $price=$_POST['price'];
        $image_name=$_FILES['image']['name'];
        $form="add_items";
        if(!empty($name) && !empty($quantity) && !empty($price) && !empty($image_name)){
            $type=$_FILES['image']['type'];
            $name=strip($name);
            $quantity=strip($quantity);
            $price=strip($price);
            if($type!='image/png' && $type!='image/jpeg'){
                $msg="File should be an image";
                $type="fail";
                return;
            }
            $size=$_FILES['image']['size'];
            if($size>2097152){
                $type="fail";
                $msg="File should be less than 2MB";
                return;
            }
            $dir="img/";
            $image_name=str_replace(" ","_",$name).".jpg";
            $temp_name=$_FILES['image']['tmp_name'];
            $move_path=$dir.$image_name;
            if(!move_uploaded_file($temp_name,$move_path)){
                $type="fail";
                echo $msg="Upload Fail";
                return;
            }
             $conn=new db();
              $result=$conn->insert("item",array(
                  'name'=> $name,
                  'stock' => $quantity,
                  'image_name' => $image_name,
                  'price' => $price
              ));
              if(!$result){
                  $type="fail";
                  $msg="failed to insert";
                  return;
              }
              $type="success";
              $msg="Item Added Successfully";

        }
    }
}
function getHeading($heading){
    echo "<div class=\"heading row\">
        <center><h1>$heading</h1></center>
    </div>";
}
function soldItems(){
    $conn=new db();
    $results=$conn->getSingleResult("select * from sold order by time desc");
    if(count($results)>0){
        $i=1;
        foreach ($results as $result){

            extract($result);
            $time=substr($time,0,19);
            $time=date('M j Y g:i A', strtotime($time));
            ?>
            <tr>
                <td align="center"><?php echo $item_quantity?></td>
                <td align="center"><?php echo $item_name?></td>
                <td align="center"><?php echo $item_price?></td>
                <td align="center"><?php echo $time?></td>
                <td align="center"><?php echo $username?></td>

            </tr>
            <?php
        }
    }
    else{?>

        <tr>
            <td colspan="5" class="nodata"><center>No sold items</center></td>
        </tr>

        <?php
    }
}
function getItemList()
{
    global $flag,$user_type;
    $i=0;
    $conn = new db();
    $results = $conn->getSingleResult("select * from item");
    if (count($results) > 0) {
        $i = 1;
        foreach ($results as $result) {

            extract($result);
            ?>
            <tr>

                <td align="center" class="hidden-xs"><?php echo $i++ ?></td>
                <td align="center"><?php echo $name ?></td>
                <td align="center"><?php echo $price ?></td>
                <td align="center"><?php echo $stock ?></td>
                <?php if($flag && $user_type=='admin'){?>
                <td align="center">
                    <button class="btn btn-info item_edit_js" data-toggle="modal" value="<?php echo $id.'|'.$name.'|'.$stock.'|'.$price?>" data-target=".edit_item">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger delete_item_js" data-toggle="modal" data-target=".bs-example-admin-modal-sm" value="<?php echo $id?>">
                        <i class="fa fa-remove"></i>
                    </button>
                </td>
            <?php }
                else{?>
                    <td align="center">

                        <button type="button" class="btn btn-primary dy" data-toggle="modal" value="<?php echo $id.'|'.$name.'|'.$stock;?>"
                                data-target="<?php echo $flag ? ".bs-example1-modal-sm" : ".bs-example-modal-sm"; ?>">
                            Order
                        </button>

                    </td>
                <?php }
            ?>

            </tr>

            <?php
        }
    }
}
function updateItemCheck(){
    global $form,$type,$msg;
    if(isset($_POST['item_update_submit'])){
        $form="item_list";
        $item_stock=$_POST['item_stock'];
        $item_id=$_POST['item_id'];
        $item_price=$_POST['item_price'];
        if(!empty($item_stock) && !empty($item_id) && !empty($item_price)){
            $item_stock=strip($item_stock);
            $item_price=strip($item_price);
            $conn=new db();
            if(!$r=$conn->update("update item set stock='$item_stock',price='$item_price' where id='$item_id'")){
                $type="fail";
                $msg="Can not be Updated at the moment";
            }
            $type="success";
            $msg="Successfully Updated";

        }
    }
}

function deleteItemCheck(){
    global $form,$type,$msg;
    if(isset($_POST['delete_item'])){
        $item_id=$_POST['order_token'];
        if(!empty($item_id)){
            $form="item_list";
            $conn=new db();
            if(!$r=$conn->update("delete from item where id='$item_id'")){
                $type="fail";
                $msg="Item Can not be deleted at the moment";
            }
            $type="success";
            $msg="Item Successfully Deleted";

        }
    }
}

function contactusCheck(){
    global $form,$msg,$type;
    if(isset($_POST['contact_submit'])){
        $name=$_POST['contact_name'];
        $mobile=$_POST['contact_mobile'];
        $email=$_POST['contact_email'];
        $message=$_POST['contact_name'];
        $form="contact";
        if(!empty($name) && !empty($mobile) && !empty($email) && !empty($message)){
            $name=strip($name);
            $mobile=strip($mobile);
            $email=strip($email);
            $message=strip($message);
            $conn=new db();
            $result=$conn->insert("contact_us",array(
                'name'=> $name,
                'mobile' => $mobile,
                'email' => $email,
                'message' => $message
            ));
            $type="success";
            $msg="We will contact you soon";
        }else{
            $type="fail";
            $msg="Fields should not be empty";
        }

    }
}

?>