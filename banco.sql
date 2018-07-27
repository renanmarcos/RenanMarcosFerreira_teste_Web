CREATE TABLE motoristas (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    datanascimento DATE NOT NULL,
    cpf VARCHAR(19) NOT NULL,
    modelocarro VARCHAR(200) NOT NULL,
    status INT DEFAULT 1 NOT NULL,
    sexo CHAR(1) NOT NULL
);

CREATE TABLE passageiros (
    id SERIAL PRIMARY KEY,
	nome VARCHAR(200) NOT NULL,
    datanascimento DATE NOT NULL,
    cpf VARCHAR(19) NOT NULL,
    sexo CHAR(1) NOT NULL
);

CREATE TABLE users (
	id SERIAL PRIMARY KEY,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE corridas (
    idcorrida SERIAL PRIMARY KEY,
    idpassageiro INT,
    idmotorista INT,
    valor REAL,
    FOREIGN KEY (idpassageiro) REFERENCES passageiros(id),
    FOREIGN KEY (idmotorista) REFERENCES motoristas(id)
);

INSERT INTO users (email, senha) VALUES ('admin@fast-car.herokuapp.com', '$2y$10$0yB3L5Lybc/pTR/5//98UuKa0DwCjUvQtypvdNvuD2Sit38o/K97O');
INSERT INTO motoristas (nome, datanascimento, cpf, modelocarro, sexo) VALUES (
	'João', '10/06/1997', '123.123.123-12', 'Ford', 'M'
);
INSERT INTO passageiros (nome, datanascimento, cpf, sexo) VALUES (
	'Roberto', '02/11/1990', '321.123.625-90', 'M'
);
INSERT INTO corridas (idpassageiro, idmotorista, valor) VALUES (1, 1, 22.50);