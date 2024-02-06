<?php

class Person {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }
}

class Staff {
    protected $members = [];

    public function __construct($members = []) {
        $this->members = $members;
    }

    public function add(Person $person) {
        $this->members[] = $person;
    }
}

class Business {
    protected $staff;

    public function __construct(Staff $staff) {
        $this->staff = $staff;
    }

    public function hire(Person $person) {
        $this->staff->add($person);
    }
}

$jeffrey = new Person('Jeffrey Way');
$staff = new Staff;
$laracasts = new Business($staff);
$laracasts->hire($jeffrey);
var_dump($staff);

?>
