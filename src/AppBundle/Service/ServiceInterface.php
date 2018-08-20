<?php

namespace AppBundle\Service;

interface ServiceInterface
{

    /**
     * Returns true if the service id is defined.
     *
     * @param string $id The service id
     *
     * @return Boolean true if the service id is defined, false otherwise
     */
    public function has($id);

    /**
     * Gets a service by id.
     *
     * @param string $id The service id
     *
     * @return object The service
     */
    public function get($id);

    /**
     * Gets a service.
     *
     * @param string $serviceName The service name
     *
     * @return object The service
     *
     */
    public function getService($serviceName = null);

    /**
     * Gets a repository service.
     *
     * @param string $repositoryName The repository name
     *
     * @return object The service
     *
     */
    public function getRepository($repositoryName = null);


    public function serialize($data);


    public function serviceResponse($data, $statusCode);

}
