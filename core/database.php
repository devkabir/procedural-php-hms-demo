<?php
$host = 'localhost';
$database = 'hms';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;charset=UTF8";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    whistleblower($e->getMessage());
}


/**
 * If the table exists, return true. If it doesn't, die.
 *
 * @param string $name The name of the table to check for.
 *
 * @return bool a boolean value.
 */
function has_table(string $name): bool
{
    global $pdo;
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    $found = in_array($name, $tables, true);
    if (!$found) {
        whistleblower("The table '$name' does not exist");
    }

    return true;
}


/**
 * It takes a table name, an array of fields, and an array of values, and inserts them into the
 * database.
 *
 * @param string $table  the table name
 * @param array  $fields an array of the fields you want to insert into
 * @param array  $values array of values to be inserted
 *
 * @return int The last inserted id.
 */
function create(string $table, array $fields, array $values): int
{
    global $pdo;
    $pdo->beginTransaction();
    try {
        has_table($table);
        $get_only_allowed_fields = array_intersect_key($values, $fields);
        $keys = array_keys($get_only_allowed_fields);
        $columns = fix_column_name(implode(', ', $keys));
        $hold = fix_column_name(implode(',', array_map(static fn($field) => ":{$field}", $keys)));
        $sql = "insert into $table ($columns) values ($hold)";
        $statement = $pdo->prepare($sql);
        $statement->execute($get_only_allowed_fields);
        $insertId = $pdo->lastInsertId();
        $pdo->commit();
        return (int)$insertId;
    } catch (PDOException $e) {
        $pdo->rollback();
        whistleblower($e->getMessage());
    }

}

/**
 * It replaces all dashes with underscores
 *
 * @param string implode The string to be converted.
 *
 * @return string name with all the dashes replaced with underscores.
 */
function fix_column_name(string $implode): string
{
    return str_replace('-', '_', $implode);
}