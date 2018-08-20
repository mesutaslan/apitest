<?php

namespace AppBundle\Repository\MainRepo;

use Doctrine\Common\Persistence\ObjectRepository;

interface EntityRepositoryInterface extends ObjectRepository
{

    /**
     * Create a new resource
     *
     * @return mixed
     */
    public function createNew();

    /**
     * Persist entity to database and flush it
     *
     * @param $entity
     * @return void
     */
    public function save($entity);

    /**
     * Persist or merge entity to database and flush it also return new entity
     *
     * @param $entity
     * @return $newEntity
     */
    public function saveOrUpdate($entity);

    /**
     * Deletes entity from database
     *
     * @param $entity
     * @return boolean
     */
    public function delete($entity);

    /**
     * Deletes entity from database with id
     *
     * @param $id
     * @return boolean
     */
    public function deleteById($id);

}
