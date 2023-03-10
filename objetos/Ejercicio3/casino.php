<?php

require_once 'DadoPoker.php';
while (DadoPoker::getTiradasTotales() < 5) {
    DadoPoker::tirar();
    DadoPoker::nombreFigura();
}