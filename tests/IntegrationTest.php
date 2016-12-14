<?php
/**
 * Created by PhpStorm.
 * User: marco.bunge
 * Date: 18.10.2016
 * Time: 15:07
 */

namespace Hawkbit\Doctrine\Tests;


use ContainerInteropDoctrine\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;
use Hawkbit\Application;
use Hawkbit\Doctrine\DoctrineService;
use Hawkbit\Doctrine\DoctrineServiceInterface;
use Hawkbit\Doctrine\DoctrineServiceProvider;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testIntegration()
    {
        $app = new Application(require __DIR__ . '/assets/config.php');

        $entityFactoryClass = EntityManagerFactory::class;

        $persistenceService = new DoctrineService([
            DoctrineService::resolveFactoryAlias($entityFactoryClass) => [$entityFactoryClass]
        ], $app);

        $app->register(new DoctrineServiceProvider($persistenceService));

        $this->assertTrue(isset($app[DoctrineServiceInterface::class]));

        /** @var DoctrineServiceInterface $appPersistenceService */
        $appPersistenceService = $app[DoctrineServiceInterface::class];
        $this->assertInstanceOf(DoctrineServiceInterface::class, $appPersistenceService);
        $this->assertInstanceOf(EntityManagerInterface::class, $appPersistenceService->getEntityManager());
    }
}
