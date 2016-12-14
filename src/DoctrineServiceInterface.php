<?php
/**
 * Created by PhpStorm.
 * User: marco.bunge
 * Date: 14.10.2016
 * Time: 13:42
 */

namespace Hawkbit\Doctrine;


use Doctrine\ORM\EntityManager;
use Hawkbit\Application;
use League\Container\ContainerAwareInterface;

interface DoctrineServiceInterface
{
    const DEFAULT_CONNECTION_NAME = 'orm_default';

    /**
     * PersistenceService constructor.
     * @param array $factories
     * @param Application $application
     */
    public function __construct(array $factories = [], Application $application);

    /**
     * Get entity manager for connection
     *
     * @param $connection
     * @return EntityManager
     */
    public function getEntityManager($connection = self::DEFAULT_CONNECTION_NAME);

    /**
     * Get the container
     *
     * @return \League\Container\ContainerInterface
     */
    public function getContainer();
}