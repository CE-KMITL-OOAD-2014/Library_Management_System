<?php

class Book extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book';
    public $BookID;
    public $Title1; //Title(Thai)
    public $Title2; //Title(English)
    public $Subject;
    public $Author;
    public $Publishing;
    public $Edition;
    public $Year;
    public $Detail;
    public $ISBN
    public $CallNum;
    public $Type;
    public $SubType;
    public $Status;
}