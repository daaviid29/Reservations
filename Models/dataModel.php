<?php

    // Cargamos el fichero config donde tenemos la conexión para poder acceder a la base de datos
    require_once 'Config/Config.php';
    // Cargamos el autoload de composer
    require_once 'vendor/autoload.php';

    Class dataModel{
        // Atributo de la clase dataModel (Solo tiene un atributo que es DB ya que esta clase se encarga de instanciar la conexión, para usarla en el resto de models)
        public $db;

        // Crearemos un constructor, en el cual inicializaremos la clase Config y lo guardaremos en la variable db de esta clase para poder utilizarla en el resto
        // de Modelos y en esta misma clase.
        public function __construct() {
            // Almacenamos en la variable db el resultado obtenido de la clase Config, en el método conexion
            $this->db = Config::conexion();
        }
        
        // Método para comprobar si existe una conexión
        public function closeConnection() {
            // Si la variable db tiene contenido, quiere decir que existe una conexión puesto que la variable la instanciamos en el contructor.
            if ($this->db){
                // Si existe la conexión accedemos al método close() que se encargará de cerrar la conexión.
                $this->db->close();  
            } 
        }

        // Método para Consultas de Datos (Abstracción de datos), no dependemos del SGBD (Sistema Gestor de Base de Datos) puesto que la consulta la convertimos
        // en un array de PHP para utilizarlo de manera independiente. (el método recibe un parámetro, la consulta a ejecutar)
        function dataQuery($sql) {
            // Utilizamos el this para referirnos al atributo de la clase y ejecutamos el método query que tenemos en el atributo puesto que guarda un objeto
            // de tipo mysqli, en dicho objeto le pasamos una variable SQL que es la consulta que queremos ejecutar que nos llega como parámetro, guardamos el
            // resultado de esa consulta en una variable llamada res, la cual utilziaremos posteriormente.
            $res = $this->db->query($sql);
            //Creamos un array de PHP el cual rellenaremos con los datos de la consulta que ejecutemos.
            $resArray = array();
            
            // Comprobamos si la variable res contiene información, ya que puede ser que no tenga ningun registro en la tabla.
            if ($res) {
                // En caso de devolver contenido en la variable res haremos un while en el cual asignaremos a la variable fila, cada uno de los resultados de la
                // variable res en cada iteracción hasta que no quede ninguna fila.
                while ($fila = $res->fetch_object()) {
                    // Igualamos la variable fila que estamos modificado en el while, a la variable resArray, pero al tener múltiples filas necesitamos que cada una
                    // se guarde como un array dentro del array, para que podamos utilizarla posteriormente con índices.
                    $resArray[] = $fila;
                }
            }
            // por último, devolvemos la variable resArray para poder ser utilizada en el resto de métodos
            return $resArray;
        }

        // Método para inserción de datos (Abstracción de datos), no dependemos del SGBD (Sistema Gestor de Base de Datos) puesto que la consulta la convertimos
        // en un array de PHP para utilizarlo de manera independiente. (el método recibe un parámetro, la consulta a ejecutar)
        function dataManipulation($sql) {
            // Utilizamos el this para referirnos al atributo de la clase y ejecutamos el método query que tenemos en el atributo puesto que guarda un objeto
            // de tipo mysqli, en dicho objeto le pasamos una variable SQL que es la consulta que queremos ejecutar que nos llega como parámetro
            $this->db->query($sql);
            // por último, devolvemos el número de filas que han sido afectadas, en la consulta.
            return $this->db->affected_rows;
        }
        /*
        // Método Get para la obtención de datos de las tablas (Recibe 2 parámetros), tabla = nombre de la tabla donde se desea consultar, id = es un parámetro
        // opcional, puede ir o no en el método, no es obligatorio que vaya.
        public function get($tabla, $id = null){
            // Instanciamos una variable result a cadena vacía, esta será la que utilicemos para devolverla en el return
            $result = "";
            // Comprobamos si la variable id es null, en caso de que sea null, lo que queremos es devolver el resultado de la tabla completa.
            if(is_null($id)){
                // Creamos una variable SQL en la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla";
                // en la variable result que creamos e inicializamos anteriormente guardamos el resultado del método dataQuery el cual recibe un parámetro
                // que es la consulta que queremos ejecutar.
                $result = $this->dataQuery($sql);
            }else{
                // Si la variable id no está vacía, es que queremos mostrar un único registro en la base de datos para ello, creamos una variable SQL en 
                // la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla WHERE id = $id";
                // en la variable result que creamos e inicializamos anteriormente guardamos el resultado del método dataQuery el cual recibe un parámetro
                // que es la consulta que vamos ejecutar.
                $result = $this->dataQuery($sql);
            }
            // Devolvemos el resultado de la variable result, ya sea con los datos de toda la tabla o con los de un registro en concreto.
            return $result;
        }*/

        public function get($tabla, $id = null){
            // Comprobamos si la variable id es null, en caso de que sea null, lo que queremos es devolver el resultado de la tabla completa. paginada
            if(is_null($id)){
                // Creamos una variable SQL en la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla";
                // en la variable result guardamos el resultado del método dataQuery el cual recibe un parámetro que es la consulta que queremos ejecutar.
                $result = $this->dataQuery($sql);
                // en la variable numero_elementos almacenaremos el NÚMERO TOTAL DE REGISTROS que devuelve la consulta anterior
                $numero_elementos = count($result);
                // en la variable numero_elementos_pagina indicaremos cuantos registros por página queremos mostrar en este caso son 50 registros
                $numero_elementos_pagina = 50;
                // Instanciamos el objeto Zebra_Pagination el cual lo hemos descargado anteriormente por composer y se encuentra en la carpeta vendor
                // todo lo necesario de esta librería
                $pagination = new Zebra_Pagination();
                // accedemos al objeto pagination que creamos anteriormente y le vamos a decir el número de elementos totales que tenemos en la primera consutla
                $pagination->records($numero_elementos);
                // accedemos al objeto pagination que creamos anteriormente y le vamos a decir el número de elementos que queremos mostrar por página
                $pagination->records_per_page($numero_elementos_pagina);
                // almacenamos en una variable page el número de actual de la página en la que nos encontramos, en la vista
                // por ejemplo, si le hemos dado a siguiente ya no sería la página 1 si no la página 2 por ello necesitamos almacenarlo para saber en que página
                // estamos en cada momento e ir descontando los elementos que se mostraron en la págnia anterior
                $page = $pagination->get_page();
                // almacenamos en una variable empezar en el número donde debe empezar a mostrar los registros, esto se hace por que si ya mostramos los
                // 50 primeros en la primera página pues que en la segunda página se muestre del 51 en adelante este inclusive
                $empezar = (($page - 1) * $numero_elementos_pagina);
                // Por último consutrimos la consulta final que vamos a ejecutar y a enviar al controlador en esta caso con LIMIT decimos con la variable empeza
                // desde que registro debe empezar a mostrar y con la variable numero_elementos_pagina decimos hasta donde, el cual siempre es fijo por que es 50
                // ya que lo definimos anteriormente
                $consulta_final = "SELECT * FROM $tabla LIMIT $empezar,  $numero_elementos_pagina;";
                // Almacenamos en una variable query el resultado de la consulta de arriba y será esto lo que devolvamos al controlador para que pueda ser
                // mostrado en la vista
                $query = $this->dataQuery($consulta_final);
            }else{
                // Si la variable id no está vacía, es que queremos mostrar un único registro en la base de datos para ello, creamos una variable SQL en 
                // la cual almacenaremos la consulta que queremos ejecutar
                $sql = "SELECT * FROM $tabla WHERE id = $id";
                // en la variable result que creamos e inicializamos anteriormente guardamos el resultado del método dataQuery el cual recibe un parámetro
                // que es la consulta que vamos ejecutar.
                $query = $this->dataQuery($sql);
            }
            // Devolvemos el resultado de la variable querya, ya sea con los datos de toda la tabla (con la paginación) o de un registro en concreto
            return $query;
        }

        public function Paginacion($tabla){
            // Realizamos la consulta que muestra todos los datos de la tabla
            $consulta = $this->dataQuery("SELECT * FROM $tabla");

            // Contamos la cantidad de elementos que tene esa consulta ya que puede variar segun creemos o eliminemos registros y de la tabla en la que se consulte
            $numero_elementos = count($consulta);

            // Elegimos la cantidad de elementos que queremos mostrar por cada página
            $numero_elementos_pagina = 50;

            // Creamos un objeto Zebra_Pagination que será el que nos cree la paginación
            $pagination = new Zebra_Pagination();

            // Obtenemos el número total de elementos a paginar
            $pagination->records($numero_elementos);

            // Número de elementos por página
            $pagination->records_per_page($numero_elementos_pagina);
        
            return $pagination;
        }   

        // Método delete para el eliminado de un registro en la base de datos, (Recibe 2 parámetros), tabla = nombre de la tabla donde se desea consultar,
        // id = es un parámetro.
        public function delete($tabla, $id){
            // Creamos una variable SQL en la cual almacenaremos la consulta que queremos ejecutar
            $sql = "DELETE FROM $tabla WHERE id = $id";
            // guardaremos en una variable llamada delete el resultado del método dataQuery el cual recibe un parámetro que es la consulta que vamos ejecutar.
            $delete = $this->dataManipulation($sql);
            // Devolvemos el resultado de la variable result, ya sea con los datos de toda la tabla o con los de un registro en concreto.
            return $delete;
        }

        public function getResults($tabla){
            
            $sql = "SELECT COUNT(*) AS registros FROM $tabla";
            
            $result = $this->dataQuery($sql);

            return $result;
        }

        public function getReservas($id){
            $sql = "SELECT reservations.id, timeslots.dayofweek, timeslots.starttime, timeslots.endtime, reservations.date, resources.image, resources.name AS nameresource FROM reservations INNER JOIN resources ON resources.id = reservations.idResource INNER JOIN timeslots ON timeslots.id = reservations.idTimeSlot WHERE reservations.idUser = $id;";

            $result = $this->dataquery($sql);

            return $result;
        }

        public function cancelarReserva($id){
            $sql = "DELETE FROM reservations WHERE id = $id";

            $result = $this->dataManipulation($sql);

            return $result;

        }

    }

?>