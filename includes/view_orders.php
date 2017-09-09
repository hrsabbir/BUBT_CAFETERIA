<div class="section_gap">
</div>
<div class="view_orders" id="view_orders_link">
    <?php getHeading("VIEW ORDERS")?>

<?php require'partial_table_header.php'?>
                            <th class="hidden-xs"><center>ID</center></th>
                            <th><center>Item Name</center></th>
                            <th><center>Quantity</center></th>
                            <th><center>Token</center></th>
                            <th><center>Price</center></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php viewOrders();?>

  <?php require'partial_table_footer.php'?>
</div>