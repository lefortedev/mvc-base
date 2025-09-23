<?php

class HttpErrorController extends Controller
{
    public function Aunauthorized()
    {
        $this->view("errors/403");
    }

    public function notFound()
    {
        http_response_code(404);

        $this->view("error/404");
    }

    public function nnternalServerError()
    {
        http_response_code(500);
        $this->view("error/500");
    }
}