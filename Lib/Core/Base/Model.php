<?php

namespace Lib\Core\Base;

use Lib\Core\Database;
use PDOException;

class Model
{
    private $db;
    private $name;

    function __construct($name)
    {
        $this->db = new Database();
        $this->name = $name;
    }

    /**
     * Inserta una fila a la base de datos
     * 
     * @param array $data Recibe las columnas que se van a insertar es necesario indicar [`indice => valor`]
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     * 
     * @return bool Retorna `true` si se inserto correctamente los datos en la base de datos, de lo contrario retorna `false`
     */
    public function insert(array $data): bool
    {

        $names = $values = "";

        foreach ($data as $e => $v) {
            $names .= $e . ", ";
            $values .= "'" . $v . "', ";
        }

        $names = rtrim($names, ", ");
        $values = rtrim($values, ", ");

        $string = "INSERT INTO " . $this->name . "(" . $names . ") VALUES (" . $values . ")";
        $query = $this->db->connect()->prepare($string);

        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Realiza una consulta a la base de datos
     * 
     * Si se requieren todos los datos, usar en cambio 
     * 
     * `$model->getAll([columna => valor])`
     * 
     * @param string|array $keys Recibe las columnas que se requieren de la base de datos
     * 
     * Opciones: 
     * 
     * `string`: Unicamente traera los datos de la columna seleccionada
     * 
     * `array`: Se debe indicar en las columnas requeridas separadas por comas
     * 
     * @param array $data Recibe los datos de busqueda para la consulta WHERE con `[indice => valor]`
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     * 
     * @return array|bool Retorna un arreglo con los datos de la consulta o `false` si ocurrio un error
     */
    public function get(array|string $keys, array $data): array|bool
    {
        $items = [];
        $key = "*";
        $where = "";

        if ($keys) {
            $key = "";
            if (is_array($keys)) {
                foreach ($keys as $k) {
                    $key .= $k . ", ";
                }
            } else {
                $key = $keys;
            }
        }

        if ($data) {
            $where = " WHERE ";
            if (is_array($data)) {
                foreach (array_keys($data) as $e) {
                    $where .= $e . "='" . $data[$e] . "' OR ";
                }
            }
        }

        $string = "SELECT " . trim(rtrim($key, ", ")) . " FROM " . $this->name . rtrim($where, 'OR ');
        $query = $this->db->connect()->prepare($string);

        try {
            $query->execute();
            while ($row = $query->fetch()) {
                $item;

                foreach (array_keys($row) as $r) {
                    if (!is_int($r)) {
                        $item[$r] = $row[$r];
                    }
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Realiza una consulta a la base de datos si se requieren todos los datos
     * 
     * @param array $data Recibe los datos de busqueda para la declaració WHERE con `[indice => valor]`
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     * 
     * @param bool $one recibe un `true` si se requiere solo una fila de datos
     * 
     * @return array|bool Retorna un arreglo con los datos de la consulta o `false` si ocurrio un error
     */
    public function getAll(array $data, bool $one = false): array|bool
    {
        $items = [];
        $string = "";

        if ($data) {
            $string = " WHERE ";
            foreach (array_keys($data) as $e) {
                $string .= $e . "= '" . $data[$e] . "' AND ";
            }
            ;
        }

        $string = "SELECT * FROM " . $this->name . rtrim($string, 'AND ');

        $query = $this->db->connect()->prepare($string);
        try {
            $query->execute();

            while ($row = $query->fetch()) {
                $item;

                foreach (array_keys($row) as $r) {
                    if (!is_int($r)) {
                        $item[$r] = $row[$r];
                    }
                }
                array_push($items, $item);
            }

            return $one ? $items[0] : $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Actualiza la base de datos
     * 
     * @param array $keys Recibe los datos de busqueda para la declaració WHERE con `[indice => valor]`
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     * 
     * @param array $data Recibe las columnas que se van a actulizar es necesario indicar [`indice => valor`]
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     * 
     * @return bool Retorna `verdadero` si la actualización se realiza correctamente, en caso contrario retorna `false`
     */
    public function update(array $keys, array $data): bool
    {
        $string = "";

        if ($keys) {
            $where = " WHERE ";
            foreach (array_keys($data) as $e) {
                $where .= $e . "= '" . $data[$e] . "' AND ";
            }
            $where = rtrim($where, ' AND ');
        }

        if ($data) {
            foreach ($data as $key => $val) {
                $string .= $key . " = '" . $val . "', ";
            }
            $string = rtrim($string, ', ');
        }

        $string = "UPDATE " . $this->name . " SET " . $string . " WHERE " . $where;

        $query = $this->db->connect()->prepare($string);
        $query->bindParam(':id', $id);

        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Elimina datos de la base de datos
     * 
     * @param array $data Recibe los datos de busqueda para la declaració WHERE con `[indice => valor]`
     * 
     * `indice` Nombre de la columa
     * 
     * `valor` El valor que se añadira en la fila
     * 
     * `Ejemplo`: ["name" => "Jonh Doe", "email" => "jonhdoe@mail.com"]
     */
    public function delete($data)
    {
        if ($data) {
            $where = " WHERE ";
            foreach (array_keys($data) as $e) {
                $where .= $e . "= '" . $data[$e] . "' AND ";
            }
            $where = rtrim($where, ' AND ');
        }

        $string = "DELETE FROM " . $this->name . " WHERE id = :id";

        $query = $this->db->connect()->prepare($string);
        $query->bindParam(':id', $id);

        try {
            $query->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}