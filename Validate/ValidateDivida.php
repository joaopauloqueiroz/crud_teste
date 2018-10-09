<?php
require_once "../implements/Divida.php";
class ValidateDivida
{
    /**
     *  Valida se tem algum campo vazio na divida
     *
     * @param Divida $data
     * @return boolean
     */
    public function validate(Divida $data):bool
    {
        if (empty($data->getIdentificador()) || empty($data->getValor()) || empty($data->getVencimento())) {
            return false;
        } else {
            return true;
        }
    }
}
