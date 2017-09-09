<div class="section_gap">
</div>
<div class="item_list" id="item_list_link">
<?php getHeading("Item List")?>
    <?php $form=="item_list"?require 'partial_alert.php':""?>
    <?php include 'partial_table_header.php'?>
    <th class="hidden-xs"><center>#</center></th>
    <th><center>Item Name</center></th>
    <th><center>Item Price</center></th>
    <th><center>Available</center></th>
    <?php if($flag && $user_type=='admin'){
        echo '<th><center>Edit/Delete</center></th>';}
        else{
            echo '<th><center>Edit/Delete</center></th>';
        }
    ?>
    </tr>
    </thead>
    <tbody>
    <?php getItemList()?>
    <?php include 'partial_table_footer.php'?>
</div>