<?php
declare(strict_types=1);
namespace Com\Daw2\Models\practicarexamen;

use Com\Daw2\Core\BaseDbModel;

class AuxCountriesPracModel extends BaseDbModel
{
    private const string SELECT_ALL_COUNTRIES = "SELECT * FROM aux_countries auxc ORDER BY auxc.country_name ";

    public function getCountries(): array
    {
        return $this->pdo->query(self::SELECT_ALL_COUNTRIES)->fetchAll();
    }

}