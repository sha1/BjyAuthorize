<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace BjyAuthorize\Service;

use BjyAuthorize\Provider\Role\LaminasDb;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Factory responsible of instantiating {@see \BjyAuthorize\Provider\Role\LaminasDb}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class LaminasDbRoleProviderServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LaminasDb(
            $container->get('BjyAuthorize\Config')['role_providers']['BjyAuthorize\Provider\Role\LaminasDb'],
            $container
        );
    }

    /**
     * {@inheritDoc}
     *
     * @return \BjyAuthorize\Provider\Role\LaminasDb
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, LaminasDb::class);
    }
}
