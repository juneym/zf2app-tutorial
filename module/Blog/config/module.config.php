<?php
return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),

    'controllers' => array(

        //An invokable is a class that can be constructed without any arguments.
        //See: http://zf2.readthedocs.org/en/latest/in-depth-guide/services-and-servicemanager.html
        //since ListController will now depend on Post model, we'll need to shift from "invokables" to "factories"
        'factories' => array(
            'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
        )
    ),

    'service_manager' => array(
        'invokables' => array(
            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
        )
    ),

     // This lines opens the configuration for the RouteManager
     'router' => array(
         // Open configuration for all possible routes
         'routes' => array(
             // Define a new route called "post"
             'post' => array(
                 // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                 'type' => 'literal',
                 // Configure the route itself
                 'options' => array(
                     // Listen to "/blog" as uri
                     'route'    => '/blog',
                     // Define default controller and action to be called when this route is matched
                     'defaults' => array(
                         'controller' => 'Blog\Controller\List',
                         'action'     => 'index',
                     )
                 )
             )
         )
     )
);