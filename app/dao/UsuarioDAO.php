<?php
/*
    Criação da classe Usuario com o CRUD
*/
class UsuarioDAO{
    
    public function create(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (                   
                  nome, idade, nota1, nota2, nomeProfessor, numeroSala)
                  VALUES (
                  :nome, :idade, :nota1, :nota2, :nomeProfessor, :numeroSala)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":nota1", $usuario->getNota1());
            $p_sql->bindValue(":nota2", $usuario->getNota2());
            $p_sql->bindValue(":nomeProfessor", $usuario->getNomeProfessor());
            $p_sql->bindValue(":numeroSala", $usuario->getNumeroSala());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM usuario order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Usuario $usuario) {
        try {
            $sql = "UPDATE usuario SET
                nome = :nome,
                idade = :idade,
                nota1 = :nota1,
                nota2 = :nota2,
                nomeProfessor = :nomeProfessor,
                numeroSala = :numeroSala
                WHERE id = :id";
                
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":nota1", $usuario->getNota1());
            $p_sql->bindValue(":nota2", $usuario->getNota2());
            $p_sql->bindValue(":nomeProfessor", $usuario->getNomeProfessor());
            $p_sql->bindValue(":numeroSala", $usuario->getNumeroSala());
            $p_sql->bindValue(":id", $usuario->getId());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            // Você pode lidar com o erro de uma maneira mais apropriada aqui, como registrar em um arquivo de log ou lançar uma exceção personalizada.
            print "Ocorreu um erro ao tentar fazer Update: " . $e->getMessage();
        }
    }
    
    public function delete(Usuario $usuario) {
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    

    private function listaUsuarios($row) {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setIdade($row['idade']);
        $usuario->setNota1($row['nota1']);
        $usuario->setNota2($row['nota2']);
        $usuario->setNomeProfessor($row['nomeProfessor']);
        $usuario->setNumeroSala($row['numeroSala']);

        return $usuario;
    }
 }

 ?>
