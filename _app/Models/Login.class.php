<?php

/**
 * Login [MODEL]
 * Responsável por autenticar, válidar e checar usuários do sistema de login.
 * @copyright (c) 2022, Dinho Lima
 */
class Login {
    
    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;
    
    public function __construct($Level) {
        $this->Level = (int) $Level;
    }
    
    public function ExeLogin(array $UserData) {
        $this->Email = (string) strip_tags(trim($UserData['user']));
        $this->Senha = (string) strip_tags(trim($UserData['pass']));
        $this->setLogin();
    }

    public function getResult() {
        return $this->Result;
    }
    
    public function getError() {
        return $this->Error;
    }
    
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['user_level'] < $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
        
        
    }


    /*
     * METODOS PRIVADOS
     */
    private function setLogin(){
        /*EXIBE NO MESMO ERRO SE O EMAIL OU SENHA ESTIVEREM EM BRANCO OU O FORMATO DO EMAIL FOR INVÁLIDO.*/
        //if(!$this->Email || !$this->Senha || !Check::Email($this->Email)):
        //    $this->Error = ['Informe seu email e senha para acessar o sistema!', WS_ALERT];
        //    $this->Result = false;
        //elseif(!$this->getUser()):
        //    $this->Error = ['Verifique os dados informados e tente novamente!', WS_ALERT];
        //    $this->Result = false;
        //elseif($this->Result['user_level'] < $this->Level):
        //    $this->Error = ["{$this->Result['user_name']}, você não tem permissão para acessar o sistema!", WS_ALERT];
        //    $this->Result = false;
        //else:
        //    $this->Execute();
        //endif;
        
        
        /* EXIBE CADA ERRO DETALHADO.*/
        if(!$this->Email):
            $this->Error = ['Informe seu email!', WS_INFOR];
            return $this->Result = false;
        elseif(!$this->Senha):
            $this->Error = ['Informe sua senha!', WS_INFOR];
        $this->Result = false;
        elseif(!Check::Email($this->Email)):
            $this->Error = ['Formato do email inválido!', WS_ALERT];
        $this->Result = false;
        elseif(!$this->getUser()):
            $this->Error = ['Verifique os dados informados e tente novamente!', WS_ALERT];
        $this->Result = false;
        elseif($this->Result['user_level'] < $this->Level):
            $this->Error = ["{$this->Result['user_name']}, você não tem permissão para acessar o sistema!", WS_ERROR];
        $this->Result = false;
        else:
            $this->Execute();
        endif;
  
    }
    
    private function getUser() {
        $this->Senha = md5($this->Senha);
        $read = new Read;
        $read->ExeRead("users", "WHERE user_email = :e AND user_password = :p", "e={$this->Email}&p={$this->Senha}");
        if($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }
    
    private function Execute() {
        if(!session_id()):
        session_start();
        endif;
        
        $_SESSION['userlogin'] = $this->Result;
        $this->Error = ["Olá {$this->Result['user_name']}, seja bem vindo(a). Aguarde Redirecionamento!", WS_ACCEPT];
        $this->Result = true;
        
    }

}
