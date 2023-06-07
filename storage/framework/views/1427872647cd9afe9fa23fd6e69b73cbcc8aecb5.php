<div class="card-profile">
    <div class="">
      
      <div  class="border-top pt-3">
        <!-- End price overview -->
        <!-- Delivery / Pickup --> 
        <div class="row mr-0 ml-0">
            <div class="col-12 dDFlex pr-0 pl-0">
                <h6 class="col-12 pr-0 pl-0 f-bolder"><?php echo e(__('Dine In / Takeaway')); ?></h6>
            </div>
            <div class="col-12 dDFlex pr-0 pl-0">
                <div id="dineInTakewayChoice" class="col-6 pr-0 pl-0 f-size-15">
                    <span id="dineInTakewayChoice_dinein" class="f-bolder" >
                        <i class="fa fa-cutlery greenColor">&nbsp;</i>&nbsp;&nbsp;<?php echo e(__('Dine In')); ?>

                    </span>
                    <span id="dineInTakewayChoice_takeaway" class="f-bolder" style="display:none;">
                        <i class="fa fa-archive greenColor">&nbsp;</i>&nbsp;&nbsp;<?php echo e(__('Takeaway')); ?>

                    </span>
                </div>
                <div class="col-6 pl-0 text-right">
                    <a href="javascript:void(0)" onClick="$('#dineiintakeawayModal').modal('show')" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal pt-0">
                    <?php echo e(__('Modifier')); ?>

                    </a>
                </div>
            </div>
        </div>
        <div class="modal" id="dineiintakeawayModal" tabindex="-1" role="dialog" aria-labelledby="dineiintakeawayModal" aria-hidden="true">
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
                            <div class="col-12 pr-0 pl-0">
                                
                                <?php echo $__env->make('cart.localorder.dineiintakeaway', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-12 pl-0"> 
                                <!-- Local Order Phone -->
                                <div class="col-12 pr-0 pl-0">
                                    <?php echo $__env->make('cart.localorder.phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                 <!-- Takeaway time slot -->
                                <div class="takeaway_picker col-12 pr-0 pl-0" style="display: none">
                                    <?php echo $__env->make('cart.time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <!-- LOCAL ORDERING -->
                                <div class="col-12 pr-0 pl-0">
                                    <?php echo $__env->make('cart.localorder.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                
                            </div>
                            <div class="row col-12">
                                <div class="col-6"><button id="btn-cancel-dineintakeaway" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close"><?php echo e(__('Cancel')); ?></button></div>
                                <div class="col-6 text-right"><button  id="btn-valid-dineintakeaway" type="button" class="btn btn-outline-primary action-btn close" data-dismiss="modal" aria-label="Close"><?php echo e(__('Apply')); ?></button></div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div  class="border-top pt-3">
        <!-- Comments --> 
        <div class="row mr-0 ml-0">
            <div class="col-12 dDFlex pr-0 pl-0">
                <h6 class="col-12 pr-0 pl-0 f-bolder"><?php echo e(__('Comment')); ?></h6>
            </div>
            <div class="col-12 dDFlex pr-0 pl-0">
                <div id="commentArea" class="col-6 pr-0 pl-0 f-size-15">
                    <span id="fullCommentArea" class="f-bolder">
                    </span>
                </div>
                <div class="col-6 pl-0 text-right">
                    <a href="javascript:void(0)" onClick="$('#commentsModal').modal('show');$('#comment').val(comment);" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal pt-0">
                        <?php echo e(__('Modifier')); ?>

                    </a>
                </div>
            </div>
        </div>
        <div class="modal" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="commentsModal" aria-hidden="true">
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
                            <div class="col-12 pr-0 pl-0">
                                <!-- Comment -->
                                <?php echo $__env->make('cart.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>




    

    <div  class="border-top pt-3">
        <!-- Payements --> 
        <div class="row mr-0 ml-0" v-if="itemsCount">
            <div class="col-12 dDFlex pr-0 pl-0">
                <h6 class="col-12 pr-0 pl-0 f-bolder">
                    <?php if(session('isBorne')): ?>
                        <?php echo e(__('Pay via Card terminal')); ?>

                    <?php else: ?>
                        <?php echo e(__('Payment')); ?>

                    <?php endif; ?>
                    
                </h6>
            </div>
            <div class="row col-12 dDFlex mr-0 ml-0 pr-0 pl-0">
                <?php if(session('isBorne')): ?>
                    <input name="paymentType" class="custom-control-input" id="paymentType" type="hidden" value="cod" >
                    <div class="row col-12 d-none">
                            <div class="col-6"> 
                                <svg fill="#03643b" height="64px" width="64px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 481.1 481.1" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M445.2,77.4H326V44.9c0-19.8-16.1-35.8-35.9-35.8H35.8C16,9.1,0,25.2,0,44.9v391.3C0,456,16.1,472,35.8,472h254.3 c19.8,0,35.9-16.1,35.9-35.8v-48.7h119.2c19.8,0,35.9-16.1,35.9-35.8V113.3C481,93.5,464.9,77.4,445.2,77.4z M409.9,101.4v262.1 h-23.1V101.4H409.9z M302,436.1c0,6.5-5.3,11.8-11.9,11.8H35.8c-6.5,0-11.8-5.3-11.8-11.8V44.9c0-6.5,5.3-11.8,11.8-11.8h254.3 c6.5,0,11.9,5.3,11.9,11.8V436.1z M326,101.4h36.9v262.1H326V101.4z M457,351.6c0,6.5-5.3,11.8-11.9,11.8h-11.2v-262h11.2 c6.5,0,11.9,5.3,11.9,11.8V351.6z"></path> <path d="M94.2,223.7h137.5c16.9,0,30.6-13.7,30.6-30.6v-89.9c0-16.9-13.7-30.6-30.6-30.6H94.2c-16.9,0-30.6,13.7-30.6,30.6v89.9 C63.6,210,77.3,223.7,94.2,223.7z M87.6,103.2c0-3.7,3-6.6,6.6-6.6h137.5c3.7,0,6.6,3,6.6,6.6v89.9c0,3.7-3,6.6-6.6,6.6H94.2 c-3.7,0-6.6-3-6.6-6.6V103.2z"></path> <path d="M91.5,273.5H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,273.5,91.5,273.5z"></path> <path d="M170.9,273.5H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,273.5,170.9,273.5z"></path> <path d="M250.4,273.5h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,273.5,250.4,273.5z"></path> <path d="M91.5,327.7H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,327.7,91.5,327.7z"></path> <path d="M170.9,327.7H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,327.7,170.9,327.7z"></path> <path d="M250.4,327.7h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,327.7,250.4,327.7z"></path> <path d="M91.5,381.9H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,381.9,91.5,381.9z"></path> <path d="M170.9,381.9H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,381.9,170.9,381.9z"></path> <path d="M250.4,381.9h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,381.9,250.4,381.9z"></path> </g> </g> </g></svg>
                            </div>
                            <div class="col-6 d-none">
                                <button  id="btn-valid-payment" type="button" class="btn btn-outline-primary action-btn close" onClick="sendSignalTerminal();"><?php echo e(__('Tester E-monétique!')); ?></button>
                            </div>
                    </div>
                    <div class="d-none">
                        <br>>>>E-monétique Response:<<<
                        <div id="idResultPaymentTerminal" class="row col-12" style="border: 2px solid #03643b; min-height: 34px; width: 100%; margin: 1px auto; background: #2c3e50; height: 22px; border-radius: 5px; display: relative;  box-shadow: 6px 6px 6px #888888; color: #fff; "> ...empty
                            
                        </div>
                    </div>
                <?php else: ?>
                    <div id="paymentChoiceNotSelected" class="col-12 pr-0 pl-0 f-size-15">
                        <span id="payementNotSelected" class="f-bolder" >
                            <a href="javascript:void(0)" onClick="$('#paymentsTypeModal').modal('show')" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal p-0">
                                <svg fill="#03643b" height="22px" width="22px" version="1.1" id="Layer_1" class="f-fl" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" stroke="#03643b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M493.714,66.178h-69.659H197.661h-69.661c-10.099,0-18.286,8.187-18.286,18.286v63.563h18.286h18.286h10.203h32.195 c12.566-12.003,21.598-27.666,25.337-45.277h193.674c7.188,33.842,33.891,60.545,67.734,67.734v89.183 c-33.843,7.186-60.547,33.891-67.734,67.734h-17.598v36.572h33.958h69.659c10.099,0,18.286-8.186,18.286-18.286v-69.66V154.121 V84.464C512,74.364,503.813,66.178,493.714,66.178z"></path> </g> </g> <g> <g> <path d="M335.24,184.597H146.285h-36.572H18.286C8.187,184.597,0,192.784,0,202.882v54.857h353.526v-54.857 C353.526,192.784,345.339,184.597,335.24,184.597z"></path> </g> </g> <g> <g> <path d="M0,294.311v133.224c0,10.099,8.187,18.286,18.286,18.286H335.24c10.099,0,18.286-8.186,18.286-18.286v-63.564V327.4 v-33.089H0z M152.383,367.454H91.429c-10.099,0-18.286-8.187-18.286-18.286c0-10.099,8.187-18.286,18.286-18.286h60.954 c10.099,0,18.286,8.187,18.286,18.286C170.668,359.267,162.481,367.454,152.383,367.454z"></path> </g> </g> </g></svg>
                                &nbsp;&nbsp;<?php echo e(__('Sélectionnez le mode de paiement')); ?>

                            </a>
                        </span>
                    </div>
                    <div class="col-12 dDFlex pr-0 pl-0">
                        <div class="col-6 pr-0 pl-0 f-size-15">
                            <span id="paymentAppelPay" class="f-bolder"   style="display:none;"  >
                                <svg width="44px" height="38px" viewBox="0 -29.75 165.5 165.5" id="Artwork" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style>.st0{fill:#fff}</style> <path id="XMLID_4_" d="M150.7 0h-139c-1 0-2.1.1-3.1.3-1 .2-2 .5-3 1-.9.4-1.8 1.1-2.5 1.8S1.7 4.7 1.3 5.6c-.5.9-.8 1.9-1 3-.2 1-.2 2.1-.3 3.1v82.5c0 1 .1 2.1.3 3.1.2 1 .5 2 1 3 .5.9 1.1 1.8 1.8 2.5s1.6 1.4 2.5 1.8c.9.5 1.9.8 3 1 1 .2 2.1.2 3.1.3h142.1c1 0 2.1-.1 3.1-.3 1-.2 2-.5 3-1 .9-.5 1.8-1.1 2.5-1.8s1.4-1.6 1.8-2.5c.5-.9.8-1.9 1-3 .2-1 .2-2.1.3-3.1v-1.4-78-1.7-1.4c0-1-.1-2.1-.3-3.1-.2-1-.5-2-1-3-.5-.9-1.1-1.8-1.8-2.5s-1.6-1.4-2.5-1.8c-.9-.5-1.9-.8-3-1-1-.2-2.1-.2-3.1-.3H150.7z"></path> <path id="XMLID_3_" class="st0" d="M150.7 3.5H153.8c.8 0 1.7.1 2.6.2.8.1 1.4.3 2 .6.6.3 1.1.7 1.6 1.2s.9 1 1.2 1.6c.3.6.5 1.2.6 2 .2.9.2 1.8.2 2.6v82.5c0 .8-.1 1.7-.2 2.6-.1.7-.3 1.4-.6 2-.3.6-.7 1.1-1.2 1.6s-1 .9-1.6 1.2c-.6.3-1.2.5-2 .6-.9.2-1.8.2-2.6.2H11.7c-.7 0-1.7-.1-2.6-.2-.7-.1-1.4-.3-2-.7-.6-.3-1.1-.7-1.6-1.2s-.9-1-1.2-1.6c-.3-.6-.5-1.2-.6-2-.2-.9-.2-1.8-.2-2.6v-81-1.4c0-.8.1-1.7.2-2.6.1-.7.3-1.4.6-2 .3-.6.7-1.1 1.2-1.6s1-.9 1.6-1.2c.6-.3 1.2-.5 2-.6.9-.2 1.8-.2 2.6-.2h139"></path> <path d="M45.2 35.6c1.4-1.8 2.4-4.2 2.1-6.6-2.1.1-4.6 1.4-6.1 3.1-1.3 1.5-2.5 4-2.2 6.3 2.4.3 4.7-1 6.2-2.8M47.3 39c-3.4-.2-6.3 1.9-7.9 1.9-1.6 0-4.1-1.8-6.8-1.8-3.5.1-6.7 2-8.5 5.2-3.6 6.3-1 15.6 2.6 20.7 1.7 2.5 3.8 5.3 6.5 5.2 2.6-.1 3.6-1.7 6.7-1.7s4 1.7 6.8 1.6c2.8-.1 4.6-2.5 6.3-5.1 2-2.9 2.8-5.7 2.8-5.8-.1-.1-5.5-2.1-5.5-8.3-.1-5.2 4.2-7.7 4.4-7.8-2.3-3.6-6.1-4-7.4-4.1"></path> <g> <path d="M76.7 31.9c7.4 0 12.5 5.1 12.5 12.4 0 7.4-5.2 12.5-12.7 12.5h-8.1v12.9h-5.9V31.9h14.2zm-8.3 20h6.7c5.1 0 8-2.8 8-7.5 0-4.8-2.9-7.5-8-7.5h-6.8v15zM90.7 62c0-4.8 3.7-7.8 10.3-8.2l7.6-.4v-2.1c0-3.1-2.1-4.9-5.5-4.9-3.3 0-5.3 1.6-5.8 4h-5.4c.3-5 4.6-8.7 11.4-8.7 6.7 0 11 3.5 11 9.1v19h-5.4v-4.5h-.1c-1.6 3.1-5.1 5-8.7 5-5.6 0-9.4-3.4-9.4-8.3zm17.9-2.5v-2.2l-6.8.4c-3.4.2-5.3 1.7-5.3 4.1 0 2.4 2 4 5 4 4 0 7.1-2.7 7.1-6.3zM119.3 80v-4.6c.4.1 1.4.1 1.8.1 2.6 0 4-1.1 4.9-3.9 0-.1.5-1.7.5-1.7l-10-27.6h6.1l7 22.5h.1l7-22.5h6l-10.3 29.1c-2.4 6.7-5.1 8.8-10.8 8.8-.4-.1-1.8-.1-2.3-.2z"></path> </g> </g></svg>
                            </span>
                            <span id="paymentCache" class="f-bolder" style="display:none;"  >
                                <svg fill="#03643b" width="22px" height="22px" viewBox="0 -64 640 640" class="f-fl" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 176c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 48h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path></g></svg>
                                &nbsp;&nbsp;<?php echo e(config('app.isqrsaas')?__('Cash / Card Terminal'): __('Cash on delivery')); ?>

                            </span>
                            <span id="paymentCard" class="f-bolder" style="display:none;" >
                                <svg width="22px" height="22px" viewBox="0 -4 20 20" version="1.1" class="f-fl" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#03643b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>money [#03643b]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -2923.000000)" fill="#03643b"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M292,2769 C292,2767.895 292.895,2767 294,2767 C295.105,2767 296,2767.895 296,2769 C296,2770.105 295.105,2771 294,2771 C292.895,2771 292,2770.105 292,2769 L292,2769 Z M300.343,2765 L302,2765 L302,2766.657 L300.343,2765 Z M302,2773 L300.343,2773 L302,2771.343 L302,2773 Z M286,2773 L286,2771.343 L287.657,2773 L286,2773 Z M286,2765 L287.657,2765 L286,2766.657 L286,2765 Z M297.515,2765 L301.515,2769 L297.515,2773 L290.485,2773 L286.485,2769 L290.485,2765 L297.515,2765 Z M284,2775 L304,2775 L304,2763 L284,2763 L284,2775 Z" id="money-[#03643b]"> </path> </g> </g> </g> </g></svg>
                                &nbsp;&nbsp;<?php echo e(__('Pay with card')); ?>

                            </span>
                            <span id="paymentPaypal" class="f-bolder"   style="display:none;"  >
                                <svg width="44px" height="38px" viewBox="0 -139.5 750 750" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="paypal" fill="#393939" fill-rule="nonzero"> <path d="M52.8846154,28.2035928 C39.608341,28.2035928 28.8461538,38.7262291 28.8461538,51.7065868 L28.8461538,419.293413 C28.8461538,432.274332 39.6079531,442.796407 52.8846154,442.796407 L697.115385,442.796407 C710.391473,442.796407 721.153846,432.273953 721.153846,419.293413 L721.153846,51.7065868 C721.153846,38.7266083 710.391085,28.2035928 697.115385,28.2035928 L52.8846154,28.2035928 Z M52.8846154,0 L697.115385,0 C726.322376,0 750,23.1501941 750,51.7065868 L750,419.293413 C750,447.850476 726.322653,471 697.115385,471 L52.8846154,471 C23.6766623,471 0,447.850746 0,419.293413 L0,51.7065868 C0,23.1499239 23.6769386,0 52.8846154,0 Z" id="Rectangle-1"> </path> <g id="Group" transform="translate(54.000000, 161.000000)"> <path d="M109.272795,8.45777679 C101.24875,2.94154464 90.7780357,0.176741071 77.8606518,0.176741071 L27.8515268,0.176741071 C23.8915714,0.176741071 21.7038036,2.15719643 21.2882232,6.11428571 L0.972553571,133.638223 C0.761419643,134.890696 1.07477679,136.03617 1.90975893,137.077509 C2.73996429,138.120759 3.78416964,138.639518 5.03473214,138.639518 L28.7887321,138.639518 C32.9550446,138.639518 35.2450357,136.663839 35.6653929,132.701973 L41.2905357,98.3224911 C41.4959375,96.6563482 42.2286964,95.3016518 43.4792589,94.2584018 C44.7288661,93.2170625 46.2918304,92.5358929 48.1671964,92.2234911 C50.0425625,91.9139554 51.8109286,91.7582321 53.4808929,91.7582321 C55.1460804,91.7582321 57.124625,91.8633214 59.4203482,92.0706339 C61.7103393,92.2789018 63.170125,92.3801696 63.7958839,92.3801696 C81.7145625,92.3801696 95.7793304,87.3311071 105.991143,77.2224732 C116.198179,67.1176607 121.307429,53.1063929 121.307429,35.1829375 C121.307429,22.8903571 117.293018,13.9826071 109.272795,8.45777679 Z M83.4877054,46.7484911 C82.4425446,54.0426429 79.7369732,58.8328036 75.3614375,61.1256607 C70.9849464,63.4213839 64.7340446,64.5630357 56.6087321,64.5630357 L46.2937411,64.8754375 L51.6083929,31.43125 C52.0230179,29.1412589 53.3767589,27.9948304 55.6705714,27.9948304 L61.6109821,27.9948304 C69.9416964,27.9948304 75.9881518,29.1957143 79.7388839,31.5879286 C83.4877054,33.985875 84.7382679,39.0406696 83.4877054,46.7484911 Z" id="Shape"> </path> <path d="M637.025455,0.176741071 L613.899125,0.176741071 C611.600536,0.176741071 610.24775,1.32316964 609.835036,3.61602679 L589.518411,133.639179 L589.205054,134.263982 C589.205054,135.311054 589.621589,136.296027 590.457527,137.234187 C591.285821,138.170438 592.332893,138.639518 593.581545,138.639518 L614.211527,138.639518 C618.16575,138.639518 620.354473,136.663839 620.775786,132.701973 L641.092411,4.86276786 L641.092411,4.55227679 C641.091455,1.63557143 639.732938,0.176741071 637.025455,0.176741071 Z" id="Shape"> </path> <path d="M357.599732,50.4963571 C357.599732,49.4569286 357.18033,48.4652679 356.352991,47.5290179 C355.517054,46.5918125 354.576982,46.1208214 353.539464,46.1208214 L329.471152,46.1208214 C327.174473,46.1208214 325.300063,47.1678929 323.845054,49.2457946 L290.714223,98.0072232 L276.961857,51.1230714 C275.915741,47.7917411 273.62575,46.1208214 270.086152,46.1208214 L246.640732,46.1208214 C245.596527,46.1208214 244.659321,46.5908571 243.831027,47.5290179 C242.995089,48.4652679 242.580464,49.4578839 242.580464,50.4963571 C242.580464,50.9167143 244.612509,57.0606161 248.674688,68.9376161 C252.736866,80.8174821 257.112402,93.6326429 261.801295,107.385964 C266.490188,121.13642 268.936857,128.433437 269.14608,129.261732 C252.058562,152.601107 243.51767,165.103866 243.51767,166.768098 C243.51767,169.479402 244.870455,170.832188 247.580804,170.832188 L271.648161,170.832188 C273.939107,170.832188 275.813518,169.792759 277.274259,167.70817 L356.976839,52.684125 C357.39242,52.2704554 357.599732,51.5443839 357.599732,50.4963571 Z" id="Shape"> </path> <path d="M581.704545,46.1208214 L557.947679,46.1208214 C555.029063,46.1208214 553.262607,49.5601071 552.638759,56.4367679 C547.214241,48.1050982 537.323429,43.9330536 522.942438,43.9330536 C507.940464,43.9330536 495.174027,49.5601071 484.655545,60.8123036 C474.13133,72.0645 468.872089,85.2990625 468.872089,100.508348 C468.872089,112.80475 472.465188,122.597161 479.652339,129.887491 C486.841402,137.185464 496.479045,140.827286 508.567179,140.827286 C514.608857,140.827286 520.755625,139.574813 527.006527,137.076554 C533.257429,134.576384 538.149813,131.244098 541.698964,127.07492 C541.698964,127.284143 541.48592,128.220393 541.07225,129.886536 C540.652848,131.5565 540.447446,132.808973 540.447446,133.637268 C540.447446,136.975286 541.798321,138.637607 544.511536,138.637607 L566.079679,138.637607 C570.031991,138.637607 572.32867,136.661929 572.951563,132.700063 L585.768634,51.1221161 C585.974036,49.8715536 585.660679,48.7270357 584.830473,47.6837857 C583.99358,46.6434018 582.955107,46.1208214 581.704545,46.1208214 Z M540.915571,107.696455 C535.60283,112.906018 529.19525,115.509366 521.694741,115.509366 C515.649241,115.509366 510.756857,113.845134 507.004214,110.509027 C503.251571,107.180563 501.376205,102.595804 501.376205,96.7566607 C501.376205,89.0517054 503.981464,82.5352143 509.191027,77.2224732 C514.394857,71.9087768 520.860714,69.2519286 528.570446,69.2519286 C534.400036,69.2519286 539.245607,70.9715714 543.104295,74.4079911 C546.955339,77.8472768 548.887071,82.5887143 548.887071,88.6323036 C548.886116,96.1328125 546.229268,102.489759 540.915571,107.696455 Z" id="Shape"> </path> <path d="M226.64033,46.1208214 L202.885375,46.1208214 C199.963893,46.1208214 198.196482,49.5601071 197.570723,56.4367679 C191.944625,48.1050982 182.04617,43.9330536 167.877268,43.9330536 C152.874339,43.9330536 140.109813,49.5601071 129.588464,60.8123036 C119.06425,72.0645 113.805009,85.2990625 113.805009,100.508348 C113.805009,112.80475 117.400018,122.597161 124.58908,129.887491 C131.778143,137.185464 141.41292,140.827286 153.500098,140.827286 C159.331598,140.827286 165.378054,139.574813 171.628,137.076554 C177.878902,134.576384 182.880196,131.244098 186.630929,127.07492 C185.794991,129.575089 185.380366,131.763813 185.380366,133.637268 C185.380366,136.975286 186.734107,138.637607 189.4435,138.637607 L211.009732,138.637607 C214.965866,138.637607 217.260634,136.661929 217.886393,132.700063 L230.700598,51.1221161 C230.906,49.8715536 230.594554,48.7270357 229.763393,47.6837857 C228.929366,46.6434018 227.888027,46.1208214 226.64033,46.1208214 Z M185.850402,107.851223 C180.53575,112.962384 174.02117,115.509366 166.316214,115.509366 C160.269759,115.509366 155.425143,113.845134 151.781411,110.509027 C148.132902,107.180563 146.311036,102.595804 146.311036,96.7566607 C146.311036,89.0517054 148.914384,82.5352143 154.125857,77.2224732 C159.331598,71.9087768 165.791723,69.2519286 173.504321,69.2519286 C179.335821,69.2519286 184.180438,70.9715714 188.039125,74.4079911 C191.891125,77.8472768 193.820946,82.5887143 193.820946,88.6323036 C193.820946,96.3420357 191.164098,102.751527 185.850402,107.851223 Z" id="Shape"> </path> <path d="M464.337964,8.45777679 C456.314875,2.94154464 445.847027,0.176741071 432.926777,0.176741071 L383.231964,0.176741071 C379.06183,0.176741071 376.768018,2.15719643 376.354348,6.11428571 L356.039634,133.638223 C355.8285,134.890696 356.139946,136.03617 356.975884,137.077509 C357.804179,138.120759 358.85125,138.639518 360.100857,138.639518 L385.729268,138.639518 C388.229438,138.639518 389.89558,137.286732 390.729607,134.577339 L396.357616,98.3224911 C396.563018,96.6563482 397.293866,95.3016518 398.544429,94.2584018 C399.794991,93.2170625 401.356045,92.5358929 403.233321,92.2234911 C405.108688,91.9139554 406.876098,91.7582321 408.547973,91.7582321 C410.212205,91.7582321 412.191705,91.8633214 414.483607,92.0706339 C416.776464,92.2789018 418.238161,92.3801696 418.859143,92.3801696 C436.781643,92.3801696 450.8445,87.3311071 461.055357,77.2224732 C471.265259,67.1176607 476.369732,53.1063929 476.369732,35.1829375 C476.370687,22.8903571 472.357232,13.9826071 464.337964,8.45777679 Z M432.301973,59.8750982 C427.717214,63.0000714 420.839598,64.5620804 411.673902,64.5620804 L401.670357,64.8744821 L406.985964,31.4302946 C407.398679,29.1403036 408.751464,27.993875 411.048143,27.993875 L416.67233,27.993875 C421.255179,27.993875 424.900821,28.2021429 427.614036,28.6177232 C430.319607,29.037125 432.926777,30.3364107 435.426946,32.5241786 C437.929027,34.7119464 439.177679,37.891375 439.177679,42.0576875 C439.177679,50.8106696 436.882911,56.7472589 432.301973,59.8750982 Z" id="Shape"> </path> </g> </g> </g> </g></svg>
                            </span>
                        </div>
                        <div class="col-6 pl-0 text-right">
                            <a id="linModifyPaymentMethod" href="javascript:void(0)" onClick="$('#paymentsTypeModal').modal('show')" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal pt-0"  style="display:none;"> <?php echo e(__('Modifier')); ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal" id="paymentsTypeModal" tabindex="-1" role="dialog" aria-labelledby="paymentsTypeModal" aria-hidden="true">
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
                            <div class="col-12 pr-0 pl-0">
                                <!-- Payment  Methods -->
                                <div class="cards">
                                    <div class="px-2">
                                        <div class="mt-3"><h6>Mode de paiement<span class="font-weight-light"></span></h6></div>
                                        <div class="card-body-n">
                                             <?php if(session('isBorne')): ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <svg fill="#03643b" height="64px" width="64px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 481.1 481.1" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M445.2,77.4H326V44.9c0-19.8-16.1-35.8-35.9-35.8H35.8C16,9.1,0,25.2,0,44.9v391.3C0,456,16.1,472,35.8,472h254.3 c19.8,0,35.9-16.1,35.9-35.8v-48.7h119.2c19.8,0,35.9-16.1,35.9-35.8V113.3C481,93.5,464.9,77.4,445.2,77.4z M409.9,101.4v262.1 h-23.1V101.4H409.9z M302,436.1c0,6.5-5.3,11.8-11.9,11.8H35.8c-6.5,0-11.8-5.3-11.8-11.8V44.9c0-6.5,5.3-11.8,11.8-11.8h254.3 c6.5,0,11.9,5.3,11.9,11.8V436.1z M326,101.4h36.9v262.1H326V101.4z M457,351.6c0,6.5-5.3,11.8-11.9,11.8h-11.2v-262h11.2 c6.5,0,11.9,5.3,11.9,11.8V351.6z"></path> <path d="M94.2,223.7h137.5c16.9,0,30.6-13.7,30.6-30.6v-89.9c0-16.9-13.7-30.6-30.6-30.6H94.2c-16.9,0-30.6,13.7-30.6,30.6v89.9 C63.6,210,77.3,223.7,94.2,223.7z M87.6,103.2c0-3.7,3-6.6,6.6-6.6h137.5c3.7,0,6.6,3,6.6,6.6v89.9c0,3.7-3,6.6-6.6,6.6H94.2 c-3.7,0-6.6-3-6.6-6.6V103.2z"></path> <path d="M91.5,273.5H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,273.5,91.5,273.5z"></path> <path d="M170.9,273.5H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,273.5,170.9,273.5z"></path> <path d="M250.4,273.5h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,273.5,250.4,273.5z"></path> <path d="M91.5,327.7H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,327.7,91.5,327.7z"></path> <path d="M170.9,327.7H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,327.7,170.9,327.7z"></path> <path d="M250.4,327.7h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,327.7,250.4,327.7z"></path> <path d="M91.5,381.9H75.6c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S98.1,381.9,91.5,381.9z"></path> <path d="M170.9,381.9H155c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S177.5,381.9,170.9,381.9z"></path> <path d="M250.4,381.9h-15.9c-6.6,0-12,5.4-12,12s5.4,12,12,12h15.9c6.6,0,12-5.4,12-12S257,381.9,250.4,381.9z"></path> </g> </g> </g></svg>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Errors on Stripe -->
                                                        <?php if(session('error')): ?>
                                                            <div role="alert" class="alert alert-danger"><?php echo e(session('error')); ?></div>
                                                        <?php endif; ?>

                                                        <?php if(!config('settings.is_whatsapp_ordering_mode')): ?>
                                                        <!-- COD -->
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input name="paymentType" class="custom-control-input" id="paymentApplePay" type="radio" value="applepay" ontouchstart="mPaymentChoice('applepay')" onclick="mPaymentChoice('applepay')" <?php echo e(config('settings.default_payment')=="applepay"?"checkeddd":""); ?>>
                                                            <label class="custom-control-label" for="paymentApplePay"><?php echo e(__('Apple Pay')); ?></label>
                                                        </div>
                                                        <?php if(!config('settings.hide_cod')): ?>
                                                            <div class="custom-control custom-radio mb-3">
                                                                <input name="paymentType" class="custom-control-input" id="cashOnDelivery" type="radio" value="cod" ontouchstart="mPaymentChoice('cod')" onclick="mPaymentChoice('cod')" <?php echo e(config('settings.default_payment')=="cod"?"checked":""); ?>>
                                                                <label class="custom-control-label checkout-choice-radio" for="cashOnDelivery">
                                                                    <img alt="cash icon" src="/default/logo-cash.svg" width="30" height="20">
                                                                    <span class="delTime"><?php echo e(config('app.isqrsaas')?__('Cash / Card Terminal'): __('Cash on delivery')); ?></span> 
                                                                </label>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($enablePayments): ?>

                                                            <!-- STIPE CART -->
                                                            

                                                            <!-- Extra Payments ( Via module ) -->
                                                            <?php $__currentLoopData = $extraPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo $__env->make($extraPayment.'::selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                        <?php endif; ?>

                                                        <?php endif; ?>

                                                        <!-- Payment Actions -->
                                                        <?php if(!config('settings.social_mode')): ?>

                                                        <!-- COD -->
                                                        

                                                        <!-- Extra Payments ( Via module ) -->
                                                        <?php $__currentLoopData = $extraPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo $__env->make($extraPayment.'::button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </form>

                                                        <!-- Stripe -->
                                                        

                                                        

                                                    <?php elseif(config('settings.is_whatsapp_ordering_mode')): ?>
                                                        <?php echo $__env->make('cart.payments.whatsapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php elseif(config('settings.is_facebook_ordering_mode')): ?>
                                                        <?php echo $__env->make('cart.payments.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                    <!-- END Payment Actions -->
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

      <div  class="border-top pt-3">
        <!-- Coupons -->
        <div class="row mr-0 ml-0 mt-4 mb-4">
            <div class="col-12 dDFlex pr-0 pl-0">
                <div class="col-12 p-4 text-center coupons-area">
                    <a href="javascript:void(0)" onClick="$('#couponsModal').modal('show')" class="mody-checkout-link text-primary uppercase font-semibold text-xs leading-normal">
                        <svg fill="#03643b" width="19px" height="19px" class="f-fl" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" stroke="#03643b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M80,42V33a3,3,0,0,0-3-3H38v2H36V30H23a3,3,0,0,0-3,3v9a8,8,0,0,1,0,16h0v9a3,3,0,0,0,3,3H36V68h2v2H77a3,3,0,0,0,3-3V58a8,8,0,0,1,0-16ZM38,64H36V60h2Zm0-8H36V52h2Zm0-8H36V44h2Zm0-8H36V36h2ZM51,53.62,49.13,55l-2-2.75L45,55l-1.87-1.33,2-2.9-3.11-1,.69-2.18,3,1V45.05h2.53v3.52l3-1,.68,2.18-3.11,1Zm15.84,0L65,55l-2-2.75L60.85,55,59,53.62,61,50.72l-3.11-1,.68-2.18,3,1V45.05h2.53v3.52l3-1,.69,2.18-3.11,1Z"></path></g></svg>
                        <span id="couponsLabel"><?php echo e(__('Ajouter un code de réduction')); ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal" id="couponsModal" tabindex="-1" role="dialog" aria-labelledby="couponsModal" aria-hidden="true">
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
                                <!-- Comment -->
                                <?php echo $__env->make('cart.coupons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- tempo until to resolve the vuejs issues #120 -->
        <div class="border-top pt-3" v-if="itemsCount">
            <!-- Price overview -->
            <div id="totalPrices">
                <div class="card-stats mb-4 mb-xl-0">
                    <div class="card-body-fake">
                        <div class="row mr-0 ml-0">
                            <div class="col pr-0 pl-0"><!----> 
                                <div class="col-12 dDFlex pr-0 pl-0">
                                    <div class="col-6 pr-0 pl-0">
                                        <span>Sous-total:</span>
                                    </div> 
                                    <div class="col-6 pl-0 text-right">
                                        <span class="ammount" id="itemsCountTotalPrice"><?php echo e($itemsCountTotalPrice); ?>&nbsp;€</span>
                                    </div>
                                </div> <!----> 
                                <div class="col-12 dDFlex pr-0 pl-0">
                                    <div class="col-6 pr-0 pl-0">
                                        <span><strong>TOTAL:</strong></span>
                                    </div> 
                                    <div class="col-6 pl-0 text-right">
                                        <span class="ammount"><strong><?php echo e($itemsCountTotalPrice); ?>&nbsp;€</strong></span>
                                    </div></div> 
                                    <input type="hidden" id="tootalPricewithDeliveryRaw" value="<?php echo e($itemsCountTotalPrice); ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>

        <!-- -->
        
        <div  class="border-top pt-3" v-if="itemsCount">
            <!-- Price overview -->
            <div id="totalPrices" v-cloak>
                <div class="card-stats mb-4 mb-xl-0">
                    <div class="card-body-fake">
                        <div class="row mr-0 ml-0">
                            <div class="col pr-0 pl-0">
                                <span v-if="itemsCount==0"><?php echo e(__('Cart is empty')); ?>!</span>
                                <div class="col-12 dDFlex pr-0 pl-0">
                                    <div class="col-6 pr-0 pl-0">
                                        <span v-if="itemsCount"><?php echo e(__('Subtotal')); ?>:</span>
                                    </div>
                                    <div class="col-6 pl-0 text-right">  
                                        <span v-if="itemsCount" class="ammount">{{ totalPriceFormat }}</span>
                                    </div>
                                </div>
                                <?php if(config('app.isft')||config('settings.is_whatsapp_ordering_mode')|| in_array("poscloud", config('global.modules',[])) || in_array("deliveryqr", config('global.modules',[])) ): ?>
                                <div class="col-12 dDFlex pr-0 pl-0">
                                    <div class="col-6 pr-0 pl-0 ">  
                                        <span v-if="itemsCount&&deliveryPrice>0"><?php echo e(__('Delivery')); ?>:</span>
                                    </div>
                                    <div class="col-6 pl-0 text-right"> 
                                        <span v-if="itemsCount&&deliveryPrice>0" class="ammount">{{ deliveryPriceFormated }}</span><br />
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="col-12 dDFlex pr-0 pl-0" v-if="deduct">
                                    <div class="col-6 pr-0 pl-0"> 
                                        <span v-if="deduct"><?php echo e(__('Applied coupon discount')); ?>:</span>
                                    </div>
                                    <div class="col-6 pl-0 text-right"> 
                                        <span v-if="deduct" class="ammount">{{ deductFormat }}</span>
                                    </div> 
                               </div>
                                <div class="col-12 dDFlex pr-0 pl-0">
                                    <div class="col-6 pr-0 pl-0"> 
                                    <span v-if="itemsCount"><strong><?php echo e(__('TOTAL')); ?>:</strong></span>
                                    </div>
                                    <div class="col-6 pl-0 text-right"> 
                                        <span v-if="itemsCount" class="ammount"><strong>{{ withDeliveryFormat   }}</strong></span>
                                    </div>
                                </div> 
                                <input v-if="itemsCount" type="hidden" id="tootalPricewithDeliveryRaw" :value="withDelivery" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>


        <!-- END Payment -->

        <div class="text-center d-none">
            <div class="d-none">
                <input class="custom-control-input d-none" id="privacypolicy" type="checkbox" checked="true">
                <!--<label class="custom-control-label" for="privacypolicy"><?php echo e(__('I agree to the Terms and Conditions and Privacy Policy')); ?></label>-->
                <label class="custom-control-label d-none" for="privacypolicy">
                    &nbsp;&nbsp;<?php echo e(__('I agree to the')); ?>

                    <a href="<?php echo e(config('settings.link_to_ts')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Terms of Service')); ?></a> <?php echo e(__('and')); ?>

                    <a href="<?php echo e(config('settings.link_to_pr')); ?>" target="_blank" style="text-decoration: underline;"><?php echo e(__('Privacy Policy')); ?></a>.
                </label>
            </div>
        </div>


        <div class="text-center">
            <button
                id="go_payement_btn"
                v-if="totalPrice"
                type="button"
                class="btn btn-success mt-4 paymentbutton bg-gradient-red icon-shape callOutShoppingButtonBottomCheckout mb-1 go_pay_btn_bord"
                onclick="storeOrder();"
            ><?php echo e(__('Place order')); ?></button>
        </div>

      </div>
      <br />
      <br />
    </div>
  </div>

  <?php if(config('settings.is_demo') && config('settings.enable_stripe')): ?>
    
  <?php endif; ?>
<?php /**PATH C:\laragon\www\gangnamfalafel\resources\views/cart/payment.blade.php ENDPATH**/ ?>