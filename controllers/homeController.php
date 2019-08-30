<?php
class homeController extends Controller {

    public function index() {

        $dados = array();

        $p = new Pessoa();

        $this->loadTemplate('home', $dados);
    }
}