<?php
return array(

    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Lisxt' => 'Blog\Controller\ListController'
        )
    ),

    //The 'router' is the configuration for the RouterManager
    'router' => array(

        //all possible routes are under the 'routes' array
        'routes' => array(

            //define a new route called 'post'
            'post' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/blog',

                    //define the default controller and action for this route
                    'default' => array(
                        'controller' => 'Blog\Controller\List',
                        'action' => 'index'
                    )
                )
            )
        )
    )
);