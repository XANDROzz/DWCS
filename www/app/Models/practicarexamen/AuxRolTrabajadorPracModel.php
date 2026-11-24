<?php
declare(strict_types=1);
namespace Com\Daw2\Models\practicarexamen;

use Com\Daw2\Core\BaseDbModel;
use PDO;

class AuxRolTrabajadorPracModel extends BaseDbModel
{
    private const string SELECT_ROLES = "SELECT * FROM aux_rol_trabajador auxr ORDER BY auxr.id_rol ASC";

    public function getRoles(): array
    {
        return $this->pdo->query(self::SELECT_ROLES)->fetchAll(PDO::FETCH_ASSOC);
    }
}