<?php
namespace Album;

use Album\Model\AlbumTable;
use Album\Model\Album;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\EventManager\EventInterface;
use Zend\Db\TableGateway\TableGateway;


class Module
    implements \Zend\ModuleManager\Feature\InitProviderInterface,
    \Zend\ModuleManager\Feature\LocatorRegisteredInterface,
    \Zend\ModuleManager\Feature\BootstrapListenerInterface,
    \Zend\ModuleManager\Feature\ServiceProviderInterface
{

    //See: http://zf2.readthedocs.org/en/latest/modules/zend.module-manager.module-manager.html#zend-module-manager-module-manager-module-manager-listeners
    public function init(ModuleManagerInterface $manager) {
        //echo "<!-- Called at " . __METHOD__  . "<br /> -->";
    }

    //See: http://zf2.readthedocs.org/en/latest/modules/zend.module-manager.module-manager.html#zend-module-manager-module-manager-module-manager-listeners
    public function onBootstrap(EventInterface $e) {
        //echo "<!-- Called at " . __METHOD__  . "<br /> -->";
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
                ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' => function($sm) {
                    $tableGateway = $sm->get('AlbumTableGateway');
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },

                'AlbumTableGateway' => function($sm) {
                    $dbAdapter  = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);

                }
            )
        );


    }

}
