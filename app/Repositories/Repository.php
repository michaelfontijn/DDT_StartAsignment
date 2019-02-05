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

    /** @var string */
    protected $class;

    /** @const string */
    private const FINDFIRST = 'findFirstBy';

    /** @const string */
    private const FIND = 'findBy';

    public function create(ModelInterface $model, array $properties): ?ModelInterface
    {
        $this->assignProperties($model, $properties);


        if (!$this->beforeCreateValidation($model)) {
            return null;
        }

        if (!$model->create()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    public function update(ModelInterface $model, array $properties): ?ModelInterface
    {
        $this->assignProperties($model, $properties);

        if (!$model->update()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    public function delete(ModelInterface $model): ?ModelInterface
    {
        if (!$model->delete()) {
            $this->error = implode(", ", $model->getMessages());
            return null;
        }

        return $model;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function hasError(): bool
    {
        return (bool)$this->error;
    }

    public function deleteMultiple(ResultSetInterface $models): bool
    {
        if (!$models->delete()) {
            $this->error = implode(", ", $models->getMessages());
            return false;
        }

        return true;
    }

    public function find(array $arguments = []): ?ResultsetInterface
    {
        return $this->class::find($arguments);
    }

    public function findFirst($arguments): ?ModelInterface
    {
        return $this->class::findFirst($arguments) ?? null;
    }

    public function count(array $arguments = []): int
    {
        return $this->class::count($arguments);
    }

    public function average(array $arguments = []): int
    {
        return $this->class::average($arguments);
    }

    public function sum(array $arguments = []): int
    {
        return $this->class::sum($arguments);
    }

    public function min(array $arguments = []): int
    {
        return $this->class::min($arguments);
    }

    public function max(array $arguments = []): int
    {
        return $this->class::max($arguments);
    }


    public function countBy(): int
    {
        //TODO: don't know yet  add to interface if required
    }

    public function sumBy(): int
    {
        //TODO: don't know yet add to interface if required
    }

    public function findBy(): void
    {
        // TODO: Implement findBy() method.
    }


    //TODO should this be moved out of here, into some sort of util class/ manager
    public function assignProperties(ModelInterface $model, array $properties): void
    {
        foreach ($properties as $key => $value) {
            $model->$key = $value;
        }
    }

    //TODO should this be moved out of here, into some sort of util class/ manager (is this required)
    public function beforeCreateValidation(ModelInterface $model): bool
    {
        //TODO implement
        return false;
        //example code----
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
        //--------
    }


}