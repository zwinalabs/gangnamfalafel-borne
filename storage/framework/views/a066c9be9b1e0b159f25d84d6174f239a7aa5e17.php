<?php $__currentLoopData = $order->actions['buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $next_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $btnType="btn-primary";
      if(str_contains($next_status,'accept')){
        $btnType="btn-success";
      }else if(str_contains($next_status,'reject')){
        $btnType="btn-danger";
      }
    ?>
    <?php if(in_array("timprepare", config('global.modules',[])) && $next_status=="accepted_by_restaurant"): ?>
      <!-- This is special case when owneer can set prepare time -->
      <button data-toggle="modal" data-target="#modal-time-to-prepare" onclick="$('#form-time-to-prepare').attr('action', '/updatestatus/accepted_by_restaurant/<?php echo e($order->id); ?>');" class="btn btn-sm <?php echo e($btnType); ?>" value="<?php echo e(__($next_status)); ?>" /><?php echo e(__($next_status)); ?></button>
    <?php elseif($next_status=="assigned_to_driver"): ?>
      <!-- This is special case when owneer can set driver -->
      <script>
        function setSelectedOrderId(id){
            $("#form-assing-driver").attr("action", "/updatestatus/assigned_to_driver/"+id);
        }
    </script>
      <button type="button" class="btn btn-primary btn-sm" onClick=(setSelectedOrderId(<?php echo e($order->id); ?>))  data-toggle="modal" data-target="#modal-asign-driver"><?php echo e(__('Assign to driver')); ?></button>
       <?php else: ?>
      <a href="<?php echo e(url('updatestatus/'.$next_status.'/'.$order->id)); ?>" class="btn btn-sm <?php echo e($btnType); ?>"><?php echo e(__($next_status)); ?></a>
    <?php endif; ?>
     
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(strlen($order->actions['message'])>0): ?>
    <p><small class="text-muted"><?php echo e($order->actions['message']); ?></small><p>
<?php endif; ?><?php /**PATH C:\laragon\www\gangnamfalafel\resources\views/orders/partials/actions/actions.blade.php ENDPATH**/ ?>