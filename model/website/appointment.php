<?php
/**
 * It takes an array of data, and inserts it into the database.
 *
 * @param  array  $appointment
 *
 * @return int The id of the newly created appointment.
 */
function create_appointment(array $appointment): int
{
    $appointment = [
        'patient_id' => $appointment['patient_id'],
        'date'       => $appointment['appointment-date'],
        'reason'     => $appointment['appointment-reason'],
    ];
    $fields = [
        'patient_id' => 'string',
        'date'       => 'string',
        'reason'     => 'string',
    ];
    return db_insert('appointments', $fields, $appointment);
}
