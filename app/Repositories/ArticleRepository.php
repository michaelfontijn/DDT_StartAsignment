<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 4-2-2019
 * Time: 15:00
 */

class ArticleRepository extends  Repository
{
    /**
 * RefundRepository constructor.
 */
    public function __construct()
    {
        //TODO this should give the name of this class to the base repoClass
        parent::__construct(refund::class);
    }

    //HERE YOU CAN OVERWRITE /EXTEND THE REPO BASE FOR FUNCTIONALITY FOR THIS SPECIFIC REPO
}