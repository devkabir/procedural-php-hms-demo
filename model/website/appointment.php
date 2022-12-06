<?php
/* Defining the table that the data will be inserted into. */
$table = 'appointments';
/* Defining the fields that are allowed to be inserted into the database. */
$fields = [
//    'email' => 'string',
//    'password' => 'string',
//    'name' => 'string',
//    'date-of-birth' => 'string',
//    'gender' => 'string',
//    'phone' => 'string',
//    'address' => 'string',
//    'city' => 'string',
//    'state' => 'string',
//    'division' => 'string',
    'date' => 'string',
    'reason' => 'string',
];

/**
 * It takes an array of data, and inserts it into the database.
 *
 * @param array $appointment
 *
 * @return int The id of the newly created appointment.
 */
function create_appointment(array $appointment): int
{
    global $table, $fields;
    $appointment = [
        'date' => $appointment['appointment-date'],
        'reason' => $appointment['appointment-reason'],
    ];
    return create($table, $fields, $appointment);
}