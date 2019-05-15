# Desafio AllBlacks

Este desafio foi construído utilizando Codeigniter.

Para funcionar devidamente, os seguintes valores devem ser alterados:
* **./application/config/config.php** - alterar a base_url para o endereço onde o sistema estiver rodando.
* **./application/models/dao/Factory.php** - alterar as informações de acesso ao banco de dados.

O script para o banco de dados é o **./allblacks.sql**.

Também foram utilizadas algumas dependências, que devem ser instaladas via Composer.

Para o envio dos e-mails, foi utilizado o Fake SMTP Server, servindo na porta 25, disponível [aqui](http://nilhcem.com/FakeSMTP/).

**Samuel Felipe**