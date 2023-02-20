<?php
namespace GeekBrains\Blog\UnitTests;
use GeekBrains\LevelTwo\classes\Blog\Repositories\UsersRepositoryInterface;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Person\User;
use PHPUnit\Framework\TestCase;
class UsersRepositoryTest extends TestCase
{
    public function testItSavesUsers()
    {
        $usersRepository = new class implements UsersRepositoryInterface {
            private $called = false;
            public function save($user)
            {
                $this->called = true;
            }
            public function get(UUID $uuid)
            {
                // TODO: Implement get() method.
            }
            public function wasCalled()
            {
                return $this->called;
            }
        };
        $user = new User(1, 'Arseny', 'Kondrashin');
        $usersRepository->save($user);
        $this->assertTrue($usersRepository->wasCalled());
    }


}