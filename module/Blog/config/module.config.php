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

    'db' => array(
        'driver' => 'Pdo',
        'username' => 'demouser',
        'password' => 'demouserpass',
        'dsn' => 'mysql:dbname=zf2app;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Blog\Mapper\PostMapperInterface' => 'Blog\Factory\ZendDbSqlMapperFactory',
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        )
    ),

     // This lines opens the configuration for the RouteManager
     'router' => array(
         // Open configuration for all possible routes
         'routes' => array(
//             // Define a new route called "post"
//             'post' => array(
//                 // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
//                 'type' => 'literal',
//                 // Configure the route itself
//                 'options' => array(
//                     // Listen to "/blog" as uri
//                     'route'    => '/blog',
//                     // Define default controller and action to be called when this route is matched
//                     'defaults' => array(
//                         'controller' => 'Blog\Controller\List',
//                         'action'     => 'index',
//                     )
//                 ),
//             ),


             'blog' => array(
                 'type' => 'literal',
                 'options' => array(
                     'route' => '/blog',
                     'defaults' => array(
                         'controller' => 'Blog\Controller\List',
                         'action' => 'index'
                     ),
                 ),

                 'may_terminate' => true,
                 'child_routes' => array(
                     'detail' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route' => '/:id',
                             'defaults' => array(
                                 'action' => 'detail'
                             ),
                             'constraints' => array(
                                 'id' => '[1-9]\d*'
                             )
                         )
                     )
                 )
             )

//Generic Route - See http://zf2.readthedocs.org/en/latest/in-depth-guide/understanding-routing.html
//
//             'default' => array(
//                'type' => 'segment',
//                 'options' => array(
//                     'route' => '/[:controller[/:action]]',
//                     'defaults' => array(
//                         '__NAMESPACE__' => 'Blog\Controller',
//                         'controller' => 'Index',
//                         'action' => 'index',
//                     )
//                 ),
//                 'constraints' => array(
//                     'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                     'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
//                 ),
//             ),

         )
     )
);