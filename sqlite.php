<?php

$connection = new PDO('sqlite:' . __DIR__ . '/database');

$connection->exec(
    "INSERT INTO users (first_name, last_name) VALUES ('Arseny', 'Kondrashin')"
);
