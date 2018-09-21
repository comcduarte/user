<?php 
namespace User\Model;

use Midnet\Model\DatabaseObject;

class UserModel extends DatabaseObject
{
    protected $uuid;
    protected $username;
    protected $email;
    protected $password;
    protected $status;
    protected $date_created;
    protected $date_modified;
    
    public function __construct($dbAdapter = null)
    {
        parent::__construct($dbAdapter);
        $this->table = 'user';
    }
}