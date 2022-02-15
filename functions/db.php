<?php

$server = "localhost";
$username = "root";
$password = "";
$dbName = "medical_services";

$conn = mysqli_connect($server, $username, $password, $dbName);

if (!$conn) {
    die("Error in connection: ".mysqli_connect_error());

}

function dbInsert($sql) {
    global $conn;

    $result = mysqli_query($conn, $sql);

    if($result) {
        return "Added Success";
    }
    return false;

}

function dbUpdate($sql) {
    global $conn;

    $result = mysqli_query($conn, $sql);

    if($result) {
        return "Updated Success";
    }
    return false;

}

function dbDelete($table, $field, $value) {
    global $conn;
    $sql = "DELETE FROM {$table} WHERE {$field} = '{$value}';";

    $result = mysqli_query($conn, $sql);

    if($result) {
        return "Deleted Success";
    }
    return false;

}

function getRow($table, $field, $value){
    global $conn;
    $sql = "SELECT * FROM {$table} WHERE {$field} = '{$value}';";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);
            return $rows;
        }

    }
    return false;
}


function getAllRows($table) {
    global $conn;
    $sql = "SELECT * FROM {$table};";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }
    }
    return false;
}

function customSelect($sql) {
    global $conn;

    $result = mysqli_query($conn,$sql);
    if ($result) {

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;

        }
    }
    return false;

}

function countRows($table) {
    global $conn;
    $sql = "SELECT COUNT(*) AS count FROM {$table}";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['count'];
}
