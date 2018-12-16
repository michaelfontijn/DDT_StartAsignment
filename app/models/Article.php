<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 16-12-2018
 * Time: 20:43
 */


use Phalcon\Mvc\Model;
class Article extends Model
{
    public $id;
    public $creationDate;
    public $title;
    public $summary;
    public $content;
}