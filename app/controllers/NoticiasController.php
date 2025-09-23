<?php
require_once __DIR__ . "/../core/Controller.php";

class NoticiasController extends Controller
{
    public function index()
    {
        $this->view("noticias/index");
        return;
    }

    public function noticia($id = null)
    {
        $this->view("noticias/noticia", ["id" => $id]);
    }

}