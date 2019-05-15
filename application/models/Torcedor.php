<?php

class Torcedor extends CI_Model {

    protected $id;
    protected $nome;
    protected $documento;
    protected $cep;
    protected $endereco;
    protected $bairro;
    protected $cidade;
    protected $uf;
    protected $telefone;
    protected $email;
    protected $ativo;
    const UF = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    ];

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDocumento($format = false) {
        if ($format) {
            if (strlen($this->documento) == 11) {
                return preg_replace('/([0-9]{3})([0-9]{3})([0-9]{3})/', '$1.$2.$3-', $this->documento);
            } else if (strlen($this->documento) == 14) {
                return preg_replace('/([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})/', '$1.$2.$3/$4-', $this->documento);
            }
        }
        return $this->documento;
    }

    public function getCep($format = false) {
        if ($format) {
            return preg_replace('/([0-9]{2})([0-9]{3})/', '$1.$2-', $this->cep);
        }
        return $this->cep;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUF() {
        return $this->uf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDocumento($documento) {
        $this->documento = preg_replace('/[^0-9]/', '', $documento);
    }

    public function setCep($cep) {
        $this->cep = preg_replace('/[^0-9]/', '', $cep);
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUF($uf) {
        $this->uf = $uf;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
    
}