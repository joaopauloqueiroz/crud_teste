<?php
require_once "../implements/Client.php";
class ValidateUser
{
    public function validate(Client $data)
    {
        $erros = array();
        if (!empty($data->getName()) || !empty($data->getTelefone()) || !empty($data->getEmail()) || !empty($data->getEndereco())) {
            $tel = $this->validaTelefone($data->getTelefone());
            $mail = $this->validaEmail($data->getEmail());
            
            if (empty($data->getName())) {
                array_push($erros, "O campo nome precisa ser preenchido corretamente");
            }

            if (!$mail) {
                array_push($erros, "O campo E-mail não foi preenchido corretamente");
            }
            if (!$tel) {
                array_push($erros, "O campo Telefone não foi preenchido corretamente");
            }
        } else {
            array_push($erros, "Todos os campos precisam ser preenchidos");
        }
        
        return $erros;
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
