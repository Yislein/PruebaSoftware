
<?php
//Patron de diseño singleton
//La clase Database definira el metodo getIntence(Obtener instancia)
//El cual va permitir poder acceder a la misma instancia de una conexion
// de la base de datos a traves del sistema
class Database {
    //El campo para almacenar la instancia singleton se tiene que declarar estatico
    private static $instance;

    //El constructor del sigleton tiene que estar privado
    //Esto es para evitar las llamadas de construccion directas con el operador NEW
    //En nuestro caso para la conexion a la base de datos
    private $connection;

    //Este método es el constructor de la clase Database y se declara como privado, lo que significa que no se puede instanciar directamente desde fuera de la clase. En el constructor se establece la conexión a la base de datos utilizando los datos de usuario, contraseña, host y nombre de la base de datos proporcionados.
    private function __construct() {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $dbname = "comedor";

        //This hara referencia al objeto actual
        $this->connection = new mysqli($host, $user, $pass, $dbname);

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }


    //Este es un método estático de la clase Database. Su propósito es proporcionar una única instancia de la clase Database utilizando el patrón Singleton. Verifica si ya existe una instancia (self::$instance), y si no existe, crea una nueva instancia llamando al constructor privado (new Database()) y la guarda en la variable estática $instance. Luego, devuelve esta instancia
    public static function getInstance() {

        //Recuerda que self hara referencia a la clase actual, el cual lo utilizamos para que no se genere una instancia de la misma ya que estamos tambien usando el metodo instance de manera estatica
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    //Este método público permite obtener la conexión a la base de datos almacenada en la variable $connection. Retorna la instancia de la conexión almacenada en el objeto
    public function getConnection() {
        return $this->connection;
    }
}

?>