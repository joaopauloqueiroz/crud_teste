<?php

class ValidateDivida
{
    public function validate($data)
    {
        if (empty($data['identificador']) || empty($data['valor']) || empty($data['vencimento'])) {
            return false;
        } else {
            return true;
        }
    }
}
