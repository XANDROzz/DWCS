<?php
declare(strict_types=1);
namespace Com\Daw2\Models\practicarexamen;

use Com\Daw2\Core\BaseDbModel;
use Com\Daw2\Libraries\SQLConditions;
use PDO;
use PDOException;

class TrabajadorPracModel extends BaseDbModel
{
    private const string SELECT = " SELECT t.username, t.salarioBruto, t.retencionIRPF, t.activo, auxr.nombre_rol, auxc.country_name ";
    private const string FROM = " FROM trabajadores t LEFT JOIN aux_countries auxc ON auxc.id = t.id_country LEFT JOIN aux_rol_trabajador auxr ON auxr.id_rol = t.id_rol ";
    private const string SELECT_COUNT_FROM = " SELECT count(*) FROM trabajadores t LEFT JOIN aux_countries auxc ON auxc.id = t.id_country LEFT JOIN aux_rol_trabajador auxr ON auxr.id_rol = t.id_rol ";
    private const string INSERT = " INSERT INTO trabajadores (username, salarioBruto, retencionIRPF, activo, id_rol, id_country) VALUES ";
    private const string UPDATE = " UPDATE trabajadores SET ";
    private const string DELETE = " DELETE FROM trabajadores WHERE ";
    private const PAGE_SIZE = 20;
    private const DEFAULT_PAGE = 1;
    private const DEFAULT_ORDER = 1;
    private const array ORDER_FIELDS = ['username', 'nombre_rol', 'salarioBruto', 'retencionIRPF', 'country_name'];
    private array $condiciones = [];
    private array $values = [];


//    function selectTrabajadores($filtros): array
//    {
//        $sql = self::SELECT . self::FROM;
//        $stmnt = $this->pdo->query($sql);
//        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function getTrabajadorByFilter($filtros): array
    {
        $sql = self::SELECT . self::FROM;
        $this->condiciones = [];
        $this->values = [];

        if (!empty($filtros['username'])) {
            $this->condiciones[] = 't.username LIKE :username';
            $this->values['username'] = "%" . $filtros['username'] . "%";
        }if (!empty($filtros['id_rol'])){
            $this->condiciones[] = 't.id_rol = :id_rol';
            $this->values['id_rol'] = $filtros['id_rol'];
        }if (!empty($filtros['salarioBrutoMin'])){
            $this->condiciones[] = 't.salarioBruto >= :salarioBrutoMin';
            $this->values['salarioBrutoMin'] = $filtros['salarioBrutoMin'];
        }if (!empty($filtros['salarioBrutoMax'])){
            $this->condiciones[] = 't.salarioBruto <= :salarioBrutoMax';
            $this->values['salarioBrutoMax'] = $filtros['salarioBrutoMax'];
        }if (!empty($filtros['retencionIRPFMin'])){
            $this->condiciones[] = 't.retencionIRPF >= :retencionIRPFMin';
            $this->values['retencionIRPFMin'] = $filtros['retencionIRPFMin'];
        }if (!empty($filtros['retencionIRPFMax'])){
            $this->condiciones[] = 't.retencionIRPF >= :retencionIRPFMax';
            $this->values['retencionIRPFMax'] = $filtros['retencionIRPFMax'];
        }if (!empty($filtros['id_country']) && is_array($filtros['id_country'])){
            $countries = [];
            $i = 1;

            foreach ($filtros['id_country'] as $idCountry){
                $countries [":id_country{$i}"] = $idCountry;
                $i++;
            }
            $claves = array_keys($countries);
            $this->condiciones[] =  "t.id_country IN (" . implode(", ", $claves) . ")";
            $this->values = array_merge($this->values, $countries);
        }
        if ($this->condiciones !== []){
            $sql .= " WHERE " . implode(" AND ", $this->condiciones);
        }
        $orderIndex = $this->getOrderIndex($filtros);
        if($orderIndex > 0){
            $sql .= " ORDER BY " . self::ORDER_FIELDS[$orderIndex - 1] . " ASC ";
        }else{
            $sql .= " ORDER BY " . self::ORDER_FIELDS[abs($orderIndex) - 1] . " DESC ";
        }
        $sql .= " LIMIT " . (($this->getCurrentPage($filtros)-1)*self::PAGE_SIZE) . "," . self::PAGE_SIZE;
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute($this->values);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountTrabajador(): int
    {
        $sql = self::SELECT_COUNT_FROM;
//        $condiciones = [];
//        $values = [];
        if ($this->condiciones !== []){
            $sql .= " WHERE " . implode(" AND ", $this->condiciones);
        }
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute($this->values);
        return $stmnt->fetchColumn();
    }



    public function getLastPage(): int
    {
        return max(1, (int)ceil( $this->getCountTrabajador() / self::PAGE_SIZE));
    }

    public function getCurrentPage($filtros): int
    {
        return !empty($filtros['page']) && filter_var($filtros['page'], FILTER_VALIDATE_INT) ? (int)$filtros['page'] : self::DEFAULT_PAGE;
    }

    public function getOrderIndex($filtros): int
    {
        if(empty($filtros['order']) || $filtros['order'] === 0){
            return self::DEFAULT_ORDER;
        }elseif(filter_var($filtros['order'], FILTER_VALIDATE_INT) === false || $filtros['order'] < -count(self::ORDER_FIELDS) || $filtros['order'] > count(self::ORDER_FIELDS) ){
            return self::DEFAULT_ORDER;
        }else{
            return (int)$filtros['order'];
        }
    }

    public function getNextOrder(int $col, array $filtros): int
    {
        $currentOrder = $this->getOrderIndex($filtros);
        return $currentOrder === $col ? -$col : $col;
    }

    public function newTrabajador(array $registros): bool
    {
        $idCountry = is_array($registros['id_country']) ? $registros['id_country'][0] : $registros['id_country'];

        $sql= self::INSERT . " (:username, :salarioBruto, :retencionIRPF, 1, :id_rol, :id_country)";
        $stmnt = $this->pdo->prepare($sql);
        return $stmnt->execute([
            "username" => $registros['username'],
            "salarioBruto" => $registros['salarioBruto'],
            "retencionIRPF" => $registros['retencionIRPF'],
            "id_rol" => $registros['id_rol'],
            "id_country" => $idCountry
        ]);
    }

    public function getTrabajadorToEdit($username): array|false
    {
        $sql= self::SELECT . self::FROM . " WHERE username = :username";
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute(["username" => $username]);
        $row = $stmnt->fetch();
        return $row;
    }

    public function updateTrabajador(string $username, array $cambios): bool
    {
        $set = [];
        $params = ['username' => $username];
        foreach ($cambios as $cambio => $valor) {
            $set[] = "$cambio = :$cambio";
            $params[$cambio] = $valor;
        }

        $sql = self::UPDATE . implode(', ', $set) . " WHERE username = :username";
        $stmnt = $this->pdo->prepare($sql);
        return $stmnt->execute($params);
    }

    public function deleteTrabajador($username): bool
    {
        $sql = self::DELETE . " username = :username ";
        $stmnt = $this->pdo->prepare($sql);
        return $stmnt->execute(["username" => $username]);
    }



}