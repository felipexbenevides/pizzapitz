 <?php
class Conexao {
   
    public static function conectaBanco() {
       
        try{
            $banco = new PDO('mysql:host=localhost;dbname=pizza','root','') or print (mysql_error());
            return $banco;
        }
        
        catch ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();}
}
          
   

}
?>