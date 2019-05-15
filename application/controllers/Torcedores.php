<?php

class Torcedores extends MY_Controller {

    private $url = 'https://raw.githubusercontent.com/p21sistemas/skeleton21/master/clientes.xml';

    public function novo() {
        $this->load->model('torcedor');
        $this->load->template('novo_torcedor', [
            'active' => 'new',
            'estados' => Torcedor::UF
        ]);
    }

    public function listar() {
        try {
            $this->load->model('dao/torcedorDAO');
            print $this->torcedorDAO->listarDataTables($this->input->get());
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function alterar($id = null) {
        try {
            if (empty($id)) {
                throw new Exception('Comando inválido.');
            }
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $this->torcedor->setId($id);
            $this->load->template('alterar_torcedor', [
                'active' => 'home',
                'torcedor' => $this->torcedorDAO->listarPorId($this->torcedor),
                'estados' => Torcedor::UF
            ]);
        } catch (Exception $e) {
            $this->error($e);
        }
    }

    public function enderecoCompleto($id = null) {
        try {
            if (empty($id)) {
                throw new Exception('Comando inválido.');
            }
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $this->torcedor->setId($id);
            $this->load->view('endereco_completo', [
                'torcedor' => $this->torcedorDAO->listarEnderecoPorId($this->torcedor)
            ]);
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function xml() {
        $this->load->template('importar_xml', [
            'active' => 'xml',
            'url' => $this->url
            ]);
    }

    public function planilha() {
        $this->load->template('importar_planilha', [
            'active' => 'planilha'
        ]);
    }

    public function importarXml() {
        try {
            $this->load->model('xml');
            $xml = $this->xml->getXml($this->url);
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $incluidos = 0;
            $duplicados = 0;
            foreach ($xml as $registro) {
                $torcedor = new Torcedor();
                $torcedor->setNome($registro['nome']);
                $torcedor->setDocumento($registro['documento']);
                $torcedor->setCep($registro['cep']);
                $torcedor->setEndereco($registro['endereco']);
                $torcedor->setBairro($registro['bairro']);
                $torcedor->setCidade($registro['cidade']);
                $torcedor->setUF($registro['uf']);
                $torcedor->setTelefone($registro['telefone']);
                $torcedor->setEmail($registro['email']);
                $torcedor->setAtivo($registro['ativo']);
                if ($this->torcedorDAO->pesquisarDocumento($torcedor) > 0) {
                    $duplicados++;
                    continue;
                }
                $this->torcedorDAO->inserir($torcedor);
                $incluidos++;
            }
            print 'Encontrados ' . $duplicados . ' torcedores em duplicidade. <br />';
            print 'Foram incluídos ' . $incluidos . ' torcedores. <br />';
            print 'Total de ' . ($duplicados + $incluidos) . ' registros.';
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function importarPlanilha() {
        try {
            // Verificando extensões aceitas
            $extensions = ['xls', 'xlsx', 'odt'];
            $file_name = explode('.', $_FILES['document']['name']);
            $file_extension = end($file_name);
            if (! in_array($file_extension, $extensions)) {
                throw new Exception('Extensão do arquivo inválida.');
            }

            // Verificando tamanho do arquivo
            if ($_FILES['document']['size'] > 2097152) {
                throw new Exception('O arquivo deve ter no máximo 2 MB.');
            }

            $tmp_name = $_FILES['document']['tmp_name'];
            $this->load->model('sheet');
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $sheetData = $this->sheet->read($tmp_name);
            $incluidos = 0;
            $duplicados = 0;
            foreach ($sheetData as $k => $registro) {
                if ($k == 1) {
                    continue;
                }
                $torcedor = new Torcedor();
                $torcedor->setNome(ucwords(strtolower($registro['A'])));
                $torcedor->setDocumento($registro['B']);
                $torcedor->setCep($registro['C']);
                $torcedor->setEndereco($registro['D']);
                $torcedor->setBairro($registro['E']);
                $torcedor->setCidade($registro['F']);
                $torcedor->setUF($registro['G']);
                $torcedor->setTelefone($registro['H']);
                $torcedor->setEmail($registro['I']);
                $torcedor->setAtivo(($registro['J'] == 'SIM') ? true : false);
                if ($this->torcedorDAO->pesquisarDocumento($torcedor) > 0) {
                    $duplicados++;
                    continue;
                }
                $this->torcedorDAO->inserir($torcedor);
                $incluidos++;
            }
            print 'Encontrados ' . $duplicados . ' torcedores em duplicidade. <br />';
            print 'Foram incluídos ' . $incluidos . ' torcedores. <br />';
            print 'Total de ' . ($duplicados + $incluidos) . ' registros.';
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function salvar($id = null) {
        try {
            $nome = $this->input->post('nome');
            $documento = $this->input->post('documento');
            $cep = $this->input->post('cep');
            $endereco = $this->input->post('endereco');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $ativo = $this->input->post('ativo');
            if (empty($nome)
                || empty($documento)
                || empty($cep)
                || empty($endereco)
                || empty($bairro)
                || empty($cidade)
                || empty($uf)
            ) {
                throw new Exception('<strong>ERRO:</strong> Os campos assinalados por * são obrigatórios.');
            }
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $this->torcedor->setNome($nome);
            $this->torcedor->setDocumento($documento);
            $this->torcedor->setCep($cep);
            $this->torcedor->setEndereco($endereco);
            $this->torcedor->setBairro($bairro);
            $this->torcedor->setCidade($cidade);
            $this->torcedor->setUF($uf);
            $this->torcedor->setTelefone($telefone);
            $this->torcedor->setEmail($email);
            $this->torcedor->setAtivo((isset($ativo)) ? true : false);
            if (isset($id)) {
                $this->torcedor->setId($id);
                if ($this->torcedorDAO->pesquisarDocumento($this->torcedor, true) > 0) {
                    throw new Exception('Já existe um torcedor com o documento informado.');
                }
                $this->torcedorDAO->alterar($this->torcedor);
            } else {
                if ($this->torcedorDAO->pesquisarDocumento($this->torcedor) > 0) {
                    throw new Exception('Já existe um torcedor com o documento informado.');
                }
                $this->torcedorDAO->inserir($this->torcedor);
            }
            redirect(base_url() . '?updated=true');
        } catch (Exception $e) {
            $this->error($e);
        }
    }

    public function excluir($id) {
        try {
            if (empty($id)) {
                throw new Exception('Comando inválido.');
            }
            $this->load->model('torcedor');
            $this->load->model('dao/torcedorDAO');
            $this->torcedor->setId($id);
            $this->torcedorDAO->excluir($this->torcedor);
            redirect(base_url('?deleted=true'));
        } catch (Exception $e) {
            $this->error($e);
        }
    }

    public function malaDireta() {
        $this->load->template('mala_direta', [
            'active' => 'mala'
        ]);
    }

    public function enviarMalaDireta() {
        try {
            $assunto = $this->input->post('assunto');
            $toAll = $this->input->post('to-all');
            $msg = trim($this->input->post('msg'));
            if (empty($assunto) || empty($msg) || $msg == '<div><br></div>') {
                throw new Exception('Os campos com * são de preenchimento obrigatório.');
            }
            $this->load->model('mail');
            $this->load->model('dao/torcedorDAO');
            if (empty($toAll)) {
                $torcedores = $this->torcedorDAO->listarEmails(false);
            } else {
                $torcedores = $this->torcedorDAO->listarEmails();
            }
            foreach ($torcedores as $torcedor) {
                $this->mail->send($torcedor->getEmail(), $assunto, $msg);
            }
            print 'Todos os e-mails foram enviados com sucesso.';
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

}