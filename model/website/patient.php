<?php
/**
 * It takes an array of data, and inserts it into the database.
 *
 * @param  array  $patient  An array of data to be inserted into the database.
 *
 * @return int The id of the newly created appointment.
 */
function create_patient(array $patient): int
{
    $fields = [
        'name'     => 'string',
        'password' => 'string',
        'phone'    => 'string',
    ];
    $data = [
        'name'     => $patient['name'],
        'password' => password_hash($patient['password'], PASSWORD_BCRYPT),
        'phone'    => $patient['phone'],
    ];
    return create('patients', $fields, $data);
}
