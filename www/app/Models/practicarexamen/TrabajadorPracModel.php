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

//    function selectTrabajadores($filtros): array
//    {
//        $sql = self::SELECT . self::FROM;
//        $stmnt = $this->pdo->query($sql);
//        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
//    }

    function getTrabajadorByFilter($filtros): array
    {
        $sql = self::SELECT . self::FROM;
        $condiciones = [];
        $values = [];

        if (!empty($filtros['username'])) {
            $condiciones[] = 't.username LIKE :username';
            $values['username'] = "%" . $filtros['username'] . "%";
        }if (!empty($filtros['id_rol'])){
            $condiciones[] = 't.id_rol = :id_rol';
            $values['id_rol'] = $filtros['id_rol'];
        }if (!empty($filtros['salarioBrutoMin'])){
            $condiciones[] = 't.salarioBruto >= :salarioBrutoMin';
            $values['salarioBrutoMin'] = $filtros['salarioBrutoMin'];
        }if (!empty($filtros['salarioBrutoMax'])){
            $condiciones[] = 't.salarioBruto <= :salarioBrutoMax';
            $values['salarioBrutoMax'] = $filtros['salarioBrutoMax'];
        }if (!empty($filtros['retencionIRPFMin'])){
            $condiciones[] = 't.retencionIRPF >= :retencionIRPFMin';
            $values['retencionIRPFMin'] = $filtros['retencionIRPFMin'];
        }if (!empty($filtros['retencionIRPFMax'])){
            $condiciones[] = 't.retencionIRPF >= :retencionIRPFMax';
            $values['retencionIRPFMax'] = $filtros['retencionIRPFMax'];
        }if (!empty($filtros['id_country']) && is_array($filtros['id_country'])){
            $countries = [];
            $i = 1;

            foreach ($filtros['id_country'] as $idCountry){
                $countries [":id_country{$i}"] = $idCountry;
                $i++;
            }
            $claves = array_keys($countries);
            $condiciones[] =  "t.id_country IN (" . implode(", ", $claves) . ")";
            $values = array_merge($values, $countries);
        }
        if ($condiciones !== []){
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }
        $stmnt = $this->pdo->prepare($sql);
        $stmnt->execute($values);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }



}