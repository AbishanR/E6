<?php

namespace App\Tests\Entity;

use DateTime;
use App\Entity\InvitationCode;

USE Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;    

class InvitationCodeTest extends KernelTestCase
{
public function testValidEntity (){
    $code  = (new InvitationCode())
    ->setCode('12345')
    ->setDescription('Description de test')
    ->setExpireAt(new DateTime());
self::bootKernel();
$error = self::$container->get('validator')->validate($code);
$this->assertCount(0, $error);
}
}