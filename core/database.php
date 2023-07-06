<?php

$dsn     = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8';
$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
);
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $statement = $pdo->query("SHOW TABLES");
    $tableNames = $statement->fetchAll(PDO::FETCH_COLUMN);
    if (count($tableNames) === 0) {
        write_log("Table is missing in database.");
        $sql = file_get_contents(__DIR__ . '/sql/setup.sql');
        $pdo->exec($sql);
    }
} catch ( PDOException $e ) {
    whistleblower($e->getMessage());
}


/**
 * If the table exists, return true. If it doesn't, die.
 *
 * @param string $name The name of the table to check for.
 *
 * @return bool a boolean value.
 */
function db_has_table( string $name ): bool
{
    global $pdo;
    $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
    $found  = in_array($name, $tables, true);
    if (! $found ) {
        whistleblower("The table '$name' does not exist");
    }

    return true;
}


/**
 * It takes a table name, an array of fields, and an array of values,
 * and inserts them into the database.
 *
 * @param string $table  the table name
 * @param array  $fields an array of the fields you want to insert into
 * @param array  $values array of values to be inserted
 *
 * @return int The last inserted id.
 */
function db_insert( string $table, array $fields, array $values ): int
{
    global $pdo;
    $pdo->beginTransaction();
    try {
        db_has_table($table);
        $get_only_allowed_fields = array_intersect_key($values, $fields);
        $keys                    = array_keys($get_only_allowed_fields);
        $columns                 = db_column_name(implode(', ', $keys));
        $hold                    = db_column_name(implode(',', array_map(static fn( $field) => ":{$field}", $keys)));
        $sql                     = "insert into $table ($columns) values ($hold)";
        $statement               = $pdo->prepare($sql);
        $statement->execute($get_only_allowed_fields);
        $insertId = $pdo->lastInsertId();
        $pdo->commit();

        return (int) $insertId;

    } catch ( PDOException $e ) {
        $pdo->rollback();
        whistleblower($e->getMessage());
    }

    return 0;

}

/**
 * It replaces all dashes with underscores
 *
 * @param string $implode The string to be converted.
 *
 * @return string name with all the dashes replaced with underscores.
 */
function db_column_name( string $implode ): string
{
    return str_replace('-', '_', $implode);
}

/**
 * Finds a record from a database table based on the provided criteria.
 *
 * @param string $table      The name of the database table to search in.
 * @param array  $conditions An associative array of criteria for the search. Each key represents a column name,
 *                           and its corresponding value is the desired value to match.
 *
 * @return array|false  An associative array representing the found record, or false if no record is found.
 */
function db_find( string $table, array $conditions ): bool
{
    global $pdo;
    $result = false;
    $pdo->beginTransaction();
    try {
        // Prepare the SQL statement
        $columns       = implode(', ', array_keys($conditions));
        $placeholders  = implode(' = ? AND ', array_keys($conditions));
        $placeholders .= ' = ?';
        $sql           = "SELECT * FROM $table WHERE $placeholders LIMIT 1";
        $statement     = $pdo->prepare($sql);
        // Execute the query with the provided criteria values
        $statement->execute(array_values($conditions));
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $pdo->commit();
    } catch ( PDOException $e ) {
        $pdo->rollback();
        whistleblower($e->getMessage());
    }

    return $result['id'];
}
