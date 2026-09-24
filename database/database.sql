-- Database creation script for PostgreSQL
-- Run: CREATE DATABASE voting_system;
-- Then connect: \c voting_system;

CREATE TABLE IF NOT EXISTS voter (
    voter_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL, -- Used for Voter ID / Username
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    has_voted BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS candidate (
    candidate_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    party VARCHAR(100),
    symbol VARCHAR(100),
    vote_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admin (
    admin_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vote (
    vote_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    voter_id INT NOT NULL REFERENCES voter(voter_id) ON DELETE CASCADE,
    candidate_id INT NOT NULL REFERENCES candidate(candidate_id) ON DELETE CASCADE,
    voted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT unique_voter_vote UNIQUE (voter_id)
);
