<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 4-2-2019
 * Time: 14:58
 */

Interface IRepository
{
    /**
     * Function to create a model
     * @param ModelInterface $model
     * @param array $properties
     * @return null|ModelInterface
     */
    function create(ModelInterface $model, array $properties): ?ModelInterface;

    /**
     * Function to update a model
     * @param ModelInterface $model
     * @param array $properties
     * @return null|ModelInterface
     */
    function update(ModelInterface $model, array $properties): ?ModelInterface;

    /**
     * Function to delete a model
     * @param ModelInterface $model
     * @return null|ModelInterface
     */
    function delete(ModelInterface $model): ?ModelInterface;

    /**
     * Function to return the error string:
     * @return string
     */
    function getError(): string;

    /**
     * Function to check if an error has been set
     * @return bool
     */
    function hasError(): bool;

    /**
     * Function to delete multiple models at once
     * @param ResultSetInterface $model A collection of models that should be deleted
     * @return bool
     */
    function deleteMultiple(ResultSetInterface $model): bool;

    /**
     * Retrieves all models matching the supplied arguments
     * @param array $arguments
     * @return null|ResultsetInterface
     */
    function find(array $arguments) : ?ResultsetInterface;

    /**
     * Retrieves the first model matching the supplied arguments
     * @param array $arguments
     * @return ModelInterface|null
     */
    function findFirst(array $arguments) : ?ModelInterface;

    /**
     * Function to count the ammount of records pressent matching the supplied arguments
     * @param array $arguments
     * @return int
     */
    function count(array $arguments) : int;


    function sum(array $arguments) : int;

    function average(array $arguments) : int;

    function min(array $arguments) : int;

    function max(array $arguments) : int;

    function findBy() : void;



    //TODO should this be moved out of here, into some sort of util class/ manager
    function assignProperties(ModelInterface $model, array $properties) : void;

    //TODO should this be moved out of here, into some sort of util class/ manager
    function beforeCreateValidation(ModelInterface $model): bool;


}