<?php

namespace GeekBrains\LevelTwo\classes\Blog\Http;
class Request {
    private $get;
    private $server;
    private $body;

    /**
     * @param $get
     * @param $server
     * @param $body
     */
    public function __construct($get, $server, $body)
    {
        $this->get = $get;
        $this->server = $server;
        $this->body = $body;
    }


    public function method(): string {
        return $this->server['REQUEST_METHOD'];
    }

    public function jsonBody(): array
    {
         $data = json_decode(
            $this->body,
             true
        );
    return $data; }

    public function jsonBodyField(string $field) {
        $data = $this->jsonBody();
        return $data[$field]; }

    public function path(): string
    {

        $components = parse_url($this->server['REQUEST_URI']);
        return $components['path'];
    }
    public function query(string $param): string {

        $value = trim($this->get[$param]);
        return $value; }


    public function header(string $header): string {
        $headerName = mb_strtoupper("http_". str_replace('-', '_', $header));
        $value = trim($this->server[$headerName]);
        return $value; }
}