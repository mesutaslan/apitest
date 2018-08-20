<?php

namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractService implements ServiceInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var $em
     */
    private $em;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function serialize($data)
    {
        return $this->container->get('jms_serializer')
            ->serialize($data, 'json');
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * {@inheritdoc}
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getService($serviceName = null)
    {
        if ($this->has($serviceName)) {
            return $this->get($serviceName);
        }
        throw new \Exception(sprintf('Service \'%s\' was not found.', $serviceName));
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository($repositoryName = null)
    {
        if ($this->has($repositoryName)) {
            return $this->get($repositoryName);
        }
    }

    public function getEntityManager()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    public function serviceResponse($data, $statusCode)
    {
        return [$data, $statusCode];
    }

}
