<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 16-12-2018
 * Time: 20:43
 */


use Phalcon\Validation;
use Phalcon\Validation\Validator\StringLength as StringLength;

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



    public function validation(){
        $validator = new Validation();

        $validator->add(
            "title",
            new StringLength([
                "max"            => 150,
                "messageMaximum" => "The title cannot be longer than 150 characters, adjust the title and try again.",
            ])
        );

        $validator->add(
            "summary",
            new StringLength([
                "max"            => 400,
                "messageMaximum" => "The summary cannot be longer than 400 characters, adjust the summary and try again.",
            ])
        );

        $validator->add(
            "content",
            new StringLength([
                "max"            => 4000,
                "messageMaximum" => "The content cannot be longer than 4000 characters, adjust the content and try again.",
            ])
        );

        return $this->validate($validator);
    }
}