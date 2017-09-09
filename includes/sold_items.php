<div class="section_gap">
</div>
<div class="sold_items" id="sold_items_link">
    <?php getHeading("SOLD ITEMS")?>
<?php require 'partial_table_header.php'?>
                            <th><center>Item Quantity</center></th>
                            <th><center>Item Name</center></th>
                            <th><center>Amount</center></th>
                            <th><center>Time</center></th>
                            <th><center>Username</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php soldItems()?>
<?php require 'partial_table_footer.php'?>
                        </div>
