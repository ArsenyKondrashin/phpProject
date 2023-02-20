<?php

namespace GeekBrains\LevelTwo\classes\Blog\Http\Actions\Users;
use GeekBrains\LevelTwo\classes\Blog\Http\SuccessfulResponse;
class FindByUsername {
    private $usersRepository;

// Функция, описанная в контракте

    /**
     * @param $usersRepository
     */
    public function __construct($usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function handle( $request) {

        $username = $request->query('username');

        $user = $this->usersRepository->getByUsername($username);
        return new SuccessfulResponse([
            'username' => $user->getUsername(),
            'name' => $user->getFirstname() . ' ' . $user->getLastname(),
        ]); }
}