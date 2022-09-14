<?php

use PHPUnit\Framework\TestCase;

    class UserTest extends TestCase {
        public function testsetMail(){
            $this->assertNotsame($mail,User::getMail($mail));
        }
    }