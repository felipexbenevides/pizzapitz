<?php
require_once 'conexao.php';

class FuncionarioModel {
    private $CPF;
    private $nome;
    private $sobrenome;
    private $telefone;
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->nome = $sobrenome;
    }

    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($CPF) {
        $this->email = $CPF;
    }

    public function getTelefone() {
        return $this->numero;
    }

    public function setTelefone($telefone) {
        $this->ativo = $telefone;
    }
    
    
    public function Listar(){
       
        try {
            $sql = "SELECT * FROM t_funcionarios";
            $p_sql = Conexao::conectaBanco();
            $result = $p_sql->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);        
                      
        } catch (Exception $ex) {
            print "Ocorreu um erro ao tentar Listar, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function Inserir($CPF,$nome,$sobrenome,$telefone) {
        try {
              $sql = "INSERT INTO t_funcionarios (    
                  CPF,
                  nome,
                  sobrenome,
                  telefone)
                  VALUES(
                  :CPF,
                  :nome,
                  :sobrenome,
                  :telefone)";
   
              $p_sql = Conexao::conectaBanco()->prepare($sql);
              //$p_sql->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              //$p_sql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   
              $p_sql->bindValue(":CPF", $CPF);
              $p_sql->bindValue(":nome", $nome);
              $p_sql->bindValue(":sobrenome", $sobrenome);
              $p_sql->bindValue(":telefone", $telefone);
                 
              return $p_sql->execute();
          } catch (Exception $e) {
              //echo 'Execption -> ';
              //var_dump($e ->getMessage());
          }
      }
      
       public function Editar($CPF,$nome,$sobrenome,$telefone) {
        try {
            $sql = "UPDATE t_funcionarios SET
		nome = :nome,
                sobrenome = :sobrenome,
                telefone = :telefone WHERE CPF = :CPF";

            $p_sql = Conexao::conectaBanco()->prepare($sql);

              $p_sql->bindValue(":nome", $nome);
              $p_sql->bindValue(":sobrenome", $sobrenome);
              $p_sql->bindValue(":telefone", $telefone);
              $p_sql->bindValue(":CPF", $CPF);
              return $p_sql->execute();
        } 
        
        catch (Exception $e) {
            print "Ocorreu um erro ao tentar Alterar Funcionario, foi gerado um LOG ";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());}}
      
    
            
            public function Deletar($CPF) {
                try {
                    $sql = "DELETE FROM t_funcionarios WHERE CPF = :CPF";
                    $p_sql = Conexao::conectaBanco()->prepare($sql);
                    $p_sql->bindValue(":CPF", $CPF);

                    return $p_sql->execute();
                } catch (Exception $e) {
                    print "Ocorreu um erro ao tentar Deletar, foi gerado um LOG";
                    return "Ocorreu um erro ao tentar Deletar, foi gerado um LOG";

                }
            }
        } 
    
    
    
