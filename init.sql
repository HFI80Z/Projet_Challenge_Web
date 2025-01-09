DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_database WHERE datname = 'todolist') THEN
        PERFORM dblink_exec('dbname=postgres', 'CREATE DATABASE todolist');
    END IF;
END $$;

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    region VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS annonces (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    prix NUMERIC(10,2) NOT NULL DEFAULT 0.00,
    user_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    image VARCHAR(255),
    CONSTRAINT fk_annonces_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS reservations (
    id SERIAL PRIMARY KEY,
    annonce_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reservations_annonces FOREIGN KEY (annonce_id) REFERENCES annonces(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservations_users FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
