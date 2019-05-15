<?php

require_once 'DAO.php';

class TorcedorDAO extends DAO {

    public function inserir(Torcedor $torcedor) {
        try {
            $sql = 'INSERT INTO torcedores (nome, documento, cep, endereco, bairro, cidade, uf, telefone, email, ativo) VALUES (?,?,?,?,?,?,?,?,?,?)';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                        $torcedor->getNome(),
                        $torcedor->getDocumento(),
                        $torcedor->getCep(),
                        $torcedor->getEndereco(),
                        $torcedor->getBairro(),
                        $torcedor->getCidade(),
                        $torcedor->getUF(),
                        $torcedor->getTelefone(),
                        $torcedor->getEmail(),
                        $torcedor->getAtivo()
                    ])) {
                throw new Exception('[INSERIR TORCEDOR] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function pesquisarDocumento(Torcedor $torcedor, $checkId = false) {
        try {
            $sql = 'SELECT id, documento FROM torcedores WHERE documento = ?';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                $torcedor->getDocumento()
            ])) {
                throw new Exception('[LISTAR CPF] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if ($checkId) {
                $test = true;
                foreach ($result as $r) {
                    if ($r['id'] != $torcedor->getId()) {
                        $test = false;
                    }
                }
                if (!$test) {
                    return 1;
                } else {
                    return 0;
                }
            }
            return count($result);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function alterar(Torcedor $torcedor) {
        try {
            $sql = 'UPDATE torcedores SET nome = ?, documento = ?, cep = ?, endereco = ?, '
                . 'bairro = ?, cidade = ?, uf = ?, telefone = ?, email = ?, ativo = ? WHERE id = ?';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                        $torcedor->getNome(),
                        $torcedor->getDocumento(),
                        $torcedor->getCep(),
                        $torcedor->getEndereco(),
                        $torcedor->getBairro(),
                        $torcedor->getCidade(),
                        $torcedor->getUF(),
                        $torcedor->getTelefone(),
                        $torcedor->getEmail(),
                        $torcedor->getAtivo(),
                        $torcedor->getId()
                    ])) {
                throw new Exception('[ALTERAR TORCEDOR] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function listar() {
        try {
            $sql = 'SELECT * FROM torcedores';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute()) {
                throw new Exception('[LISTAR TORCEDORES] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            $result = [];
            $this->load->model('torcedor');
            while ($r = $stm->fetch(PDO::FETCH_ASSOC)) {
                $torcedor = new Torcedor();
                $torcedor->setId($r['id']);
                $torcedor->setNome($r['nome']);
                $torcedor->setDocumento($r['documento']);
                $torcedor->setCep($r['cep']);
                $torcedor->setEndereco($r['endereco']);
                $torcedor->setBairro($r['bairro']);
                $torcedor->setCidade($r['cidade']);
                $torcedor->setUF($r['uf']);
                $torcedor->setTelefone($r['telefone']);
                $torcedor->setEmail($r['email']);
                $torcedor->setAtivo($r['ativo']);
                $result[] = $torcedor;
            }
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function listarDataTables($data) {
        try {
            $table = 'torcedores';
            $primaryKey = 'id';
            $columns = [
                ['db' => 'nome', 'dt' => 0],
                [
                    'db' => 'documento', 
                    'dt' => 1,
                    'formatter' => function ($d, $row) {
                        if (strlen($d) == 11) {
                            return preg_replace('/([0-9]{3})([0-9]{3})([0-9]{3})/', '$1.$2.$3-', $d);
                        } else if (strlen($d) == 14) {
                            return preg_replace('/([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})/', '$1.$2.$3/$4-', $d);
                        }
                    }
                ],
                ['db' => 'uf', 'dt' => 2],
                [
                    'db' => 'telefone', 
                    'dt' => 3,
                    'formatter' => function ($d, $row) {
                        $clean = preg_replace('/[^0-9]/', '', $d);
                        $phone = preg_replace('/^(\d{2})(9?\d{3,4})(\d{4})$/', '($1) $2-$3', $clean);
                        return $phone;
                    }
                ],
                ['db' => 'email', 'dt' => 4],
                [
                    'db' => 'ativo', 
                    'dt' => 5, 
                    'formatter' => function ($d, $row) {
                        return ($d) ? 'Sim' : 'Não';
                    }
                ],
                [
                    'db' => 'id',
                    'dt' => 6,
                    'formatter' => function ($d, $row) {
                        return ('
                            <a href="' . base_url('torcedores/enderecocompleto/' . $d) . '" class="btn btn-sm btn-secondary full-address" title="Ver endereço">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="' . base_url('torcedores/alterar/' . $d) . '" class="btn btn-sm btn-secondary" title="Editar">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a href="' . base_url('torcedores/excluir/' . $d) . '" class="btn btn-sm btn-secondary confirm" title="Excluir">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ');
                    }
                ]
            ];
            $this->load->library('SSP');
            return json_encode(SSP::simple($data, $this->c, $table, $primaryKey, $columns));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function listarEmails($somenteAtivos = true) {
        try {
            $sql = '';
            if ($somenteAtivos) {
                $sql = 'SELECT email FROM torcedores WHERE ativo = 1 AND email IS NOT NULL';
            } else {
                $sql = 'SELECT email FROM torcedores WHERE email IS NOT NULL';
            }
            $stm = $this->c->prepare($sql);
            if (!$stm->execute()) {
                throw new Exception('[LISTAR EMAILS] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            $result = [];
            $this->load->model('torcedor');
            while ($r = $stm->fetch(PDO::FETCH_ASSOC)) {
                $torcedor = new Torcedor();
                $torcedor->setEmail($r['email']);
                $result[] = $torcedor;
            }
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function listarPorId(Torcedor $torcedor) {
        try {
            $sql = 'SELECT * FROM torcedores WHERE id = ?';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                        $torcedor->getId()
                    ])) {
                throw new Exception('[LISTAR TORCEDORES] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            $r = $stm->fetch(PDO::FETCH_ASSOC);
            $torcedor->setNome($r['nome']);
            $torcedor->setDocumento($r['documento']);
            $torcedor->setCep($r['cep']);
            $torcedor->setEndereco($r['endereco']);
            $torcedor->setBairro($r['bairro']);
            $torcedor->setCidade($r['cidade']);
            $torcedor->setUF($r['uf']);
            $torcedor->setTelefone($r['telefone']);
            $torcedor->setEmail($r['email']);
            $torcedor->setAtivo($r['ativo']);
            return $this->torcedor;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function listarEnderecoPorId(Torcedor $torcedor) {
        try {
            $sql = 'SELECT nome, cep, endereco, bairro, cidade, uf FROM torcedores WHERE id = ?';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                        $torcedor->getId()
                    ])) {
                throw new Exception('[LISTAR TORCEDORES] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            $r = $stm->fetch(PDO::FETCH_ASSOC);
            $torcedor->setNome($r['nome']);
            $torcedor->setCep($r['cep']);
            $torcedor->setEndereco($r['endereco']);
            $torcedor->setBairro($r['bairro']);
            $torcedor->setCidade($r['cidade']);
            $torcedor->setUF($r['uf']);
            return $this->torcedor;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function excluir(Torcedor $torcedor) {
        try {
            $sql = 'DELETE FROM torcedores WHERE id = ?';
            $stm = $this->c->prepare($sql);
            if (!$stm->execute([
                        $torcedor->getId()
                    ])) {
                throw new Exception('[LISTAR TORCEDORES] Não foi possível completar a operação. ' . $stm->errorInfo()[2]);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

}