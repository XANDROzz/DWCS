<?php
declare(strict_types=1);
namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;
use Com\Daw2\Libraries\SQLConditions;
use PDO;
use PDOException;

class UsuarioModel extends BaseDbModel {

    private const ROWS_PER_PAGE = 20;
    private const DEFAULT_ORDER_INDEX = 1;
    private const array ORDER_FIELDS = ["us.nombre", "us.id_rol", "us.email", "us.idioma", "us.last_date"];
    private const string SELECT_FROM = "SELECT us.nombre, ar.rol, us.email, us.idioma, us.last_date, us.baja FROM usuario_sistema us LEFT JOIN aux_rol ar ON us.id_rol = ar.id_rol";

    private const string SELECT_FROM_PASS = "SELECT us.nombre, ar.rol, us.email, us.idioma, us.last_date, us.baja, us.pass FROM usuario_sistema us LEFT JOIN aux_rol ar ON us.id_rol = ar.id_rol";

    private const string SELECT_COUNT_FROM = "SELECT COUNT(*) FROM usuario_sistema us LEFT JOIN aux_rol ar ON us.id_rol = ar.id_rol";

    public function getAllUsuarios(): array {
        $sql = self::SELECT_FROM;
        $usuarios = $this->pdo->query($sql)->fetchAll();
        return $usuarios;
    }

    private function getCountFilterBy(array $filtros): int
    {
        $sql = self::SELECT_COUNT_FROM;
        $sqlConditions = $this->findUserByFilter($filtros);
        $sql .= $sqlConditions->whereSQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sqlConditions->values);
        return $stmt->fetchColumn(0);
    }

    public function getUserFilterBy(array $filtros): array
    {
        $sql = self::SELECT_FROM;

        $sqlConditions = $this->findUserByFilter($filtros);
        $sql .= $sqlConditions->whereSQL;

        $sentido = !empty($filtros['sentido']) && $filtros['sentido'] === 'desc' ? 'DESC' : 'ASC';
        $sql .= " ORDER BY " . self::ORDER_FIELDS[$this->getOrderIndex($filtros) - 1] . " $sentido";

        $currentPage = $this->getCurrentPage($filtros);

        $sql .= " LIMIT " . (($currentPage - 1) * self::ROWS_PER_PAGE) . ", " . self::ROWS_PER_PAGE;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sqlConditions->values);
        return $stmt->fetchAll();
    }

    private function findUserByFilter(array $filtros): SQLConditions {
        $condiciones = [];
        $values = [];
        if (!empty($filtros['nombre'])) {
            $condiciones[] = "nombre LIKE :nombre";
            $values["nombre"] = "%" . $filtros['nombre'] . "%";
        }
        if (!empty($filtros['id_rol'])) {
            $condiciones[] = "us.id_rol = :id_rol";
            $values["id_rol"] = $filtros['id_rol'];
        }
        if (!empty($filtros['email'])) {
            $condiciones[] = "email LIKE :email";
            $values["email"] = "%" . $filtros['email'] . "%";
        }
        if (!empty($filtros['idioma'])) {
            $condiciones[] = "idioma LIKE :idioma";
            $values["idioma"] = "%" . $filtros['idioma'] . "%";
        }
        if (!empty($filtros['last_date'])) {
            $condiciones[] = "last_date LIKE :last_date";
            $values["last_date"] = "%" . $filtros['last_date'] . "%";
        }
        if ($condiciones !== []) {
            return new SQLConditions(" WHERE " . implode(" AND ", $condiciones), $values);
        } else {
            return new SQLConditions("", []);
        }
    }

    public function getLanguages(): array{
        $sql = "SELECT DISTINCT idioma FROM usuario_sistema";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getLastPage(array $filtros): int
    {
        return (int)ceil($this->getCountFilterBy($filtros) / self::ROWS_PER_PAGE);
    }

    public function getCurrentPage(array $filtros): int
    {
        return !empty($filtros['page']) && filter_var($filtros['page'], FILTER_VALIDATE_INT) ? (int)$filtros['page'] : 1;
    }

    public function getOrderIndex(array $filtros): int
    {
        if (empty($filtros['order'])) {
            return self::DEFAULT_ORDER_INDEX;
        } elseif (filter_var($filtros['order'], FILTER_VALIDATE_INT) === false || $filtros['order'] < 1 || $filtros['order'] > count(self::ORDER_FIELDS)) {
            return self::DEFAULT_ORDER_INDEX;
        } else {
            return (int)$filtros['order'];
        }
    }

    public function getByEmail(string $email): false|array
    {
        $sql = self::SELECT_FROM_PASS . " WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function selectUsuarioToEdit($id_usuario)
    {
        $sql = self::SELECT_FROM . " WHERE id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_usuario' => $id_usuario]);
        $row = $stmt->fetch();
        return $row;
    }



}