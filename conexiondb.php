
<?php
class conexiondb{
    private String $servername;
    private String $user;
    
    private String $password;
    private String $dbname;
    private $conn;

    public function __construct()
    {
        $this->servername="localhost";
        $this->user="root";
        $this->password="";
        $this->dbname="login";
    }
    public function connect(){
        try{//Mezclar las sustancias
            $this->conn = new PDO('mysql:host=' .$this->servername.'; dbname='.
            $this->dbname, $this->user, $this->password);
            $this->conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error)
        {
            print "¡¡¡ERRRORR!!! :" .$error-> getMessage()."<br/>";
        }
        return $this->conn;
 
    }
    public function cerrarConeccion(){
        $this->conn=null;
    }
    }
?>