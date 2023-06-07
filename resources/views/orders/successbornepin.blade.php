
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow border-0 mt-1">
            <div class="card-body text-center">
                <div class="justify-content-center text-center">
                <img alt="cash icon" src="/custom/img/payment-processing.gif" width="60" height="40">
                </div>
                <h2 class="display-2">{{ __("You're all set!") }}</h2>
                <h1 class="mb-4">
                    <span class="badge badge-primary">{{ __('Order')." #".$order->id }}</span>
                </h1>
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <h5 class="mt-0 mb-3 heading-small text-muted">
                            {{ __("Your order is created. You will be notified for further information.") }}
                        </h5>
                        <div class="mb-2">
                        <span class="h3">{{ __("Payment")}}&nbsp;{{ __("Cash") }}</span></div>
                        <a href="javascript:void(0)" onclick="hidePaymentDetailsBorneModel();" class="btn btn-outline-primary btn-sm">
                              <span class="btn-inner--icon">
                                <i class="fa fa-list-alt"></i>
                              </span>
                              <span  class="btn-inner--text">{{ __('Go back to restaurant') }}</span>
                        </a>
                        <!-- End  My Order Button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('custom') }}/js/success.js"></script>




