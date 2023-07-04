DROP TABLE IF EXISTS Volontari CASCADE;

CREATE TABLE Volontari (
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    età INTEGER NOT NULL,
    email VARCHAR(30) PRIMARY KEY,
    città VARCHAR(20) NOT NULL,
    telefono BIGINT NOT NULL,
    disponibilità VARCHAR NOT NULL,
    descrizione VARCHAR(100) NOT NULL
);

INSERT INTO Volontari (nome, cognome, età, email, città, telefono, disponibilità, descrizione)
    VALUES
        ('Mario', 'Rossi', 25, 'mario.rossi@gmail.com', 'Roma', 1234567890, 'Lunedì', 'Studente che offre compagnia'),
        ('Giulia', 'Bianchi', 30, 'giulia.bianchi@gmail.com', 'Milano', 9876543210, 'Martedì', 'Infermiere'),
        ('Luca', 'Verdi', 28, 'luca.verdi@gmail.com', 'Napoli', 4567890123, 'Mercoledì', 'Commesso');

-- Concedi tutti i privilegi all'utente www
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;

-- Visualizzo la tabella
SELECT * from Volontari;