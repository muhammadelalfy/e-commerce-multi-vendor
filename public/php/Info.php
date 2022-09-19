<?php

    trait Info
    {
        public function setAge($age){
            $this->age = $age;
            return $this->age;
        }
        public function setGender($gender){
            $this->$gender = $gender;
            return $this->gender;
        }

    }
