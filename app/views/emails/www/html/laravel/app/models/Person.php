<?php

class Person extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member';
    public $UserID;
    public $Username;
    public $Password;
    public $Name;
    public $Surname;
    public $Address;
    public $Email
    public $Phone;
    public $Office;
    public $Status
}