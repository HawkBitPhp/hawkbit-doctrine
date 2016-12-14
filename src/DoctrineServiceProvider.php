<?php
/**
 * Created by PhpStorm.
 * User: marco.bunge
 * Date: 14.10.2016
 * Time: 13:40
 */

namespace Hawkbit\Doctrine;


use League\Container\Container;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class DoctrineServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    protected $provides = [
        DoctrineServiceInterface::class
    ];
    /**
     * @var DoctrineService
     */
    private $persistenceService;
    /**
     * @var bool
     */
    private $delegate;

    /**
     * PersistenceServiceProvider constructor.
     * @param DoctrineService $persistenceService
     * @param bool $delegate
     */
    public function __construct(DoctrineService $persistenceService, $delegate = false)
    {
        $this->persistenceService = $persistenceService;
        $this->delegate = (bool)$delegate;
    }

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $this->getContainer()->share(DoctrineServiceInterface::class, $this->persistenceService);
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        $container = $this->getContainer();

        if ($container instanceof Container && $this->delegate) {
            $container->delegate($this->persistenceService->getContainer());
        }
    }
}