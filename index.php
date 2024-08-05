<?php 
    //Require Network class
    require_once __DIR__ . '/Models/Network.php';


    //All networks arrays
    $first_arr = [
        [ 'from' => 0, 'to' => 1, 'status' => 0 ],
        [ 'from' => 1, 'to' => 2, 'status' => 0 ],
        [ 'from' => 2, 'to' => 3, 'status' => 1 ],
        [ 'from' => 0, 'to' => 4, 'status' => 0 ],
        [ 'from' => 4, 'to' => 5, 'status' => 1 ]
    ];
    
    $second_arr = [
        [ 'from' => 0, 'to' => 1, 'status' => 0 ],
        [ 'from' => 1, 'to' => 2, 'status' => 0 ],
        [ 'from' => 2, 'to' => 3, 'status' => 1 ],
        [ 'from' => 0, 'to' => 4, 'status' => 1],
        [ 'from' => 4, 'to' => 5, 'status' => 1 ]
    ];

    $third_arr = [
        ['from' => 0, 'to'=> 1, 'status' => 0],
        ['from' => 1, 'to'=> 2, 'status' => 0],
        ['from' => 2, 'to'=> 3, 'status' => 0],
        ['from' => 3, 'to'=> 4, 'status' => 1],
        ['from' => 3, 'to'=> 5, 'status' => 0],
        ['from' => 5, 'to'=> 6, 'status' => 1],
        ['from' => 2, 'to'=> 7, 'status' => 0],
        ['from' => 7, 'to'=> 8, 'status' => 1],
        ['from' => 1, 'to'=> 9, 'status' => 0],
        ['from' => 9, 'to'=> 10, 'status' => 0],
        ['from' => 10, 'to'=> 11, 'status' => 1],
        ['from' => 10, 'to'=> 12, 'status' => 0]     
    ];

    //Create a network class object
    
    //First Array
    echo '<pre>';
    print_r('first array');
    echo '</pre>';

    $network = new Network($first_arr);
    $path = $network->findPath();

    echo '<pre>';
    print_r($path);
    echo '</pre>';

    //Second Array
    echo '<pre>';
    print_r('second array');
    echo '</pre>';

    $network->setData($second_arr);
    $path = $network->findPath();

    echo '<pre>';
    print_r($path);
    echo '</pre>';

    //Third Array
    echo '<pre>';
    print_r('third array');
    echo '</pre>';

    $network->setData($third_arr);
    $path = $network->findPath($third_arr);
    

    echo '<pre>';
    print_r($path);
    echo '</pre>';

?>