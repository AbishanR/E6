<?php

namespace App\test\Repository;

use App\DataFixtures\UserFixtures;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class UserRepositoryTest extends KernelTestCase
{


public function testCount()
{
// Boot the Symfony kernel
self::bootKernel();


// Access the UserRepository service using getContainer()
$userRepository = self::getContainer()->get(UserRepository::class);

// Perform the count query
$users = $userRepository->count([]);

// Assert that the count matches the expected value
$this->assertEquals(21, $users);
}
}