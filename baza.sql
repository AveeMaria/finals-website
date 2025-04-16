CREATE DATABASE Game;
USE Game;

CREATE TABLE GameLog (
    Attacker VARCHAR(15) NOT NULL,
    Defender VARCHAR(15) NOT NULL,
    Date DATE,
    Time TIME
);

INSERT INTO GameLog (Attacker, Defender, FightDate, FightTime)
VALUES ('ipA', 'ipD', CURDATE(), CURTIME());