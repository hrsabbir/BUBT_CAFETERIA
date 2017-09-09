
<div class="order" id="order_link">
    <?php getHeading("ORDER US")?>
    <?php $form=="order"?require 'partial_alert.php':""?>
    <div class="row fix_row">

        <?php get_items();?>
    </div>


</div>