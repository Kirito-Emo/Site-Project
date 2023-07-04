DROP TABLE IF EXISTS Prenota CASCADE;

CREATE TABLE Prenota (
    email VARCHAR(50) NOT NULL,
    città VARCHAR NOT NULL,
    CAP INTEGER NOT NULL,
    indirizzo VARCHAR(50) NOT NULL,
    cellulare BIGINT NOT NULL,
    volontario VARCHAR NOT NULL,
    servizio VARCHAR NOT NULL,
    desc_servizio VARCHAR(100) NOT NULL,
    datas timestamp PRIMARY KEY
);

INSERT INTO Prenota (email, città, CAP, indirizzo, cellulare, volontario, servizio, desc_servizio, datas)
    VALUES
        ('giovannirenzullo@gmail.com', 'Roma', 12345, 'Via Roma 1', 3925074464, 'Emanuele', 'Compagnia', 'Passeggiata nel parco', '2023-06-26 10:00:00'),
        ('ettorefumagalli@gmail.com', 'Milano', 54321, 'Via GM Bosco', 3332524451, 'Matteo', 'Commissione', 'Spesa di carne', '2023-06-27 15:30:00'),
        ('marcorufo@gmail.com', 'Napoli', 67890, 'Via Napoli 3', 3455981298, 'Francesco', 'Aiuto medico', 'Sciroppo tosse', '2023-06-28 09:45:00'),
        ('giovannirenzullo@gmail.com', 'Roma', 12345, 'Via Roma 1', 3925074464, 'Riccardo', 'Commissione', 'Accompagnare nipoti a ripetizione', '2023-06-26 12:00:00'),
        ('marcorufo@gmail.com', 'Napoli', 67890, 'Via Napoli 3', 3455981298, 'Matteo', 'Compagnia', 'Chiacchierata', '2023-06-28 07:45:00'),
        ('vincenzopetricchione@gmail.com', 'Cosenza', 67893, 'Via Leopoldo 3', 3335743214, 'Aiuto medico', 'Compagnia', 'Passeggiata in città', '2023-06-28 18:45:00');

-- Concedi tutti i privilegi all'utente www
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;

-- Visualizzo la tabella
SELECT * from Prenota;