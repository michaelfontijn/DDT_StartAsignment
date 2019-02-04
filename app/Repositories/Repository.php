<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 4-2-2019
 * Time: 15:01
 */

//a base class
class Repository implements IRepository
{
    /** @var string */
    protected $error;

    /** @var string  */
    protected $class;

    /** @const string  */
    private const FINDFIRST = 'findFirstBy';

    /** @const string  */
    private const FIND = 'findBy';


    function create(ModelInterface $model, array $properties): ?ModelInterface
    {
        $this->assignProperties($model, $properties);


        if(!$this->beforeCreateValidation($model)) {
            return null;
        }

        if(!$model->create()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    function update(ModelInterface $model, array $properties): ?ModelInterface
    {
        $this->assignProperties($model, $properties);

        if(!$model->update()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    function delete(ModelInterface $model): ?ModelInterface
    {
        if(!$model->delete()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    function getError(): string
    {
        return $this->error;
    }

    function hasError(): bool
    {
        return (bool)$this->error;
    }

    function deleteMultiple(ResultSetInterface $model): bool
    {
        if(!$model->delete()) {
            $this->error = implode(", ", $model->getMessages());
            return false;
        }

        return true;
    }

    function find($conditions): ?ModelInterface
    {
        //TODO the implementation if this method
//        //TODO Can we use modelInterface like this? ;p
//        $model = ModelInterface::findFirst([
//            conditions => "id = ?1",
//            bind => [1 => $id]
//        ]);
    }

    function findFirst($id): ?ModelInterface
    {
        //TODO Can we use modelInterface like this? ;p
        $model = ModelInterface::findFirst([
            conditions => "id = ?1",
            bind => [1 => $id]
        ]);
    }

    function count(): int
    {
        // TODO: Implement sum() method.
    }

    function sum(): int
    {
        // TODO: Implement sum() method.
    }

    function findBy(): void
    {
        // TODO: Implement findBy() method.
    }

    function average(): int
    {
        // TODO: Implement average() method.
    }

    function min(): int
    {
        // TODO: Implement min() method.
    }

    function max(): int
    {
        // TODO: Implement max() method.
    }

    function assignProperties(ModelInterface $model, array $properties): void
    {
        foreach($properties as $key => $value) {
            $model->$key = $value;
        }
    }

    function beforeCreateValidation(ModelInterface $model): bool
    {
       //TODO implement
        return false;


//        $order = $refund->relatedPurchase;
//
//        if(!$order) {
//            $this->error = 'Offer related to this purchase does not exist';
//            return false;
//        }
//
//        if(!$order->isRefundable()) {
//            $this->error = "Order is not refundable";
//            return false;
//        }
//
//        return true;
    }


}