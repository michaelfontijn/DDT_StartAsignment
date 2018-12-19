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


    /*** Gets the creation date of the article and formats it to a representational format of (day - Name of month - year)
     * @return string  A string containing a representational format of creationDate
     * @throws Exception
     */
    public function getCreationDate(){
        $date = new DateTime($this->creationDate);
        $monthName = $date->format('d F Y');
        return strtoupper ($monthName);
    }
}