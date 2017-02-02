--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: person_ac; Type: TABLE; Schema: public; Owner: tvykcavenuypkg
--

CREATE TABLE person_ac (
    id integer NOT NULL,
    username character varying(32) NOT NULL,
    password character varying(32) NOT NULL,
    income integer NOT NULL,
    tithing integer NOT NULL,
    basic_expense integer NOT NULL,
    others integer NOT NULL
);


ALTER TABLE person_ac OWNER TO tvykcavenuypkg;

--
-- Data for Name: person_ac; Type: TABLE DATA; Schema: public; Owner: tvykcavenuypkg
--

COPY person_ac (id, username, password, income, tithing, basic_expense, others) FROM stdin;
\.


--
-- Name: person_ac person_ac_pkey; Type: CONSTRAINT; Schema: public; Owner: tvykcavenuypkg
--

ALTER TABLE ONLY person_ac
    ADD CONSTRAINT person_ac_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: tvykcavenuypkg
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO tvykcavenuypkg;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO tvykcavenuypkg;


--
-- PostgreSQL database dump complete
--

