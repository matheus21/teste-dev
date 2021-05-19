CREATE TABLE Usuario
(
    Id   SERIAL,
    cpf  VARCHAR(11),
    nome VARCHAR(255)
);

CREATE TYPE sexo AS ENUM('M', 'F');

CREATE TABLE Info
(
    Id             SERIAL,
    cpf            VARCHAR(11),
    genero         sexo,
    ano_nascimento SMALLINT
);

INSERT INTO Usuario (cpf, nome)
VALUES ('16798125050', 'Luke Skywalker'),
       ('07583509025', 'Bruce Wayne'),
       ('04707649025', 'Diane Prince'),
       ('21142450040', 'Bruce Banner'),
       ('83257946074', 'Harley Quinn'),
       ('59875804045', 'Peter Parker')
    INSERT
INTO Info (cpf, genero, ano_nascimento)
VALUES
    ('16798125050', 'M', 1976),
    ('07583509025', 'M', 1960),
    ('04707649025', 'F', 1988),
    ('21142450040', 'M', 1954),
    ('83257946074', 'F', 1970),
    ('59875804045', 'M', 1972)


SELECT CONCAT(u.nome, ' - ', i.genero) as usuario,
       CASE
           WHEN (date_part('year', now()) - i.ano_nascimento > 50) then 'SIM'
           ELSE 'NÃO'
           END                         AS maior_50_anos
FROM Info as i
         INNER JOIN Usuario AS u ON
    i.cpf = u.cpf
WHERE i.genero = 'M' LIMIT 3