<?php
class Rent{

    public $db_connect;

    public function __construct($db_connect){

        $this -> db_connect = $db_connect;
    }
    public function getRentals() {
        try {
            $query = $this->db_connect->prepare("SELECT bike_id, origin_start FROM rentals");
            $query->execute();
            $result = $query->get_result();
            $rentals = $result->fetch_all(MYSQLI_ASSOC);
            return $rentals; // No necesitas el close() aquí
    
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return []; // Retorna un arreglo vacío en caso de error
        }
    }

    //Metodo para sumar los precios en el mes
    public function SumarPreciosRentalsMesActual() {
        try {
            // Obtener el mes y año actual
            $mesActual = date('m');
            $anioActual = date('Y');
            
            $Sql = $this->db_connect->prepare(
                "SELECT r.date_final, u.name, SUM(r.final_price) AS total
                FROM rentals r
                JOIN users u ON r.user_id = u.id
                WHERE r.final_price IS NOT NULL 
                AND r.final_price != ''
                AND MONTH(r.date_final) = ?
                AND YEAR(r.date_final) = ?
                GROUP BY u.name"
            );
            
            // Vinculación de parámetros
            $Sql->bind_param('ii', $mesActual, $anioActual);
        
            // Ejecutar la consulta
            $Sql->execute();
        
            // Obtener los resultados
            $Resultado = $Sql->get_result();

            if ($Resultado->num_rows > 0) {
                // Obtener todos los resultados como un array asociativo
                return $Resultado->fetch_all(MYSQLI_ASSOC);
            }
            return [];

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function rentedBikeByUser($user_id) {
        try {
            $query = $this->db_connect->prepare("SELECT * FROM rentals INNER JOIN bikes ON rentals.bike_id = bikes.id WHERE rentals.user_id = ? AND rentals.final IS NULL");
            $query->bind_param("ii", $user_id);
            $query->execute();
            $result = $query->get_result();
            $rentals = $result->fetch_all(MYSQLI_ASSOC);
            return $rentals; // No necesitas el close() aquí
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function discountByEconomicClass($economy){
        // try {
        //     $query = $this->db_connect->prepare("SELECT initial_price FROM rentals");
        //     $query->execute();
        //     $result = $query->get_result();
        //     $economic = $result->fetch_all(MYSQLI_ASSOC);
        //     return $economic; // No necesitas el close() aquí
    
        // } catch (Exception $e) {
        //     echo "Error: " . $e->getMessage();
        //     return []; // Retorna un arreglo vacío en caso de error
        // }
    }
}