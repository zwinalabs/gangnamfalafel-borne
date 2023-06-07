<?php
$badgeTypes=['badge-primary','badge-primary','badge-warning','badge-info','badge-default','badge-warning','badge-success','badge-success','badge-danger','badge-danger','badge-success','badge-success','badge-danger','badge-success','badge-success'];
?>
<?php if($order->status->count()>0): ?>
    <span class="badge <?php echo e($badgeTypes[$order->status->pluck('id')->last()]); ?> badge-pill"><?php echo e(__($order->status->pluck('alias')->last())); ?></span>
<?php endif; ?>  <?php /**PATH C:\laragon\www\gangnamfalafel\resources\views/orders/partials/laststatus.blade.php ENDPATH**/ ?>