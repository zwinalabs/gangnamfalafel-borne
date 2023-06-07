<?php

return [
    'name' => 'Borne E-monétique',
    'useVendor'=>env('VENDORS_OR_ADMIN_STRIPE','admin')=="vendor",
    'useAdmin'=>env('VENDORS_OR_ADMIN_STRIPE','admin')=="admin",
    'enabled'=>env('IS_BORNE_PAYMENT_ENABLED',true),
];
