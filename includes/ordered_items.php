<div class="section_gap">
</div>
`<div class="ordered-items" id="ordered_items_link">
    <?php getHeading("ORDERED ITEMS")?>

    <?php $form=="ordered_items"?require 'partial_alert.php':""?>
<?php require 'partial_table_header.php'?>

                            <th class="hidden-xs"><center>#</center></th>
                            <th><center>Item Name</center></th>
                            <th><center>Quantity</center></th>
                            <th><center>Price</center></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php getOrderedItems();?>

<?php require 'partial_table_footer.php'?>
                        </div>
