<?php
class Pessoa extends Model {
    
    public function salvar($nome, $cpf, $email, $datanascimento) {
        $sql = $this->pdo->prepare("INSERT INTO pessoa (id, nome, cpf, email, datanascimento) VALUES (NULL, ?, ?, ?, ?)");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $cpf);
        $sql->bindParam(3, $email);
        $sql->bindParam(4, $datanascimento);
        
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    } 

	public function editar($nome, $cpf, $email, $datanascimento, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE pessoa SET nome = ?, cpf= ?, email = ?, datanascimento = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $cpf);
        $sql->bindParam(3, $email);
        $sql->bindParam(4, $datanascimento);
        $sql->bindParam(5, $id);
        $sql->execute();

        return $dados;
    }

    public function excluir($id) {
        $sql = $this->pdo->prepare("DELETE FROM pessoa WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPessoas() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT id,nome,cpf,email,datanascimento FROM pessoa");
        
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
    }

}