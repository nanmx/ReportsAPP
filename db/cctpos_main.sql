--
-- PostgreSQL database dump
--

-- Dumped from database version 12.18 (Ubuntu 12.18-1.pgdg22.04+1)
-- Dumped by pg_dump version 12.18 (Ubuntu 12.18-1.pgdg22.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: app_config; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.app_config (
    key character varying(255) NOT NULL,
    value character varying(255)
);


ALTER TABLE public.app_config OWNER TO postgres;

--
-- Name: modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modules (
    module_id character varying(255) NOT NULL,
    sort integer NOT NULL
);


ALTER TABLE public.modules OWNER TO postgres;

--
-- Name: people; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.people (
    person_id integer NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    phone_number character varying(255),
    email character varying(255),
    address_1 character varying(255)
);


ALTER TABLE public.people OWNER TO postgres;

--
-- Name: people_person_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.people ALTER COLUMN person_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.people_person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    module_id character varying(255) NOT NULL,
    person_id integer NOT NULL,
    permissions text,
    allowed integer DEFAULT 1
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    person_id integer NOT NULL,
    username character varying(255) NOT NULL,
    password bytea,
    deactivate integer DEFAULT 0 NOT NULL,
    cle bytea
);


ALTER TABLE public.users OWNER TO postgres;

CREATE TABLE public.budgets (
    budget_id integer NOT NULL,
    budget numeric DEFAULT 0 NOT NULL,
    fecha date NOT NULL,
    type character varying(255) NOT NULL,
    sucursal character varying(255) NOT NULL,
    state integer   DEFAULT 0,
    month integer NOT NULL,
    year integer NOT NULL
);
--
ALTER TABLE public.budgets OWNER TO postgres;
-- Data for Name: app_config; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.app_config (key, value) FROM stdin;
additional_phones	
address	Avenida siempre viva #SN
add_tax_after_total	0
BingSiteAuth	
blog	5
cct_version_template	1
coin	MXN
colonia	
company	Cash and Control
country	MX
cp	
default_tax_1_name	002-IVA
default_tax_1_rate	1.16
default_tax_2_name	Sales Tax 2
default_tax_2_rate	
email	admin@cashcontrolpos.com
estado	
facebook	
google	
id_de_seguimiento	UA-133961697-1
instagram	
language	ES
localidad	
locality	
main_user_id	1
MetodoPago	
municipio	
notify_level	3
no_exterior	
no_interior	
paginacion	20
pepper	fZJhxeJ8jJmQ5UtUhpysuYbMYh4hkVws
phone	322 5454584
pinterest	
policy	Test
postalcode	
print_receipt	0
schedule	Lun - Sab 9:00 am - 9:00pm
services	6
sitekey	6LdJQKkmAAAAAPt6p2uFBPQ2xGENMV_wL5zMxrTV
slogan	
store	2
tasa_de_utilidad	1.3
template	cctpos
tiktok	
timezone	America/Mexico_City
tripadvisor	
twitter	
vimeo	
website	
xchange_show	0
yelp	
youtube	
\.


--
-- Data for Name: modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modules (module_id, sort) FROM stdin;
\.


--
-- Data for Name: people; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.people (person_id, first_name, last_name, phone_number, email, address_1) FROM stdin;
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (module_id, person_id, permissions, allowed) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (person_id, username, password, deactivate, cle) FROM stdin;
\.


--
-- Name: people_person_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.people_person_id_seq', 1, false);


--
-- Name: app_config app_config_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.app_config
    ADD CONSTRAINT app_config_pkey PRIMARY KEY (key);


--
-- Name: modules modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_pkey PRIMARY KEY (module_id);


--
-- Name: people people_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.people
    ADD CONSTRAINT people_email_key UNIQUE (email);


--
-- Name: people people_phone_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.people
    ADD CONSTRAINT people_phone_number_key UNIQUE (phone_number);


--
-- Name: people people_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.people
    ADD CONSTRAINT people_pkey PRIMARY KEY (person_id);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (module_id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (person_id);


--
-- Name: permissions fk_module_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT fk_module_id FOREIGN KEY (module_id) REFERENCES public.modules(module_id);


--
-- Name: users fk_person_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_person_id FOREIGN KEY (person_id) REFERENCES public.people(person_id);


--
-- Name: permissions fk_person_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT fk_person_id FOREIGN KEY (person_id) REFERENCES public.users(person_id);


--
-- PostgreSQL database dump complete
--

