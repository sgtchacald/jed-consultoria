CREATE TABLE jed_parametros_globais (
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    codigo varchar(40) NOT NULL,
    nome varchar(60) NOT NULL,
    descricao varchar(255) NOT NULL,
    unidade char(1) NOT NULL,
    valor TEXT NOT NULL,
    modulopai_id int NOT NULL,
    modulo_id int NULL,
    indstatus varchar(1) NOT NULL,
    dtcadastro TIMESTAMP NULL,
    dtedicao TIMESTAMP NULL,
    dtexclusao TIMESTAMP NULL,
    usucriou int NULL,
    usueditou int NULL,
    usuexcluiu int NULL,
    PRIMARY KEY (id)
);
