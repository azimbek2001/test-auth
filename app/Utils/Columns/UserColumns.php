<?php
declare(strict_types=1);

namespace App\Utils\Columns;
/**
 * Здесь находится документация к модели users.
 * В идеале каждый столбец необходимо описать (название, тип, длина, наличие индекса и тд)
 */
class UserColumns
{
    /**
     * Название таблицы для модели Users
     */
    const TABLE_NAME = 'users';
    const ID_COLUMN = 'id';
    const FULL_NAME_COLUMN = 'full_name';
    const EMAIL_COLUMN = 'email';
    const PASSWORD_COLUMN = 'password';
    const REMEMBER_TOKEN_COLUMN = 'remember_token';
    const ORGANIZATION_ID = 'organization_id';
    const CREATED_AT_COLUMN = 'created_at';
    const UPDATED_AT_COLUMN = 'updated_at';
}
