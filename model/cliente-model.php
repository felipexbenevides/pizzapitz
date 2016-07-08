<?php
require_once 'conexao.php';

class ClienteModel {
    private $nome;
    private $sobrenome;
    private $CPF;
    private $CEP;
    private $telefone;
    private $numero;

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

    public function getCEP() {
        return $this->CEP;
    }

    public function setCEP($CEP) {
        $this->senha = $CEP;
    }    
    
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->perfil = $telefone;
    }
    
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->ativo = $numero;
    }

    public function Listar(){
        try {
            $sql = "SELECT * FROM t_cliente";
            $p_sql = Conexao::conectaBanco();
            $result = $p_sql->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);                        
        } catch (Exception $ex) {
        print "Ocorreu um erro ao tentar Listar, foi gerado um LOG";
        }
    }
    
    public function Inserir($CPF,$nome,$sobrenome,$telefone,$CEP,$numero) {
        try {
              $sql = "INSERT INTO t_cliente (    
                  CPF,
                  nome,
                  sobrenome,
                  telefone,
                  CEP,                  
                  numero)
                  VALUES(
                  :CPF,
                  :nome,
                  :sobrenome,
                  :telefone,
                  :CEP,
                  :numero)";
   
              $p_sql = Conexao::conectaBanco()->prepare($sql);
   
              $p_sql->bindValue(":CPF", $CPF);
              $p_sql->bindValue(":nome", $nome);
              $p_sql->bindValue(":sobrenome", $sobrenome);
              $p_sql->bindValue(":telefone", $telefone);
              $p_sql->bindValue(":CEP", $CEP);              
              $p_sql->bindValue(":numero", $numero);
   
              return $p_sql->execute();
          } catch (Exception $e) {
              print "Ocorreu um erro ao tentar executar INSERT, foi gerado um LOG";
          }
      }
    public function Editar($CPF,$nome,$sobrenome,$telefone,$CEP,$numero) {
        try {
            $sql = "UPDATE t_cliente set
		nome = :nome,
                sobrenome = :sobrenome,
                telefone = :telefone,
                CEP = :CEP,
                numero = :numero WHERE CPF = :CPF";

            $p_sql = Conexao::conectaBanco()->prepare($sql);

              $p_sql->bindValue(":nome", $nome);
              $p_sql->bindValue(":sobrenome", $sobrenome);
              $p_sql->bindValue(":telefone", $telefone);
              $p_sql->bindValue(":CEP", $CEP);              
              $p_sql->bindValue(":numero", $numero);
              $p_sql->bindValue(":CPF", $CPF);
            return $p_sql->execute();
        } 
        
        catch (Exception $e) {
            print "Ocorreu um erro ao tentar Alterar, foi gerado um LOG ";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage());}}
      
    
         public function Deletar($CPF) {
          try {
             $sql = "DELETE FROM t_cliente WHERE CPF = :CPF";
              $p_sql = Conexao::conectaBanco()->prepare($sql);
              $p_sql->bindValue(":CPF", $CPF);
   
              return $p_sql->execute();
          } catch (Exception $e) {
              print "Ocorreu um erro ao tentar Deletar, foi gerado um LOG";
          }
      }    
    }  
?>