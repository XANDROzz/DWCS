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

    function selectTrabajadores($filtros): array {
        $sql = self::SELECT . self::FROM;
        $stmnt = $this->pdo->query($sql);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

}