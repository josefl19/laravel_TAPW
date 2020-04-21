--
-- PostgreSQL database dump
--

-- Dumped from database version 11.6 (Debian 11.6-0+deb10u1)
-- Dumped by pg_dump version 11.6 (Debian 11.6-0+deb10u1)

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

SET default_with_oids = false;

--
-- Name: about; Type: TABLE; Schema: public; Owner: jose
--

CREATE TABLE public.about (
    id integer NOT NULL,
    foto character varying(50),
    nombre character varying(50),
    puesto character varying(50)
);


ALTER TABLE public.about OWNER TO jose;

--
-- Name: about_id_seq; Type: SEQUENCE; Schema: public; Owner: jose
--

CREATE SEQUENCE public.about_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.about_id_seq OWNER TO jose;

--
-- Name: about_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jose
--

ALTER SEQUENCE public.about_id_seq OWNED BY public.about.id;


--
-- Name: contact; Type: TABLE; Schema: public; Owner: jose
--

CREATE TABLE public.contact (
    id integer NOT NULL,
    nombre character varying(50),
    email character varying(50),
    mensaje text
);


ALTER TABLE public.contact OWNER TO jose;

--
-- Name: contact_id_seq; Type: SEQUENCE; Schema: public; Owner: jose
--

CREATE SEQUENCE public.contact_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contact_id_seq OWNER TO jose;

--
-- Name: contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jose
--

ALTER SEQUENCE public.contact_id_seq OWNED BY public.contact.id;


--
-- Name: portafolio; Type: TABLE; Schema: public; Owner: jose
--

CREATE TABLE public.portafolio (
    id integer NOT NULL,
    foto character varying(50),
    nombrecliente character varying(50),
    fecha date,
    descproyecto character varying(150)
);


ALTER TABLE public.portafolio OWNER TO jose;

--
-- Name: portafolio_id_seq; Type: SEQUENCE; Schema: public; Owner: jose
--

CREATE SEQUENCE public.portafolio_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.portafolio_id_seq OWNER TO jose;

--
-- Name: portafolio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jose
--

ALTER SEQUENCE public.portafolio_id_seq OWNED BY public.portafolio.id;


--
-- Name: services; Type: TABLE; Schema: public; Owner: jose
--

CREATE TABLE public.services (
    id integer NOT NULL,
    icono character varying(50),
    nombre character varying(50),
    descripcion character varying(100)
);


ALTER TABLE public.services OWNER TO jose;

--
-- Name: services_id_seq; Type: SEQUENCE; Schema: public; Owner: jose
--

CREATE SEQUENCE public.services_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.services_id_seq OWNER TO jose;

--
-- Name: services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jose
--

ALTER SEQUENCE public.services_id_seq OWNED BY public.services.id;


--
-- Name: about id; Type: DEFAULT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.about ALTER COLUMN id SET DEFAULT nextval('public.about_id_seq'::regclass);


--
-- Name: contact id; Type: DEFAULT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.contact ALTER COLUMN id SET DEFAULT nextval('public.contact_id_seq'::regclass);


--
-- Name: portafolio id; Type: DEFAULT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.portafolio ALTER COLUMN id SET DEFAULT nextval('public.portafolio_id_seq'::regclass);


--
-- Name: services id; Type: DEFAULT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.services ALTER COLUMN id SET DEFAULT nextval('public.services_id_seq'::regclass);


--
-- Data for Name: about; Type: TABLE DATA; Schema: public; Owner: jose
--

COPY public.about (id, foto, nombre, puesto) FROM stdin;
1	team2	Christ Wisoky	Vicepresidente
2	team1	Monroe Schultz	Asistente Vicepresidencia
3	team2	Amara Hoeger	Presidente
4	team1	Kelsie Conroy	Presidente
5	team2	Maud Kovacek	Vicepresidente
6	team3	Vivienne Yundt Jr.	Presidente
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: jose
--

COPY public.contact (id, nombre, email, mensaje) FROM stdin;
1	Mariana	mail@gmail.com	Hola mundo!
2	Jose	jose@mail.com	Prueba para video
\.


--
-- Data for Name: portafolio; Type: TABLE DATA; Schema: public; Owner: jose
--

COPY public.portafolio (id, foto, nombrecliente, fecha, descproyecto) FROM stdin;
1	item1	Dr. Hoyt Hilpert	1994-02-04	Cupiditate impedit voluptas rerum.
2	item2	Prof. Asa Heller DVM	1972-08-10	Id officia et atque tempora.
3	item5	Leslie Wolff DVM	1974-12-24	Ut aliquam iste id quia.
4	item1	Mrs. Lola Friesen	2014-09-28	Quasi aut qui deleniti.
5	item4	Alfonso Dickinson	1974-08-31	Consequatur velit repellat consequatur dolor error.
6	item5	Sid Waelchi	2000-09-22	Enim animi maiores sed praesentium nesciunt.
7	item4	Colleen Collier	2004-07-14	Omnis nam vel reprehenderit ipsa aut.
8	item5	Dr. Creola Emard Jr.	1984-08-04	Consequatur itaque aut molestias.
\.


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: jose
--

COPY public.services (id, icono, nombre, descripcion) FROM stdin;
1	icon-linux icon-md icon-color6	Modi at.	Harum ullam.
2	icon-linux icon-md icon-color6	Eos quasi.	Doloremque occaecati.
3	icon-windows icon-md icon-color4	Qui omnis voluptatem.	Aspernatur sed in.
4	icon-apple icon-md icon-color1	Ipsam non et.	Perferendis quia ab.
5	icon-android icon-md icon-color2	Qui sint asperiores.	Rerum ullam non.
6	icon-apple icon-md icon-color1	Iure ut.	Quae voluptas officia.
7	icon-linux icon-md icon-color6	Est neque exercitationem.	Quibusdam repellendus.
8	icon-skype icon-md icon-color3	Id corporis et.	Perferendis voluptate.
9	icon-windows icon-md icon-color4	Officiis sit.	Porro ab dicta.
10	icon-skype icon-md icon-color3	Est ullam.	Quas enim.
\.


--
-- Name: about_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jose
--

SELECT pg_catalog.setval('public.about_id_seq', 6, true);


--
-- Name: contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jose
--

SELECT pg_catalog.setval('public.contact_id_seq', 2, true);


--
-- Name: portafolio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jose
--

SELECT pg_catalog.setval('public.portafolio_id_seq', 8, true);


--
-- Name: services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jose
--

SELECT pg_catalog.setval('public.services_id_seq', 10, true);


--
-- Name: about about_pkey; Type: CONSTRAINT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.about
    ADD CONSTRAINT about_pkey PRIMARY KEY (id);


--
-- Name: contact contact_pkey; Type: CONSTRAINT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id);


--
-- Name: portafolio portafolio_pkey; Type: CONSTRAINT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.portafolio
    ADD CONSTRAINT portafolio_pkey PRIMARY KEY (id);


--
-- Name: services services_pkey; Type: CONSTRAINT; Schema: public; Owner: jose
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

