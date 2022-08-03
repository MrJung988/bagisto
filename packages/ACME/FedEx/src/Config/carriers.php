<?php

return [
    'fedex' => [
        'code'         => 'fedex',
        'title'        => 'FedEx',
        'description'  => 'FedEx Shipping',
        'active'       => true,
        'default_rate' => '10',
        'type'         => 'per_unit',
        'class'        => 'ACME\FedEx\Carriers\FedEx',
    ],
];