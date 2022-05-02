<?php


namespace App\Users;

use Ramsey\Uuid;

/**
 * Class CurrentUser
 * @package App\Users
 */
class CurrentUser {

    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getCurrentUser() {
        return $this;
    }

    public function generateUserUniqueID() {
        $this->id = Uuid\Uuid::uuid4();
        return $this->id;
    }
}