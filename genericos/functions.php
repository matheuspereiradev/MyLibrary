<?php

/**
 * Conecta com o MySQL usando PDO
 */
function db_connect() {
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

    return $PDO;
}

function getData() {
    $dataatual = date('Y/m/d');
    return $dataatual;
}

/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function calcularHash($senha) {
    return sha1(md5($senha));
}

/**
 * Verifica se o usuário está logado
 */
function isLoggedIn() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        return false;
    }

    return true;
}

/**
 * Converte datas entre os padrões ISO e brasileiro
 * Fonte: http://rberaldo.com.br/php-conversao-de-datas-formato-brasileiro-e-formato-iso/
 */
function dateConvert($date) {
    if (!strstr($date, '/')) {
        // $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    } else {
        // $date está no formato brasileiro e deve ser convertida para ISO
        sscanf($date, '%d/%d/%d', $d, $m, $y);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }

    return false;
}

/**
 * Calcula a idade a partir da data de nascimento
 *
 * Sobre a classe DateTime: http://rberaldo.com.br/php-usando-a-classe-nativa-datetime/
 */
function calcularTempo($data) {
    $now = new DateTime();
    $diff = $now->diff(new DateTime($data));
    
    return $diff->days;
}
