<?php
#Arquivo com a declaração da classe service para Usuario

class UsuarioService {
    private const SESSAO_ID = "sessaoId";
    private const SESSAO_NOME = "sessaoNome";

    public function validarDadosLogin(string $login, string $senha) {
        $erros = array();

        /* Validação dos campos de login */
        if(! $login) array_push($erros, "O campo [Login] é obrigatório."); 
        if(! $senha) array_push($erros, "O campo [Senha] é obrigatório.");  

        return $erros;
    }

    public function salvarUsuarioSessao(Usuario $usuario){
        session_start(); // Habilitando o recurso de sessão

        /* Salvando os dados de login */
        $_SESSION[UsuarioService::SESSAO_ID] = $usuario->getId(); 
        $_SESSION[UsuarioService::SESSAO_NOME] = $usuario->getNome(); 
    }

    public function removerUsuarioSessao(){
        $this->iniciarSessao(); // Habilitando o recurso de sessão
        session_unset(); // Remove os dados da sessão
        session_destroy(); // Destroi a sessao
    }

    public function existeUsuarioSessao(): bool{
        $this->iniciarSessao(); // Habilitando o recurso de sessão
        if(isset($_SESSION[UsuarioService::SESSAO_ID])) return true; // Se o id existe retorna verdadeiro
        return false; // Se não retorna falso
    }

    public function getNomeUsuarioLogado(){
        if($this->existeUsuarioSessao()) return $_SESSION[UsuarioService::SESSAO_NOME];
        return "Não logado";
    }

    private function iniciarSessao(){
        if(session_status() != PHP_SESSION_ACTIVE) session_start();
    }

}