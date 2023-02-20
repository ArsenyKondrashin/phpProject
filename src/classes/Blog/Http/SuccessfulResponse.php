<?php declare(strict_types=1);
namespace GeekBrains\LevelTwo\classes\Blog\Http;
class SuccessfulResponse extends Response {
    protected const SUCCESS = true;
    private $data = [];
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function payload(): array {
        return ['data' => $this->data]; }
}
