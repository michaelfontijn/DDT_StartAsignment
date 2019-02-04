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

    function deleteMultiple(ResultSetInterface $model): bool;

    function find($id) : ?ModelInterface;

    function findFirst($id) : ?ModelInterface;

    function count() : int;

    function sum() : int;

    function findBy() : void;

    function average() : int;

    function min() : int;

    function max() : int;

    //TODO should this be moved out of here, into some sort of util class/ manager
    function assignProperties(ModelInterface $model, array $properties) : void;

    //TODO should this be moved out of here, into some sort of util class/ manager
    function beforeCreateValidation(ModelInterface $model): bool;


}