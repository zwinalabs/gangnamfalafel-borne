<div class="container">
<div class="row justify-content-center">
        <div class="card shadow border-0 mt-1">
            <div class="card-body text-center">
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
                <h2 class="display-2"><?php echo e(__("Order payment error!")); ?></h2>
                <h1 class="mb-4">
                    <span class="badge badge-primary"><?php echo e(__('Order')." #".$order->id); ?></span>
                </h1>
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <h5 class="mt-0 mb-5 heading-small text-muted">
                            <?php echo e(__("You can make another try to pay.")); ?>

                            <?php echo e(__($error)); ?>

                        </h5>
                        <div class=" mb-1 mt-1">
                            <div class="col-12 dDFlex pr-0 pl-0">
                                <div class="col-12 p-4 text-center coupons-area">
                                    <a href="javascript:void(0)" onClick="$('#pinPassOrderModal').modal('show')" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal">
                                        <svg fill="#03643b" width="19px" height="19px" class="f-fl" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" stroke="#03643b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M80,42V33a3,3,0,0,0-3-3H38v2H36V30H23a3,3,0,0,0-3,3v9a8,8,0,0,1,0,16h0v9a3,3,0,0,0,3,3H36V68h2v2H77a3,3,0,0,0,3-3V58a8,8,0,0,1,0-16ZM38,64H36V60h2Zm0-8H36V52h2Zm0-8H36V44h2Zm0-8H36V36h2ZM51,53.62,49.13,55l-2-2.75L45,55l-1.87-1.33,2-2.9-3.11-1,.69-2.18,3,1V45.05h2.53v3.52l3-1,.68,2.18-3.11,1Zm15.84,0L65,55l-2-2.75L60.85,55,59,53.62,61,50.72l-3.11-1,.68-2.18,3,1V45.05h2.53v3.52l3-1,.69,2.18-3.11,1Z"></path></g></svg>
                                        <span id="couponsLabel"><?php echo e(__('Cash')); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>



                            
                        </div>
                        
                        <a href="javascript:void(0)" onclick="hidePaymentDetailsBorneModel();" class="btn btn-outline-primary btn-sm">
                              <span class="btn-inner--icon">
                                <i class="fa fa-list-alt"></i>
                              </span>
                              <span  class="btn-inner--text"><?php echo e(__('Go back to restaurant')); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Coupons -->
<div class="modal" id="pinPassOrderModal" tabindex="-1" role="dialog" aria-labelledby="pinPassOrderModal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title" id="modal-title-new-item"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">                        
                <div class="row col-12 dDFlex pr-0 pl-0  mr-0 ml-0">
                    <div class="card card-profile">
                        <div class="px-2">
                            <div class="mt-3">
                                <h6><?php echo e(__('PIN Code')); ?><span class="font-weight-light"></span></h6>
                            </div>
                            <div class="card-content border-top">
                                <div class="form-group">
                                    <input type="text" name="pinpass_order" id="pinpass_order" class="green-border form-control" placeholder="" onChange="">
                                    <input type="hidden" value="<?php echo e($order->id); ?>" id="order_id" id="order_id"/>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-6"><button id="btn-cancel-comment" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close" ><?php echo e(__('Cancel')); ?></button></div>
                                <div class="col-6 text-right"><button  id="btn-valid-comment" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close" onClick="setPinPassOrder();"><?php echo e(__('Apply')); ?></button></div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('custom')); ?>/js/cancel.js"></script>





<?php /**PATH C:\laragon\www\gangnamfalafel\resources\views/orders/errorborne.blade.php ENDPATH**/ ?>