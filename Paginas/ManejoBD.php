<?php

class ManejoBD{

    public function obtenerDatos($conex, $nombreTabla, $nombreColumna){
        try {
            // Crear la consulta SQL para obtener los datos
            $sql = "SELECT " . $nombreColumna . " FROM " . $nombreTabla;

            // Ejecutar la consulta
            $statement = $conex->query($sql);
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Obtener los datos de la columna
            foreach ($resultSet as $row) {
                $resultado[] = $row[$nombreColumna];
            }
            return $resultado;
        } catch (Exception $e) {
            echo "Error el metodo obtenerDatos\n" . $e;
        }
        return null;
    }
    public function obtenerDatosCondicion($conex, $nombreTabla, $nombreColumna, $condicion){
        try {
            // Crear la consulta SQL para obtener los datos
            $sql = "SELECT " . $nombreColumna . " FROM " . $nombreTabla . " WHERE " . $condicion;

            // Ejecutar la consulta
            $statement = $conex->query($sql);
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Obtener los datos de la columna
            foreach ($resultSet as $row) {
                $resultado[] = $row[$nombreColumna];
            }
            return $resultado;
        } catch (Exception $e) {
            echo "Error el metodo obtenerDatosCondicion\n" . $e;
        }
        return null;
    }

    function obtenerDatoCondicion($conex, $nombreTabla, $nombreColumna, $condicion) {
        try {
            // Crear la consulta SQL para obtener el dato
            $sql = "SELECT " . $nombreColumna . " FROM " . $nombreTabla . " WHERE " . $condicion;
    
            // Ejecutar la consulta
            $statement = $conex->query($sql);
            $resultSet = $statement->fetchAll();
    
            // Obtener el dato de la columna
            if (count($resultSet) > 0) {
                $dato = $resultSet[0][$nombreColumna];
                return $dato;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    
        return null;
    }
    
}
