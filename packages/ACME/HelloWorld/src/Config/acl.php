
    <?php

    return [
        /*
        |--------------------------------------------------------------------------
        | HelloWorld
        |--------------------------------------------------------------------------
        |
        | All ACLs related to HelloWorld will be placed here.
        |
        */ 
        [
            'key' => 'helloworld',
            'name' => 'HelloWorld',
            'route' => 'helloworld.admin.index',
            'sort' => 1
        ],[
            'key'        => 'helloworld.item-1',
            'name'       => 'Hello World',
            'route'      => 'helloworld.admin.index',
            'sort'       => 1,
        ], [
            'key'        => 'helloworld.item-2',
            'name'       => 'Hello World',
            'route'      => 'helloworld.admin.index',
            'sort'       => 2,
        ], [
            'key'        => 'helloworld.item-3',
            'name'       => 'Hello World',
            'route'      => 'helloworld.admin.index',
            'sort'       => 3,
        ],
];