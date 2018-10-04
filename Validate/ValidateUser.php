<?php

class ValidateUser
{
    public function validate($data)
    {
        if (!empty($data['name']) || empty($data['telefone']) || empty($data['email']) || empty($data['endereco'])) {
            $tel = $this->validaTelefone($data['telefone']);
            $mail = $this->validaEmail($data['email']);
            
            if ($mail && $tel) {
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
        $telefone = preg_replace("/[^0-9]/", "", $telefone);

        $is = preg_match('/(\(?\d{2}\)?) ?9?\d{4}-?\d{4}/', $telefone);
        
        if ($is && strlen($telefone) == 11) {
            return true;
        } else {
            return false;
        }
    }
}
