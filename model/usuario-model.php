<?php
require_once 'conexao.php';

class UsuarioModel {
    private $CPF;
    private $nome;
    private $senha;
        
    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($CPF) {
        $this->email = $CPF;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->nome = $senha;
    }
    public function CheckGerente($CPF){
       
        try {
            $sql = "SELECT senha, nome, gerente FROM t_usuarios WHERE CPF = $CPF";
            $p_sql = Conexao::conectaBanco();
            $result = $p_sql->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);   

                      
        } catch (Exception $ex) {
            print "Ocorreu um erro ao tentar Checar, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }        
    public function Check($CPF){
       
        try {
            $sql = "SELECT senha, nome FROM t_usuarios WHERE CPF = $CPF";
            $p_sql = Conexao::conectaBanco();
            $result = $p_sql->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);   

                      
        } catch (Exception $ex) {
            print "Ocorreu um erro ao tentar Listar, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }    
    public function Listar(){
       
        try {
            $sql = "SELECT * FROM t_usuarios";
            $p_sql = Conexao::conectaBanco();
            $result = $p_sql->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);        
                      
        } catch (Exception $ex) {
            print "Ocorreu um erro ao tentar Listar, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function Inserir($CPF,$nome,$senha) {
        try {
              $sql = "INSERT INTO t_usuarios (    
                  CPF,
                  nome,
                  senha)
                  VALUES(
                  :CPF,
                  :nome,
                  :senha)";
   
              $p_sql = Conexao::conectaBanco()->prepare($sql);
                 
              $p_sql->bindValue(":CPF", $CPF);
              $p_sql->bindValue(":nome", $nome);
              $p_sql->bindValue(":senha", $senha);
                              
              return $p_sql->execute();
              
          } catch (Exception $e) {
              //echo 'Execption -> ';
              //var_dump($e ->getMessage());
          }
      }
    
      
      
      
      
      
      
      
      
      
    }  
?>