<?php
class pessoaController extends Controller {

    public function index() {

        $dados = array();

        $p = new Pessoa();

        $dados['pessoas'] = $p->getPessoas();

        $this->loadTemplate('pessoa', $dados);
    }

    public function salvar() {

        $dados = array();

        $p = new Pessoa();

        $id = $nome = $cpf = $email = $datanascimento = "";

        if(isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if(isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if(isset($_POST["cpf"])) 
            $cpf = trim($_POST["cpf"]);
        if(isset($_POST["email"]))
            $email = trim($_POST["email"]);
        if(isset($_POST["datanascimento"]))
            $datanascimento = trim($_POST["datanascimento"]);
    
        if(empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if(empty($cpf)) {
            echo "<script>alert('Preencha o CPF!');history.back();</script>";
            exit;
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else if(empty($datanascimento)) {
            echo "<script>alert('Preencha a data de nascimento!');history.back();</script>";
            exit;
        } else {

            if ($p->salvar($nome, $cpf, $email, $datanascimento)){
                echo "<script>alert('Pessoa cadastrada com sucesso!');location.href='".BASE."pessoa';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
                exit;
            }
        }

        $this->loadTemplate('pessoa', $dados);
    }

    public function editar() {

        $dados = array();
        
        $p = new Pessoa();

        $id = $nome = $cpf = $email = $datanascimento = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["cpf"])) 
            $cpf = trim($_POST["cpf"]);
        if (isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if (isset($_POST["datanascimento"]))
            $datanascimento = trim($_POST["datanascimento"]);

        if(empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if(empty($cpf)) {
            echo "<script>alert('Preencha o CPF!');history.back();</script>";
            exit;
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else if(empty($datanascimento)) {
            echo "<script>alert('Preencha a data de nascimento!');history.back();</script>";
            exit;
        } else {

            if (!$p->editar($nome, $cpf, $email, $datanascimento, $id)){
                echo "<script>alert('Pessoa alterada com sucesso!');location.href='".BASE."pessoa';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
                exit;
            }
        }
    
        $this->loadTemplate('pessoa', $dados);
    }


    public function excluir($id){
        
        $dados = array();
        
        if (isset($id) && !empty($id)) {
            $id = trim($id);

            $p = new Pessoa();

            if ($p->excluir($id)) {
                echo "<script>alert('Pessoa removida com sucesso!');location.href='".BASE."pessoa';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        } 
            
        $this->loadTemplate('pessoa', $dados);
    }

}