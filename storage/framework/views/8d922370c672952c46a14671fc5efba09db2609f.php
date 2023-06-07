
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow border-0 mt-1">
            <div class="card-body text-center">
                <div id="successPaymentAnim" class="justify-content-center text-center">
                    <img alt="cash icon" src="/custom/img/payment-successful.gif" >
                </div>
                <h2 class="display-2 display-payment-success"><?php echo e(__("You're all set!")); ?></h2>
                <h1 class="mb-4">
                    <span class="badge badge-primary"><?php echo e(__('Order')." #".$order->id); ?></span>
                </h1>
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <h5 class="mt-0 mb-1 heading-small text-muted">
                            <?php echo e(__("Your order is created. You will be notified for further information.")); ?>

                        </h5>
                        <div class="font-weight-300 mt-2 mb-3">
                            <a href="javascript:void(0)" onclick="$('#receiptOrderModal').modal('show')" class="btn btn-outline-primary btn-sm fsize-16">
                                <span class="btn-inner--icon fsize-20">
                                  <i class="fa fa-list-alt"></i>
                                </span>
                                <span  class="btn-inner--text"><?php echo e(__('View Receipt')); ?></span>
                          </a>
                        </div>
                        <div class="font-weight-300 mb-2">
                            <a href="javascript:void(0)" onclick="hidePaymentDetailsBorneModel();" class="btn btn-outline-primary btn-sm fsize-16">
                                <span class="btn-inner--icon fsize-20">
                                    <i class="fa fa-angle-double-left"></i>
                                </span>
                                <span  class="btn-inner--text"><?php echo e(__('Go back to restaurant')); ?></span>
                            </a>
                        </div>
                        <!-- My Order Buttton -->
                        
                        
                        <!-- End  My Order Button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Coupons -->
<div class="modal" id="receiptOrderModal" tabindex="-1" role="dialog" aria-labelledby="receiptOrderModal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title" id="modal-title-new-item"><?php echo e(__('Receipt')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">                        
                <div class="col-12 mr-0 ml-0">
                    <div class="card card-profile receiptTxt">
                        <?php echo $receipt; ?>

                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('custom')); ?>/js/success.js"></script>




<?php /**PATH C:\laragon\www\gangnamfalafel\resources\views/orders/successborne.blade.php ENDPATH**/ ?>