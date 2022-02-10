CREATE TABLE  (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    descricao TEXT NOT NULL,
    urlimagem TEXT NULL,
    idpai int NULL,
    indstatus varchar(1) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);

ALTER TABLE jed_servicos ADD urlservicoexterno TEXT AFTER urlimagem;


