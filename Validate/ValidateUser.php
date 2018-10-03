<?php

class ValidateUser
{
    public function validate($data)
    {
        if (!empty($data['name']) || empty($data['telefone']) || empty($data['email']) || empty($data['endereco'])) {
            $tel = $this->validaTelefone($data['telefone']);
            $mail = $this->validaEmail($data['email']);
            
            if ($mail) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function validaEmail($mail)
    {
        if ((filter_var($mail, FILTER_VALIDATE_EMAIL))) {
            return true;
        } else {
            return false;
        }
    }


    public function validaTelefone($telefone)
    {
        if (preg_match('/(\()?(10)|([1-9]){2}\)?((-|\s)?)([2-9][0-9]{3}((-|\s)?)[0-9]{4,5})/', $telefone) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
