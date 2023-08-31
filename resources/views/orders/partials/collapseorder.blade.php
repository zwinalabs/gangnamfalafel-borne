

<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-6">
                <h3 class="mb-0">{{ "#".$order->sale_id_hiboutik." - ".$order->created_at->locale(Config::get('app.locale'))->isoFormat('LLLL') }}</h3>
            </div>
            <div class="col-6 text-right">
                    <h3 class="badge badge-success badge-pill small" style="color:#03643b">{{ __("Hiboutik sale").": #".$order->sale_id_hiboutik}}</h3>
            </div>
        </div>
    </div>
    @include('orders.partials.orderinfo')
    @include('orders.partials.actions.buttons',['order'=>$order])
</div>
