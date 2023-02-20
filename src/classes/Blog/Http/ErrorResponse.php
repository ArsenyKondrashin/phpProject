<?php
namespace GeekBrains\LevelTwo\classes\Blog\Http;
// Класс неуспешного ответа
class ErrorResponse extends Response
{
    protected const SUCCESS = false;
    private $reason = 'Something goes wrong';

    protected function payload(): array {
    return ['reason' => $this->reason]; }
}