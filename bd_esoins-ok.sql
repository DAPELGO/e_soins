--
-- PostgreSQL database dump
--

-- Dumped from database version 14.8 (Homebrew)
-- Dumped by pg_dump version 14.8 (Homebrew)

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
-- Name: actes; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.actes (
    id bigint NOT NULL,
    code_acte character varying(255),
    description character varying(255),
    unit_cost character varying(255),
    provenance character varying(255),
    niveau character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.actes OWNER TO usereflux;

--
-- Name: actes_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.actes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actes_id_seq OWNER TO usereflux;

--
-- Name: actes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.actes_id_seq OWNED BY public.actes.id;


--
-- Name: equipements; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.equipements (
    id bigint NOT NULL,
    code_equipement character varying(255),
    description character varying(255),
    "group" character varying(255),
    unit_cost_drd character varying(255),
    unit_cost_pvp character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.equipements OWNER TO usereflux;

--
-- Name: equipements_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.equipements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipements_id_seq OWNER TO usereflux;

--
-- Name: equipements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.equipements_id_seq OWNED BY public.equipements.id;


--
-- Name: exercices; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.exercices (
    id bigint NOT NULL,
    libelle character varying(255),
    date_debut date,
    date_fin date,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.exercices OWNER TO usereflux;

--
-- Name: exercices_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.exercices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.exercices_id_seq OWNER TO usereflux;

--
-- Name: exercices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.exercices_id_seq OWNED BY public.exercices.id;


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    nom_permission character varying(255),
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO usereflux;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO usereflux;

--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.products (
    id bigint NOT NULL,
    code_product character varying(255),
    name character varying(255),
    unit character varying(255),
    product_id character varying(255),
    description character varying(255),
    category character varying(255),
    program_id character varying(255),
    cost character varying(255),
    max_age_months character varying(255),
    form character varying(255),
    optional character varying(255),
    med_key character varying(255),
    dose_style character varying(255),
    max_weight character varying(255),
    id_traceur character varying(255),
    class character varying(255),
    min_weight character varying(255),
    prix_drd character varying(255),
    min_age_months character varying(255),
    short character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.products OWNER TO usereflux;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO usereflux;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    nom_role character varying(255),
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO usereflux;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO usereflux;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: structures; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.structures (
    id bigint NOT NULL,
    parent_id bigint DEFAULT '0'::bigint NOT NULL,
    nom_structure character varying(255) NOT NULL,
    description_structure text,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_typestructure integer DEFAULT 0
);


ALTER TABLE public.structures OWNER TO usereflux;

--
-- Name: structures_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.structures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.structures_id_seq OWNER TO usereflux;

--
-- Name: structures_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.structures_id_seq OWNED BY public.structures.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    structure_id integer DEFAULT 0,
    statut boolean DEFAULT false
);


ALTER TABLE public.users OWNER TO usereflux;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO usereflux;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: actes id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.actes ALTER COLUMN id SET DEFAULT nextval('public.actes_id_seq'::regclass);


--
-- Name: equipements id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.equipements ALTER COLUMN id SET DEFAULT nextval('public.equipements_id_seq'::regclass);


--
-- Name: exercices id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.exercices ALTER COLUMN id SET DEFAULT nextval('public.exercices_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: structures id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.structures ALTER COLUMN id SET DEFAULT nextval('public.structures_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: actes; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.actes (id, code_acte, description, unit_cost, provenance, niveau, created_at, updated_at) FROM stdin;
1	act2	Accouchement normal (eutocique)	900	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
2	act3	AMIU	1500	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
3	act4	Consultation curative infirmière /SFE & ME	200	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
4	act5	Consultation de la femme enceinte malade	200	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
5	act6	Consultation prénatale	100	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
6	act7	Délivrance artificielle/Révision utérine	500	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
7	act8	Dépistage des lésions précancéreuses du col à IVA/IVL	500	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
8	act9	Extraction de corps étranger de l’oreille	500	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
9	act10	Incision d’abcès	300	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
10	act11	Injection en ambulatoire (IM, IV, SC)	100	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
11	act12	Lavage d’oreille	300	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
12	act13	Mise en observation par jour	100	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
13	act14	Pansement et petite chirurgie	100	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
14	act15	Suture par point	300	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
15	act16	Test rapide Albumine/ sucre/ paludisme	200	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
16	act17	Consultation nourrissons sains	300	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
17	act18	Consultation post-natale	250	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
18	act19	Consultation pour PF	200	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
19	act20	Insertion/retrait de DIU	875	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
20	act21	Insertion/retrait implants	500	csps	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
21	act22	Accouchement dystocique	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
22	act23	Accouchement eutocique	900	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
23	act24	AMIU	2000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
24	act25	Circoncision enfant pour Phymosis serré	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
25	act26	Consultation curative infirmière	300	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
26	act27	Consultation curative infirmière spécialiste (AS)	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
27	act28	Consultation directe du médecin généraliste (CMG)	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
28	act29	Consultation Maïeuticien/ Sage-femme	300	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
29	act30	Consultation prénatale (CPN)	100	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
30	act31	Délivrance artificielle/ Révision utérine	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
31	act32	Dépistage des lésions précancéreuses du col à IVA/IVL	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
32	act33	12 Évacuation sanitaire vers le CMA 120/km	120	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
33	act34	Extraction de corps étranger	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
34	act35	Forfait soins infirmiers pendant l’hospitalisation	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
35	act36	Hospitalisation par jour	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
36	act37	Incision d’abcès	300	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
37	act38	Injection en ambulatoire (IM, IV, SC)	100	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
38	act39	Lavage d'oreille	300	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
39	act40	Pansement (forfait)	100	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
40	act41	Ponction d’ascite	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
41	act42	Ponction pleurale	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
42	act43	Ponction sus pubienne	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
43	act44	Pose de sonde urinaire et ablation sonde urinaire	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
44	act45	Suture par point	300	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
45	act46	Consultation pour PF	200	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
46	act47	Insertion d’implant	750	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
47	act48	Retrait d’implant	750	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
48	act49	Insertion DIU	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
49	act50	Retrait DIU	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
50	act51	Hémoculture + Antibiogramme	5000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
51	act52	Ions (sodium, potassium, calcium, magnésium, chlore, phosphore, bicarbonate...)	3500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
52	act53	Injection de produits contraceptifs	100	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
53	act54	Créatininémie	2000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
54	act55	Glycémie	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
55	act56	Goutte épaisse	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
56	act57	GS/Rh	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
57	act58	NFS	3000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
58	act59	RPR/BW/VDRL	2000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
59	act60	SDW	2500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
60	act61	Taux d’hémoglobine/d’hématocrite (TXHB)	1000	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
61	act62	VS	500	cma	\N	2023-07-28 10:42:25	2023-07-28 10:42:25
\.


--
-- Data for Name: equipements; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.equipements (id, code_equipement, description, "group", unit_cost_drd, unit_cost_pvp, created_at, updated_at) FROM stdin;
1	aiguille2	Aiguille à ponction lombaire 20G, unité	aiguille	956	1 000	2023-07-28 11:54:09	2023-07-28 11:54:09
2	aiguille3	Aiguille à ponction lombaire 22G, unité	aiguille	956	1 000	2023-07-28 11:54:09	2023-07-28 11:54:09
3	bande1	Bande de crêpe 4m x 10cm, unité	bande	421.6	500	2023-07-28 11:54:09	2023-07-28 11:54:09
4	bande2	Bande extensible 3m x 10cm, unité	bande	123.3	150	2023-07-28 11:54:09	2023-07-28 11:54:09
5	bande3	Bande platrée 3m x 15cm BSN, unité	bande	488.7	625	2023-07-28 11:54:09	2023-07-28 11:54:09
6	bande4	Bande platrée 3m x 20cm, unité	bande	995.6	1 250	2023-07-28 11:54:09	2023-07-28 11:54:09
7	bande5	Bandelettes réactives (albumine ,sucre), unité	bande	45.8	60	2023-07-28 11:54:09	2023-07-28 11:54:09
8	boite1	Boîte de récupération de seringues usagées, unité	boite	2 880 6	3 745	2023-07-28 11:54:09	2023-07-28 11:54:09
9	collier1	Collier de cycle, unité	collier	43	55	2023-07-28 11:54:09	2023-07-28 11:54:09
10	ccs1	Compresse 40cm x 40cm, unité	ccs	74 2	95	2023-07-28 11:54:09	2023-07-28 11:54:09
11	ccs2	Coton hydrophile 100g, unité	ccs	667.5	850	2023-07-28 11:54:09	2023-07-28 11:54:09
12	ccs3	Coton hydrophile 500g, unité	ccs	2 492,6	3 240	2023-07-28 11:54:09	2023-07-28 11:54:09
13	ccs4	Coton hydrophile 50g, unité	ccs	354y8	ooo	2023-07-28 11:54:09	2023-07-28 11:54:09
14	ccs5	coton salivaire N°2, unité	ccs	6.5	8	2023-07-28 11:54:09	2023-07-28 11:54:09
15	dispositif1	Dispositif intra Utérin (DIU) TCu 380 A, unité	dispositif	175	227	2023-07-28 11:54:09	2023-07-28 11:54:09
16	gant1	Gant chirurgical latex stéril N°7,5, paire	gant	274.2	325	2023-07-28 11:54:09	2023-07-28 11:54:09
17	gant2	Gant chirurgical latex stéril N°8, paire	gant	274.2	325	2023-07-28 11:54:09	2023-07-28 11:54:09
18	gant3	Gant de réVision uterine, paire	gant	587.3	760	2023-07-28 11:54:09	2023-07-28 11:54:09
19	gant4	Gant d'examen latex Taille L, unitë	gant	60.1	75	2023-07-28 11:54:09	2023-07-28 11:54:09
20	gant5	Gant d'examen latex Taille M, unité	gant	60.1	75	2023-07-28 11:54:09	2023-07-28 11:54:09
21	intranule1	Intranule avec ailettes 18G, unité	intranule	117.8	150	2023-07-28 11:54:09	2023-07-28 11:54:09
22	intranule2	Intranule avec ailettes 20G, unité	intranule	117.8	150	2023-07-28 11:54:09	2023-07-28 11:54:09
23	intranule3	lntranule avec ailettes 22G, unité	intranule	93.4	120	2023-07-28 11:54:09	2023-07-28 11:54:09
24	intranule4	Intranule a\\/ec ailettes 24G, unité	intranule	200.7	240	2023-07-28 11:54:09	2023-07-28 11:54:09
25	lame1	Lame de bistouri N°11, unité	lame	43.2	56	2023-07-28 11:54:09	2023-07-28 11:54:09
26	lame2	Lame de bistouri N°15, unité	lame	26.2	34	2023-07-28 11:54:09	2023-07-28 11:54:09
27	lame3	Lame de bistouri N•20, unité	lame	137.4	179	2023-07-28 11:54:09	2023-07-28 11:54:09
28	lame4	Lame de bistouri N°22, unité	lame	34.3	45	2023-07-28 11:54:09	2023-07-28 11:54:09
29	lame5	Lame de bistouri N°24, unité	lame	29.4	38	2023-07-28 11:54:09	2023-07-28 11:54:09
30	perfuseur1	Perfuseur avec aiguille à usage unique, unité	perfuseur	108.9	140	2023-07-28 11:54:09	2023-07-28 11:54:09
31	poche1	Poche à urine avec vidange 2 litres, unitê	poche	458.3	590	2023-07-28 11:54:09	2023-07-28 11:54:09
32	polyamide1	Polyamide monofil noir (éthicrin) 90cm déc.1,5, (4/0), unité	polyamide	361.8	470	2023-07-28 11:54:09	2023-07-28 11:54:09
33	polyamide3	Polyamide monofil noir (éthicrin) 90cm déc.2 (3/0), unité	polyamide	305.3	395	2023-07-28 11:54:09	2023-07-28 11:54:09
34	polyamide5	Polyamide monofil noir (éthicrin) 90cm déc.3 (2/0),	polyamide	372.5	480	2023-07-28 11:54:09	2023-07-28 11:54:09
35	polyamide7	Polyamide monofil noir (éthicrin) 90cm déc.4 (1),	polyamide	330.6	430	2023-07-28 11:54:09	2023-07-28 11:54:09
36	polyamide9	Polyamide monofil noir (éthicrin) 90cm déc.5 (2),	polyamide	314.2	400	2023-07-28 11:54:09	2023-07-28 11:54:09
37	polyamide11	Polyester tréssé traité (mersuture) 75cm déc.3 (2/0), unité	polyamide	433.6	560	2023-07-28 11:54:09	2023-07-28 11:54:09
38	polyamide13	Polyglactine tressé traité (vicryl) 90/75cm déc.2 (3/0), unité	polyamide	800.7	1 041	2023-07-28 11:54:09	2023-07-28 11:54:09
39	polyamide15	Polyglactine tressé traité (vicryl) 90cm déc.3 (2/0), unité	polyamide	1 036,4	1 300	2023-07-28 11:54:09	2023-07-28 11:54:09
40	polyamide17	Polyglactine tressë traité (vicryl) 90cm déc.4 (1), unité	polyamide	1 055.1	1 370	2023-07-28 11:54:09	2023-07-28 11:54:09
41	polyamide19	Polyglactine tressé traité (vicryl) 90cm déc.5 (2), unité	polyamide	964.9	1250	2023-07-28 11:54:09	2023-07-28 11:54:09
42	preservatif1	Préservatif féminin lubrifié, unité	preservatif	10.8	1250	2023-07-28 11:54:09	2023-07-28 11:54:09
43	preservatif2	Préservatif masculin lubrifié, unité	preservatif	3.2	4	2023-07-28 11:54:09	2023-07-28 11:54:09
44	seringue1	Seringue 10ml + aiguille, unité	seringue	57.4	70	2023-07-28 11:54:09	2023-07-28 11:54:09
45	seringue2	Seringue 1ml + aiguille 29G, unité	seringue	39.3	50	2023-07-28 11:54:09	2023-07-28 11:54:09
46	seringue3	Seringue 20mI + aiguille, unité	seringue	58.4	75	2023-07-28 11:54:09	2023-07-28 11:54:09
47	seringue4	Seringue 2ml + aiguille, unité	seringue	101.3	130	2023-07-28 11:54:09	2023-07-28 11:54:09
48	seringue5	Seringue 5mI + aiguille, unité	seringue	51.2	60	2023-07-28 11:54:09	2023-07-28 11:54:09
49	seringue6	Seringue 60ml pour gavage, unité	seringue	224.2	290	2023-07-28 11:54:09	2023-07-28 11:54:09
50	seringue7	Seringue à insuline 100Ul + aiguille 29G, unité	seringue	39.5	50	2023-07-28 11:54:09	2023-07-28 11:54:09
51	seringue8	Seringue autobloquante 0,5mI , unité	seringue	68.3	89	2023-07-28 11:54:09	2023-07-28 11:54:09
52	sonde1	Sonde d’aspiration bronchique CH10, unité	sonde	285	370	2023-07-28 11:54:09	2023-07-28 11:54:09
53	sonde2	Sonde d’aspiration bronchique CH12, unité	sonde	479.4	620	2023-07-28 11:54:09	2023-07-28 11:54:09
54	sonde3	Sonde d'aspiration bronchique CH14, unité	sonde	147.6	190	2023-07-28 11:54:09	2023-07-28 11:54:09
55	sonde4	Sonde d'aspiration bronchique CH16, unité	sonde	389.6	500	2023-07-28 11:54:09	2023-07-28 11:54:09
56	sonde5	Sonde d'aspiration bronchique CH6, unité	sonde	481.9	600	2023-07-28 11:54:09	2023-07-28 11:54:09
57	sonde6	Sonde d'aspiration bronchique CH8, unité	sonde	124.7	160	2023-07-28 11:54:09	2023-07-28 11:54:09
58	sonde7	Sonde naso gastrique CH10, unité	sonde	355	425	2023-07-28 11:54:09	2023-07-28 11:54:09
59	sonde8	Sonde naso gastrique CH12, unité	sonde	516.4	620	2023-07-28 11:54:09	2023-07-28 11:54:09
60	sonde9	Sonde naso gastrique CH16, unité	sonde	377.3	450	2023-07-28 11:54:09	2023-07-28 11:54:09
61	sonde10	Sonde naso gastrique CH18, unité	sonde	774.7	930	2023-07-28 11:54:09	2023-07-28 11:54:09
62	sonde11	Sonde naso gastrique CH6, unité	sonde	645.5	775	2023-07-28 11:54:09	2023-07-28 11:54:09
63	sonde12	Sonde naso gastrique CH8, unité	sonde	645.5	775	2023-07-28 11:54:09	2023-07-28 11:54:09
64	sonde13	Sonde urinaire avec ballonet Féminin CH12, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
65	sonde14	Sonde urinaire avec ballonet Féminin CH14, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
66	sonde15	Sonde urinaire avec ballonet Féminin CH16, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
67	sonde16	Sonde urinaire avec ballonet Féminin CH18, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
68	sonde17	Sonde urinaire avec ballonet Homme CH12, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
69	sonde18	Sonde urinaire avec ballonet Homme CH14, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
70	sonde19	Sonde urinaire avec ballonet Homme CH16, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
71	sonde20	Sonde urinaire avec ballonet Homme CH18, unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
72	sonde21	Sonde urinaire avec ballonet Pédiatrique CH10,unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
73	sonde22	Sonde urinaire avec ballonet Pédiatrique CH8,unité	sonde	676.9	745	2023-07-28 11:54:09	2023-07-28 11:54:09
74	sonde23	Sonde vésicale 2 voies a\\/ec ballonet Féminin , CH12 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
75	sonde25	Sonde vésicale 2 voies avec ballonet Féminin, CH14 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
76	sonde27	Sonde vésicale 2 voies a\\/ec ballonet Féminin, CH16 à silicone (100%}, unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
77	sonde28	Sonde vésicale 2 voies avec ballonet Féminin, CH18 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
78	sonde29	Sonde vésicale 2 voies avec ballonet masculin, CH12 à silicone (100%), unité	sonde	4 037,7	4 400	2023-07-28 11:54:09	2023-07-28 11:54:09
79	sonde30	Sonde vésicale 2 voies avec ballonet masculin, CH14 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
80	sonde31	Sonde vésicale 2 voies a\\/ec ballonet masculin, CH16 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
81	sonde32	Sonde vésicale 2 voies a\\/ec ballonet masculin, CH18 à silicone (100%), unité	sonde	4 099,8	4 500	2023-07-28 11:54:09	2023-07-28 11:54:09
82	sparadrap1	Sparadrap perforé 5m x 10cm, rouleau	sparadrap	1 973,4	2 565	2023-07-28 11:54:09	2023-07-28 11:54:09
83	sparadrap2	Sparadrap perforé 5m x 18cm, rouleau	sparadrap	4 543,1	5 900	2023-07-28 11:54:09	2023-07-28 11:54:09
84	transfuseur1	Transfuseur avec aiguille à usage unique, unité	transfuseur	303	394	2023-07-28 11:54:09	2023-07-28 11:54:09
85	tulle	Tulle gras 10cm x 10 cm, unité	tulle	120.1	155	2023-07-28 11:54:09	2023-07-28 11:54:09
\.


--
-- Data for Name: exercices; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.exercices (id, libelle, date_debut, date_fin, id_user_created, id_user_updated, id_user_deleted, is_delete, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.permissions (id, nom_permission, id_user_created, id_user_updated, id_user_deleted, is_delete, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.products (id, code_product, name, unit, product_id, description, category, program_id, cost, max_age_months, form, optional, med_key, dose_style, max_weight, id_traceur, class, min_weight, prix_drd, min_age_months, short, created_at, updated_at) FROM stdin;
1	p01bf01 d01f03d04sub	Artemether + Lumefantrine (20+120)mg comprimé, blister de 24 subventionné	\N	p01bf01 d01f03d04sub	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
2	riis2	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
3	d01ba01d01f03d01	Griséofulvine 250mg comprimé, blister	\N	d01ba01d01f03d01	\N	\N	\N	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
4	a07da03d01f03d01	Lopéramide 2mg comprimé, blister	\N	a07da03d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
5	n02be01d01f12d01'	Paracétamol 0,50g injectable	\N	n02be01d01f12d01'	\N	\N	\N	690	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
6	s03aa02d01f13d01	Tétracycline 1% ophtalmique pommade	\N	s03aa02d01f13d01	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
7	v03ab17d01f11d01	Collutoire au bleu de méthylène 30ml	\N	v03ab17d01f11d01	\N	\N	\N	1500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
8	n05ad01d01f12d01	Halopéridol 5mg/ml, 1ml injectable	\N	n05ad01d01f12d01	\N	\N	\N	280	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
9	g03ac08	Etonogestrel (Implanon NXT) 68mg, set	\N	g03ac08	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
10	ison4	Isoniazide(H) - comprimé de 10mg	\N	ison4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
11	nocode0062	Sonde naso gastrique CH8	\N	nocode0062	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
12	amox10	Amoxicilline- suspension buvable 125mg/5ml	\N	amox10	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
13	risp3	Rifampicine+Isoniazide+Pyrazinamide (RHZ) comprimé de 75/50/150 mg	\N	risp3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
14	b03ad03d01f03d01	Fer, acide folique (200+0,4)mg comprimé, blister	\N	b03ad03d01f03d01	\N	\N	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
15	a03bb01d01f03d01	Butylscopolamine 10mg comprimé, blister	\N	a03bb01d01f03d01	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
16	m04aa01d01f03d01	Allopurinol 100mg comprimé, blister	\N	m04aa01d01f03d01	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
17	ferf9	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf9	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
18	b03aa02d01f08d01	Fumarate ferreux 100mg/5ml, 50ml suspension buvable	\N	b03aa02d01f08d01	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
19	n05ad01d01f03d01	Halopéridol 5mg comprimé, blister	\N	n05ad01d01f03d01	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
20	nocode0079	Sonde vésicale 2 voies avec ballonnet masculin CH16 à silicone (100%)	\N	nocode0079	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
21	p01bf01 d01f03d03sub	Artemether + Lumefantrine (20+120)mg comprimé, blister de 18 subventionné	\N	p01bf01 d01f03d03sub	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
22	nocode0001	Aiguille à ponction lombaire 18G	\N	nocode0001	\N	\N	\N	425	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
23	j01ce02d01f03d02	Penicilline V 1000000UI comprimé, blister	\N	j01ce02d01f03d02	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
24	b03bb01d01f03d01	Acide folique 5mg comprimé, blister	\N	b03bb01d01f03d01	\N	\N	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
25	j05ar03	Tenofovir 300/Emtricitabine 200 (TDF/FTC 300/200) mg cp B/30	\N	j05ar03	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
26	p01bf01 d01f03d05	Artemether + Lumefantrine (40+240)mg comprimé, blister de 12	\N	p01bf01 d01f03d05	\N	\N	\N	480	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
27	nocode0085	Tulle gras 10cm x 10 cm	\N	nocode0085	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
28	nocode0066	Sonde urinaire avec ballonnet Féminin CH 18	\N	nocode0066	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
29	nocode0014	Coton hydrophile 50g	\N	nocode0014	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
30	albe3	Albendazole - suspension buvable 400mg/10ml	\N	albe3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
31	nocode0076	Sonde vésicale 2 voies avec ballonnet Féminin CH18 à silicone (100%)	\N	nocode0076	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
32	nocode0013	Coton hydrophile 500g	\N	nocode0013	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
33	nocode0101	Tubes EDTA 4,5 ml stériles	\N	nocode0101	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
34	nocode0082	Sparadrap perforé 5m x I0cm	\N	nocode0082	\N	\N	\N	2400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
35	nocode0053	Sonde d'aspiration bronchique CH14	\N	nocode0053	\N	\N	\N	130	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
36	nocode0025	Lame de bistouri N° 11	\N	nocode0025	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
37	amox3	Amoxicilline - suspension buvable 125mg/5ml	\N	amox3	\N	\N	\N	0.6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
38	ceft4	Ceftriaxone - poudre pour injection	\N	ceft4	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
39	nocode0012	Coton hydrophile 100g	\N	nocode0012	\N	\N	\N	850	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
40	n02be01d01f12d02	Paracétamol (Perfalgan) 1g injectable	\N	n02be01d01f12d02	\N	\N	\N	2000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
41	nocode0113	Papier joseph	\N	nocode0113	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
42	tgs	test gestion Stock	\N	tgs	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
43	r05da20d01f03d01	terpine codéine (100+10)mg comprimé, blister	\N	r05da20d01f03d01	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
44	nocode0075	Sonde vésicale 2 voies avec ballonnet Féminin CH16 à silicone (100%)	\N	nocode0075	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
45	para2	Paracétamol - comprimé 500mg	\N	para2	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
46	nocode0033	Polyamide monofil noir (éthicrin) 90cm déc.2 (3/0)	\N	nocode0033	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
47	a07da02d01f03d01	Parégorique 2g (Elexir) comprimé, blister	\N	a07da02d01f03d01	\N	\N	\N	22	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
48	d08ag02d01f11d01	Polyvidone iodée 4%, 125ml solution	\N	d08ag02d01f11d01	\N	\N	\N	1000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
49	nocode0060	Sonde naso gastrique CH18	\N	nocode0060	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
50	nocode0081	Sonde vésicale 2 voies avec ballonnet Pédiatrique CH10 à silicone (100%)	\N	nocode0081	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
51	r03da05d01f03d01	Aminophylline 100mg comprimé, blister	\N	r03da05d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
52	a03ax12d01f03d01	Phloroglucinol 80mg comprimé, blister	\N	a03ax12d01f03d01	\N	\N	\N	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
53	p01bc01d01f03d01	Quinine sulfate 300mg comprimé, blister	\N	p01bc01d01f03d01	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
54	d01aa01d01f07d01	Nystatine 100000UI/g 30g pommade	\N	d01aa01d01f07d01	\N	\N	\N	750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
55	c05ax03d01f07d01	Antihémorroïdaire 30g pommade	\N	c05ax03d01f07d01	\N	\N	\N	1000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
56	d06aa04d01f07d01	Tétracycline 3% dermique pommade	\N	d06aa04d01f07d01	\N	\N	\N	270	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
57	d01ae20d01f13d01	Acide benzoïque, acide salycilique (whitefield) 6%+3% pommade	\N	d01ae20d01f13d01	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
58	j01ma02d01f03d02	Ciprofloxacine 500mg comprimé, blister	\N	j01ma02d01f03d02	\N	\N	\N	33	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
59	para1	Paracétamol - suspension buvable 120mg/5ml	\N	para1	\N	\N	\N	0.63	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
60	nocode0099	Autotest HIV 1/2	\N	nocode0099	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
61	11	Artesunate suppositoire 50 mg	\N	11	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
62	ampi2	Ampicilline - poudre pour injection	\N	ampi2	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
63	nocode0088	Farine infantile (Vitazome), 60g	\N	nocode0088	\N	\N	\N	170	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
64	nocode0123	Plumpy Nut ;92 g	\N	nocode0123	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
65	nocode0087	Farine infantile (Vitazome), 300g	\N	nocode0087	\N	\N	\N	565	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
66	a12ca01d01f12d02	Soluté salé isotonique 0,9%, 500ml injectable	\N	a12ca01d01f12d02	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
67	nocode0061	Sonde naso gastrique CH6	\N	nocode0061	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
68	d08ax06d01f0d01	Permanganate de potassium 500mg poudre	\N	d08ax06d01f0d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
69	nocode0109	Coton hydrophile 500g gratuit	\N	nocode0109	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
70	nocode0122	MILDA IG2 routine enfants < 1 an	\N	nocode0122	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
71	plac9	Plan C- SRO formule OMS - poudre pour solution buvable sachet de 20.8g	\N	plac9	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
72	nocode0034	Polyamide monofil noir (éthicrin) 90cm déc.3 (2/0)	\N	nocode0034	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
73	amox4	Amoxicilline - suspension buvable 250mg/5ml	\N	amox4	\N	\N	\N	0.3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
74	plab1	Plan B - SRO formule OMS - poudre pour solution buvable, sachet de 20,8g	\N	plab1	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
75	amox5	Amoxicilline - suspension buvable 125mg/5ml	\N	amox5	\N	\N	\N	0.6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
76	j07bc01d01f12d01	Vaccin contre l'hépatite B dose unitaire injectable	\N	j07bc01d01f12d01	\N	\N	\N	1950	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
77	j01fa01d01f03d01	Erythromycine 500mg comprimé, blister	\N	j01fa01d01f03d01	\N	\N	\N	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
78	d06bb03d01f03d02	Aciclovir 400mg comprimé, blister	\N	d06bb03d01f03d02	\N	\N	\N	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
79	risp4	Rifampicine+Isoniazide+Pyrazinamide (RHZ) comprimé de 75/50/150 mg	\N	risp4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
80	sulf3	Sulfate de zinc - comprimé de 20mg	\N	sulf3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
81	s01aa11d01f13d01	Gentamycine 0,3%, 5m collyre	\N	s01aa11d01f13d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
82	g03ac03d01f03d01	Lévonorgestrel (Microlute) 0,0375mg,comprimé blister	\N	g03ac03d01f03d01	\N	\N	\N	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
83	nocode0009	Boîte de récupération de seringues usagées	\N	nocode0009	\N	\N	\N	2300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
84	nocode0043	Préservatif masculin lubrifié	\N	nocode0043	\N	\N	\N	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
85	nocode0026	Lame de bistouri N°15	\N	nocode0026	\N	\N	\N	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
86	nocode0021	Intranule avec ailettes 18G	\N	nocode0021	\N	\N	\N	125	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
87	cotr13	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr13	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
88	j01xd01d01f12d01	Métronidazole 500mg/100ml, 100ml injectable	\N	j01xd01d01f12d01	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
89	d08ax02d01f11d01	Eosine aqueuse 1%, 60ml sol.	\N	d08ax02d01f11d01	\N	\N	\N	900	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
90	plac2	Plan C - Ringer Lactate - solution pour perfusion intra veineuse, 500 ml	\N	plac2	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
91	ery4	Erythromycine- suspension buvable 125mg/5ml	\N	ery4	\N	\N	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
92	plac3	Plan C - Sérum salé isotonique 0,9% - solution pour perfusion intra veineuse, 250 et 500 ml	\N	plac3	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
93	plac5	Plan C - SRO formule OM - poudre pour solution buvable, sachet de 20,8g	\N	plac5	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
94	d01ae12d01f07d04	Vaseline salicylée 10% 100mg pommade	\N	d01ae12d01f07d04	\N	\N	\N	1500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
95	quin2	Quinine - ampoule 200mg/2ml	\N	quin2	\N	\N	\N	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
96	arme2	Artémether - ampoules injectables 40mg/1ml	\N	arme2	\N	\N	\N	3.2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
97	nocode0027	Lame de bistouri N °20	\N	nocode0027	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
98	nocode0035	Polyamide monofil noir (éthicrin) 90cm déc.4 (1)	\N	nocode0035	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
99	gent1	Gentamicine - ampoule 80mg/2ml ou 10mg/1ml	\N	gent1	\N	\N	\N	1.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
100	ampi6	Ampicilline - poudre pour injection	\N	ampi6	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
101	diaz2	Diazepam- ampoule 10mg/2ml	\N	diaz2	\N	\N	\N	0.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
102	nocode0051	Sonde d'aspiration bronchique CH10	\N	nocode0051	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
103	nocode0052	Sonde d'aspiration bronchique CH12	\N	nocode0052	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
104	nocode0006	Bande plâtrée 3m x 15cm	\N	nocode0006	\N	\N	\N	950	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
105	ceft2	Ceftriaxone - poudre pour injection	\N	ceft2	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
106	nocode0064	Sonde urinaire avec ballonnet Féminin CH14	\N	nocode0064	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
107	nocode0112	Alcool éthylique 96° gratuit	\N	nocode0112	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
108	gent6	Gentamicine - ampoule 80mg/2ml ou 10mg/1ml	\N	gent6	\N	\N	\N	2.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
109	j05ag01d01f08d02	Nevirapine (NVP) 50 mg/5mL Sol buv, Flacon de 240 ml	\N	j05ag01d01f08d02	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
110	g03aa07d01f14d01	Lévonorgestrel 0,15mg + éthinyl oestradiol 30microgrammes (Microgynon/ZINNIA-F)	\N	g03aa07d01f14d01	\N	\N	\N	27	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
111	nocode0005	Bande extensible 3m x 10cm	\N	nocode0005	\N	\N	\N	80	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
112	ceft5	Ceftriaxone - poudre pour injection	\N	ceft5	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
113	j07bg01d01f12d01	Vaccin antirabique injectable	\N	j07bg01d01f12d01	\N	\N	\N	1200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
114	a04ad05d01f12d01	Métopimazine 10mg/ml, 1ml injectable	\N	a04ad05d01f12d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
115	cipr2	Ciprofloxacine - comprimé de 250mg	\N	cipr2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
116	riis5	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
117	a03fa01d01f03d01	Metoclopramide 10mg comprimé, blister	\N	a03fa01d01f03d01	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
118	ampi4	Ampicilline - poudre pour injection	\N	ampi4	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
119	d08ax08d01f11d01	Alcool éthylique 96°, un litre sans conditionnement	\N	d08ax08d01f11d01	\N	\N	\N	800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
120	j01ee01d01f08d01	Cotrimoxazole 240mg/5ml, 60ml sirop	\N	j01ee01d01f08d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
121	riis1	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
122	nocode0020	Gant d'examen latex taille M	\N	nocode0020	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
123	sulf1	Sulfate de zinc - comprimé de 20mg..	\N	sulf1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
124	arlu2	Artémether + Luméfantrine - comprimé 20/120mg	\N	arlu2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
125	nocode0117	Condom masculin	\N	nocode0117	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
126	j05ar12	Tenofovir 300/Lamivudine 300 (TDF/3TC 300/300) mg cp B/30	\N	j05ar12	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
127	nocode0121	MILDA IG2 routine femmes enceintes	\N	nocode0121	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
128	j01cf02d01f05d01	Cloxacilline 500mg gélule, blister	\N	j01cf02d01f05d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
129	j01ee01d01f08d01gra	Cotrimoxazole sirop 240mg/5ml gratuit	\N	j01ee01d01f08d01gra	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
130	b05aa06d01f12d01	Gelatine fluide modifiée (Plasmion) 500ml injectable	\N	b05aa06d01f12d01	\N	\N	\N	3500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
131	a12ca01d01f12d01	Soluté salé isotonique 0,9%, 250ml injectable	\N	a12ca01d01f12d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
132	nocode0036	Polyamide monofil noir (éthicrin) 90cm déc.5 (2)	\N	nocode0036	\N	\N	\N	325	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
133	g02ad06d01f03d01	Misoprostol 200mg comprimé, blister	\N	g02ad06d01f03d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
134	j02ac01d01f05d01	Fluconazole 50mg gélule, blister	\N	j02ac01d01f05d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
135	ceft3	Ceftriaxone - poudre pour injection	\N	ceft3	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
136	j02ac01d01f05d02	Fluconazole 150mg gélule, blister	\N	j02ac01d01f05d02	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
137	v04ca02d01f12d01	Soluté glucosé isotonique 5%, 250ml injectable	\N	v04ca02d01f12d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
138	m01ae01d01f08d01	Ibuprofène 100mg/5ml 100ml sirop	\N	m01ae01d01f08d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
139	r03da05d01f0d01	Aminophylline 25mg/ml, 10ml poudre pour préparation injectable	\N	r03da05d01f0d01	\N	\N	\N	600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
140	p01bc01d01f12d02	Quinine résorcine 400mg/4ml, 4ml injectable	\N	p01bc01d01f12d02	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
141	n02be01d01f12d02'	Paracétamol 1g injectable	\N	n02be01d01f12d02'	\N	\N	\N	750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
142	n02be01d01f12d01	Paracétamol (Perfalgan) 0,50g injectable	\N	n02be01d01f12d01	\N	\N	\N	1400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
143	a10ab01d01f12d01	Insuline rapide (Actrapide) 100UI/ml, 10ml	\N	a10ab01d01f12d01	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
144	n01bb01d01f12d01	Bupivacaïne 0,5%, 20ml injectable	\N	n01bb01d01f12d01	\N	\N	\N	900	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
145	d08ag02d01f11d02	Polyvidone iodée 10% 200ml solution	\N	d08ag02d01f11d02	\N	\N	\N	1325	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
146	j01ce08d01f0d02	Benzathine benzylpénicilline 2,4MUI poudre pour préparation injectable	\N	j01ce08d01f0d02	\N	\N	\N	250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
147	s01xa02d01f05d02	Retinol (Vitamine A) 200000UI capsule, vrac	\N	s01xa02d01f05d02	\N	\N	\N	65	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
148	j01gb03d01f12d01	Gentamycine 10mg/ml, 1ml injectable	\N	j01gb03d01f12d01	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
149	a10bb01d01f03d01	Glibenclamide 5mg comprimé, blister	\N	a10bb01d01f03d01	\N	\N	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
150	p01ab01d01f08d01	Métronidazole 125mg/5ml, 60ml suspension buvable	\N	p01ab01d01f08d01	\N	\N	\N	675	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
151	nocode00200	Artésunate 60mg poudre pour préparation injectable, Subventionné	\N	nocode00200	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
152	risp1	Rifampicine+Isoniazide+Pyrazinamide (RHZ) comprimé de 75/50/150 mg	\N	risp1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
153	s01ed01d01f13d01	Timolol 0,50% collyre	\N	s01ed01d01f13d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
154	ceft1	Ceftriaxone - poudre pour injection	\N	ceft1	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
155	j05af01	Zidovudine (AZT) 50 mg/5mL Sol buv Flacon 240 ml	\N	j05af01	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
156	j01ca04d01f0d02	Amoxicilline 250mg/5ml, 60ml poudre pour suspension buvable	\N	j01ca04d01f0d02	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
157	plac8	Plan C - Sérum salé isotonique 0.9% - solution pour perfusion intra veineuse 250 et 500 ml	\N	plac8	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
158	a07aa02d01f08d01	Nystatine 100000UI suspension buvable	\N	a07aa02d01f08d01	\N	\N	\N	600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
159	a10ac01d01f12d01	Insuline semi retard (Insulatard) 100UI/ml, 10ml	\N	a10ac01d01f12d01	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
160	nocode0028	Lame de bistouri N°22	\N	nocode0028	\N	\N	\N	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
161	nocode0032	Polyamide monofil noir (éthicrin) 90cm déc. 1 (4/0)	\N	nocode0032	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
162	nocode0063	Sonde urinaire avec ballonnet Féminin CH 12	\N	nocode0063	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
163	nocode0065	Sonde urinaire avec ballonnet Féminin CH 16	\N	nocode0065	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
164	nocode0016	Gant chirurgical latex stérile N° 7,5	\N	nocode0016	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
165	v04ca02d01f12d03	Soluté glucosé hypertonique 10% 250ml injectable	\N	v04ca02d01f12d03	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
166	nocode0004	Bande de crêpe 4m x 10cm	\N	nocode0004	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
167	j01cf02d01f08d01	Cloxacilline 125mg/5ml, 60ml sirop	\N	j01cf02d01f08d01	\N	\N	\N	775	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
168	nocode0073	Sonde vésicale 2 voies avec ballonnet Féminin CH12 à silicone (100 %)	\N	nocode0073	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
169	nocode0068	Sonde urinaire avec ballonnet Homme CH 14	\N	nocode0068	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
170	amox2	Amoxicilline - suspension buvable 250mg/5ml	\N	amox2	\N	\N	\N	0.3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
171	aram2	Artésunate + Amodiaquine - flacon de 60ml d'amodiaquine + sachet de granule d'artésunate	\N	aram2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
172	plaa1	Plan A - SRO formule OMS - poudre pour solution buvable, sachet de 20,8g	\N	plaa1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
173	a11aa03d01f03d01	Multivitamine 10mg comprimé, blister	\N	a11aa03d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
174	j01da09d01f0d01	Céfadroxil 125mg/5ml poudre pour suspension buvable	\N	j01da09d01f0d01	\N	\N	\N	600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
175	j01ee01d01f03d01gra	Cotrimoxazole 480mg comprimé, blister	\N	j01ee01d01f03d01gra	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
176	a02bc01d01f05d01	Oméprazole 20mg gélule, blister	\N	a02bc01d01f05d01	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
177	c08ca05d01f03d01	Nifédipine 10mg comprimé, blister	\N	c08ca05d01f03d01	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
178	j01cr02  d01f03d01	Amoxicilline / acide clavulanique (500+62,5)mg comprimé, blister	\N	j01cr02  d01f03d01	\N	\N	\N	125	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
179	nocode0094	Tenofovir 300/Lamivudine 300/Efavirenz 400 (TDF/3TC/EFV 300/200/400) mg cp B/30	\N	nocode0094	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
180	j01ee01d01f03d02	Cotrimoxazole 960mg comprimé, blister	\N	j01ee01d01f03d02	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
181	a01ad05 d01f03d02	Acide acétyl salicylate 500mg comprimé	\N	a01ad05 d01f03d02	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
182	g01af01d01f03d01	Métronidazole 500mg comprimé gynécologique, blister	\N	g01af01d01f03d01	\N	\N	\N	12	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
183	j05ag03	Efavirenz 400 mg cp B/30	\N	j05ag03	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
184	nocode0003	Aiguille à ponction lombaire 22G	\N	nocode0003	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
185	nocode0007	Bande plâtrée 3m x 20cm	\N	nocode0007	\N	\N	\N	1300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
186	j05ar10	Lopinavir 200/Ritonavir 50 (LPV/r 200/50) mg cp B/120	\N	j05ar10	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
187	p01bf01 d01f03d02	Artemether + Lumefantrine (20+120)mg comprimé, blister de 12	\N	p01bf01 d01f03d02	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
188	j07apd01f12d01	Vaccin anti-typhoïdique 25microgrammes, dose unitaire injectable	\N	j07apd01f12d01	\N	\N	\N	11000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
189	ferf6	Fer + Acide folique - comprimé (200mg sulfate de fer + 0,4mg acide folique)	\N	ferf6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
190	h02ab09d01f12d01	Hydrocortisone 100mg/2ml, 1ml injectable	\N	h02ab09d01f12d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
191	j07am01d01f12d01	Vaccin antitétanique dose unitaire injectable	\N	j07am01d01f12d01	\N	\N	\N	3000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
192	c03ca01d01f03d01	Furosémide 10mg/ml, 2ml injectable	\N	c03ca01d01f03d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
193	n01ab01d01f12d01	Halotane 250ml injectable	\N	n01ab01d01f12d01	\N	\N	\N	18870	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
194	p02ca03d01f03d01	Albendazole 400mg comprimé, blister	\N	p02ca03d01f03d01	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
195	h01bb02d01f12d01	Oxytocine 5UI/ml, 1ml injectable	\N	h01bb02d01f12d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
196	n05aa01d01f12d01	Chlorpromazine 25mg/ml, 2ml injectable	\N	n05aa01d01f12d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
197	b01ab05d01f12d01	Enoxaparine 4000UI anti-XA/0,4ml injectable	\N	b01ab05d01f12d01	\N	\N	\N	2450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
198	j01da10d01f0d01	Céfotaxime 250mg poudre pour préparation injectable	\N	j01da10d01f0d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
199	b02ba01d01f12d01	Phytoménadione (Vitamine K1) 1mg/ml, 1ml injectable	\N	b02ba01d01f12d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
200	etha3	Ethambutol (E) comprimé de 100 mg	\N	etha3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
201	n01ax10d01f12d01	Propofol 10mg/ml, 20ml injectable	\N	n01ax10d01f12d01	\N	\N	\N	1300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
202	n01bb02d01f12d01	Lidocaïne 2%, 20ml injectable	\N	n01bb02d01f12d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
203	c01ca26d01f12d01	Ephédrine HCL 30mg/ml, 1ml injectable	\N	c01ca26d01f12d01	\N	\N	\N	750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
204	n01af03d01f12d02	Thiopental 1g injectable	\N	n01af03d01f12d02	\N	\N	\N	1250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
205	gent3	Gentamicine - ampoule 80mg/2ml ou 10mg/1ml	\N	gent3	\N	\N	\N	7.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
206	nocode0011	Compresse 40cm x 40cm	\N	nocode0011	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
207	gent4	Gentamicine - ampoule 80mg/2ml ou 10mg/1ml	\N	gent4	\N	\N	\N	3.75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
208	nocode0015	Dispositif Intra Utérin (DIU) TCIJ 380 A	\N	nocode0015	\N	\N	\N	227	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
209	g03ac03d01f03d02	Lévonorgestrel (Jadelle) 75mg, set	\N	g03ac03d01f03d02	\N	\N	\N	276	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
210	nocode0002	Aiguille à ponction lombaire 20G	\N	nocode0002	\N	\N	\N	425	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
211	r06ad02d01f12d01	Promethazine 25mg/ml, 2ml injectable	\N	r06ad02d01f12d01	\N	\N	\N	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
212	j01gb03	Gentamycine 80mg/2ml injectable	\N	j01gb03	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
213	n01ax03d01f12d01	Kétamine 50mg/ml, 10ml injectable	\N	n01ax03d01f12d01	\N	\N	\N	780	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
214	gent5	Gentamicine- ampoule 80mg/2ml ou 10mg/1ml	\N	gent5	\N	\N	\N	2.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
215	b05xa02d01f12d01	Bicarbonate de sodium, 1,4%, 10ml injectable	\N	b05xa02d01f12d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
216	ferf7	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
217	j01dd04  d01f0d02	Ceftriaxone 1g poudre pour préparation injectable	\N	j01dd04  d01f0d02	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
218	nocode0090	Potion Kunan sirop	\N	nocode0090	\N	\N	\N	1500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
219	j01ca01d01f0d01	Ampicilline 0,5g poudre pour préparation injectable	\N	j01ca01d01f0d01	\N	\N	\N	110	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
220	r03cc02d01f12d01	Salbutamol 0,5mg/ml, 1ml injectable	\N	r03cc02d01f12d01	\N	\N	\N	250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
221	para4	Paracétamol - comprimé 500mg	\N	para4	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
222	a03fa01d01f12d01	Metoclopramide 10mg/2ml, 2ml injectable	\N	a03fa01d01f12d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
223	nocode0086	Farine infantile (Vitazome), 1kg	\N	nocode0086	\N	\N	\N	1800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
224	risp2	Rifampicine+Isoniazide+Pyrazinamide (RHZ) comprimé de 75/50/150 mg	\N	risp2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
225	riis6	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
226	riis7	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
227	nocode0058	Sonde naso gastrique CH12	\N	nocode0058	\N	\N	\N	130	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
228	plaa3	Plan A- SRO formule OMS - poudre pour solution buvable, sachet de 20,8g	\N	plaa3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
229	m03ac01d01f12d01	Pancuronium bromure 2mg/ml, 2ml injectable	\N	m03ac01d01f12d01	\N	\N	\N	1000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
230	a03bb01d01f12d02	Butylscopolamine 20mg/ml, 1ml injectable	\N	a03bb01d01f12d02	\N	\N	\N	250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
231	c01ca24d01f12d01	Epinéphrine (Adrénaline) 1mg/ml injectable	\N	c01ca24d01f12d01	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
232	amox8	Amoxicilline- suspension buvable 125mg/5ml	\N	amox8	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
233	cotr7	Cotrimoxazole - comprimé 480mg	\N	cotr7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
234	ferf3	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
235	cotr1	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
236	cotr9	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr9	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
237	ferf5	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
238	cotr3	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
239	mebe2	Mébendazole - suspension buvable 100mg/5ml	\N	mebe2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
240	ferf4	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
241	etha4	Ethambutol (E) comprimé de 100 mg	\N	etha4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
242	riis3	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
243	quin1	Quinine - ampoule 200mg/2ml	\N	quin1	\N	\N	\N	16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
244	g02ab01d01f12d01	Methylergométrine 0,2mg/ml, 1ml injectable	\N	g02ab01d01f12d01	\N	\N	\N	190	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
245	a12ba01d01f12d01	Chlorure de potassium 10%, 10ml injectable	\N	a12ba01d01f12d01	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
246	riis4	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
247	cotr5	Cotrimoxazole - comprimé 480mg	\N	cotr5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
248	cotr4	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
249	albe4	Albendazole - suspension buvable 400mg/10ml	\N	albe4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
250	plaa2	Plan A - SRO formule OMS - poudre pour solution buvable, sachet de 20,8g	\N	plaa2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
251	ferf8	Fer + Acide folique - comprimé (200mg sulfate de fer + 0,4mg acide folique)	\N	ferf8	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
252	cotr6	Cotrimoxazole - comprimé 480mg	\N	cotr6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
253	cipr1	Ciprofloxacine - comprimé de 250mg	\N	cipr1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
254	cotr12	Cotrimoxazole - comprimé 480mg	\N	cotr12	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
255	v07abd01f12d01	Eau PPI 5ml injectable	\N	v07abd01f12d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
256	ferf1	Fer + Acide folique - comprimé (200mg sulfate de fer + 0,4mg acide folique)	\N	ferf1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
257	ison1	Isoniazide(H) - comprimé de 10mg	\N	ison1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
258	etha1	Ethambutol (E) comprimé de 100 mg	\N	etha1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
259	vita2	Vitamine A - Capsule de 200 000 UI	\N	vita2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
260	vita3	Vitamine A - Capsule de 100 000 UI	\N	vita3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
261	j05ag01d01f03d01	Nevirapine (NVP) 50 mg cp B/100	\N	j05ag01d01f03d01	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
262	nocode0047	Seringue 2ml + aiguille	\N	nocode0047	\N	\N	\N	175	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
263	r05cb03d01f08d01	Carbocystéine 2%, 100ml sirop	\N	r05cb03d01f08d01	\N	\N	\N	600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
264	c02ab01d01f03d01	Methyldopa 250mg comprimé, blister	\N	c02ab01d01f03d01	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
265	albe1	Albendazole - comprimé 400mg	\N	albe1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
266	d07ab19d01f03d01	Dexaméthasone 0,50mg comprimé, blister	\N	d07ab19d01f03d01	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
267	vita6	Vitamine A - Capsule de 200 000 UI	\N	vita6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
268	vita5	Vitamine A - Capsule de 100 000 UI	\N	vita5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
269	h02ab04d01f12d02	Methyprednisolone 20mg/ml, 2ml injectable	\N	h02ab04d01f12d02	\N	\N	\N	1500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
270	phen1	Phénobarbital -ampoule 100mg/1ml diluée avec 9ml d'eau distillée de sorte à avoir 10mg/ml	\N	phen1	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
271	j05ax12	Dolutegravrir (DTG ) 50 mg cp B/30	\N	j05ax12	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
272	j01da09d01f05d01	Céfadroxil 500mg gélule, blister	\N	j01da09d01f05d01	\N	\N	\N	170	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
273	d08ac02	Chlorhexidine 7,1% gel Tube de 25g	\N	d08ac02	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
274	dhappq2	Dihydroartemisinine - 20mg+ Pipéraquine 160mg	\N	dhappq2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
275	dhappq3	Dihydroartemisinine 40mg+ Pipéraquine 320mg	\N	dhappq3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
276	nocode0023	Intranule avec aillettes 22G	\N	nocode0023	\N	\N	\N	135	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
277	arpy5	Artésunate 60 mg Pyronaridine 180 mg Comprimés	\N	arpy5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
278	arpy6	Artésunate 60 mg Pyronaridine 180 mg Comprimés	\N	arpy6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
279	arpy7	Artésunate 60 mg Pyronaridine 180 mg Comprimés	\N	arpy7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
280	nocode0115	Collier de cycle	\N	nocode0115	\N	\N	\N	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
281	d08ax02d01f11d02	Eosine aqueuse 2%, 60ml sol.	\N	d08ax02d01f11d02	\N	\N	\N	950	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
282	v04ca02d01f12d02	Soluté glucosé isotonique 5%, 500ml injectable	\N	v04ca02d01f12d02	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
283	j01cr02  d01f0d03	Amoxicilline / acide clavulanique (250+62,5)mg/5ml poudre pour suspension buvable	\N	j01cr02  d01f0d03	\N	\N	\N	3000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
284	nocode0072	Sonde urinaire avec ballonnet Pédiatrique CH8	\N	nocode0072	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
285	r06ab04d01f03d01	Chlorphéniramine maléate 4mg comprimé, blister	\N	r06ab04d01f03d01	\N	\N	\N	6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
286	arpy4	Artésunate 60 mg Pyronaridine 180 mg Comprimés	\N	arpy4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
287	arme1	Artémether - ampoules injectables 40mg/1ml	\N	arme1	\N	\N	\N	3.2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
288	amox9	Amoxicilline- suspension buvable 125mg/5ml	\N	amox9	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
289	dhappq1	Dihydroartemisinine 20mg+ Pipéraquine 160mg	\N	dhappq1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
290	arpy2	Artésunate 20 mg Pyronaridine  60 mg Sachets	\N	arpy2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
291	arpy1	Artésunate 20 mg Pyronaridine  60 mg Sachets	\N	arpy1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
292	d06ax05d01f07d01	Bacitracine, néomycine 30g pommade	\N	d06ax05d01f07d01	\N	\N	\N	950	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
293	n06aa09d01f03d01	Amitriptyline 25mg comprimé, blister	\N	n06aa09d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
294	n03ag01d01f03d01	Acide valproïque 200mg comprimé, blister	\N	n03ag01d01f03d01	\N	\N	\N	70	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
295	m02aa15d01f07d01	Diclofénac 1% pommade, tube	\N	m02aa15d01f07d01	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
296	nocode0019	Gant d'examen latex taille L	\N	nocode0019	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
297	nocode0018	Gant de révision utérine	\N	nocode0018	\N	\N	\N	800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
298	c01aa05d01f03d01	Digoxine 0,25mg comprimé, blister	\N	c01aa05d01f03d01	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
299	eryt1	Erythromycine- suspension buvable 125mg/5ml	\N	eryt1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
300	etha2	Ethambutol (E) comprimé de 100 mg	\N	etha2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
301	nocode0097	Diluant Determine	\N	nocode0097	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
302	r03ac02d01d01	Salbutamol 0,1mg aérosol	\N	r03ac02d01d01	\N	\N	\N	2250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
303	nocode0096	Determine HIV 1/2	\N	nocode0096	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
304	eryt3	Erythromycine- suspension buvable 125mg/5ml	\N	eryt3	\N	\N	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
305	j01cr02  d01f0d04	Amoxicilline / acide clavulanique (500+62,5)mg poudre pour suspension buvable	\N	j01cr02  d01f0d04	\N	\N	\N	140	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
306	p02ca01do1f03d01	Mebendazole 100mg comprimé, blister	\N	p02ca01do1f03d01	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
307	d01ac02d01f07d01	Miconazole 2%, 30g pommade	\N	d01ac02d01f07d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
308	arlu1	Artémether + Luméfantrine - comprimé 20/120mg	\N	arlu1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
309	h01bb02	Oxytocine 10UI/ml, 1ml injectable	\N	h01bb02	\N	\N	\N	165	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
310	gent2	Gentamicine - ampoule 80mg/2ml ou 10mg/1ml	\N	gent2	\N	\N	\N	1.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
311	m01ab05d01f03d01	Diclofénac 50mg comprimé, blister	\N	m01ab05d01f03d01	\N	\N	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
312	cipr3	Ciprofloxacine - comprimé de 250mg	\N	cipr3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
313	m01ae01d01f03d01	Ibuprofène 200mg comprimé, blister	\N	m01ae01d01f03d01	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
314	nocode0104	Kit DBS	\N	nocode0104	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
315	p01bf01 d01f03d01	Artemether + Lumefantrine (20+120)mg comprimé, blister de 6	\N	p01bf01 d01f03d01	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
316	nocode0044	Seringue 10 ml + aiguille	\N	nocode0044	\N	\N	\N	70	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
317	d08ac02d01f11d01	Chlorhexidine 1,5, cetrimide 5%, 200ml	\N	d08ac02d01f11d01	\N	\N	\N	3000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
318	v03abd01f11d01	Solution au bleu de methylène, 60ml	\N	v03abd01f11d01	\N	\N	\N	1200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
319	ison2	Isoniazide(H) - comprimé de 10mg	\N	ison2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
320	ison3	Isoniazide(H) - comprimé de 10mg	\N	ison3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
321	nocode0107	Lancette stérile	\N	nocode0107	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
322	para3	Paracétamol - suspension buvable 120mg/5ml	\N	para3	\N	\N	\N	0.63	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
323	nocode00204	Carnet jaune	\N	nocode00204	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
324	nocode0029	Lame de bistouri N°24	\N	nocode0029	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
325	mebe1	Mébendazole - comprimé 100mg	\N	mebe1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
326	nocode0031	Poche à urine avec vidange 2 litres	\N	nocode0031	\N	\N	\N	250	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
327	nocode0030	Perfuseur avec aiguille usage unique	\N	nocode0030	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
328	p01be03d01f0d01	Artésunate 60mg poudre pour préparation injectable	\N	p01be03d01f0d01	\N	\N	\N	1500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
329	nocode00202	Furosémide 40mg comprimé, blister	\N	nocode00202	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
330	nocode0083	Sparadrap perforé 5m x 18cm	\N	nocode0083	\N	\N	\N	3500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
331	c09aa01d01f03d01	Captopril 2mg comprimé, blister	\N	c09aa01d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
332	j01gb03d01f12d02	Gentamycine 80mg/2ml injectable	\N	j01gb03d01f12d02	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
333	r06ad02d01f03d01	Promethazine 25mg comprimé, blister	\N	r06ad02d01f03d01	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
334	a07ba01d01f03d01	Charbon végétal 500mg comprimé, blister	\N	a07ba01d01f03d01	\N	\N	\N	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
335	b03ba03d01f03d01	Vitamine B12, B6 (complexe) (250+250)mg comprimé, blister	\N	b03ba03d01f03d01	\N	\N	\N	70	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
336	eryt2	Erythromycine- suspension buvable 125mg/5ml	\N	eryt2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
337	cotr11	Cotrimoxazole - comprimé 480mg	\N	cotr11	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
338	nocode0046	Seringue 20mI + aiguille	\N	nocode0046	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
339	plac4	Plan C - Sérum salé isotonique 0,9% - solution pour perfusion intra veineuse, 250 et 500 ml	\N	plac4	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
340	g03ac03d01f14d01	Lévonorgestrel (Jadelle) 75mg, set	\N	g03ac03d01f14d01	\N	\N	\N	276	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
341	n05ab02d01f12d01	Fluphénazine décanoate 25mg/ml, 1ml injectable	\N	n05ab02d01f12d01	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
342	n03aa02d01f03d01	Phenobarbital 100mg comprimé, blister	\N	n03aa02d01f03d01	\N	\N	\N	35	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
343	arpy3	Artésunate 20 mg Pyronaridine  60 mg Sachets	\N	arpy3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
344	nocode0080	Sonde vésicale 2 voies avec ballonnet masculin CH18 à silicone (100%)	\N	nocode0080	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
345	j01cr02  d01f0d02	Amoxicilline / acide clavulanique (250+31,25)mg/5ml poudre pour suspension buvable	\N	j01cr02  d01f0d02	\N	\N	\N	1400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
346	j02ab02d01f03d01	Kétoconazole 200mg comprimé, blister	\N	j02ab02d01f03d01	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
347	j01dd08  d01f0d01	Céfixime 40mg/5ml poudre pour suspension buvable	\N	j01dd08  d01f0d01	\N	\N	\N	800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
348	nocode0037	Polyester tressé traité (mersuture) 75cm déc.3 (2/0)	\N	nocode0037	\N	\N	\N	600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
349	nocode0040	Polyglactine tressé traité (Vicryl) 90cm déc.4 (1)	\N	nocode0040	\N	\N	\N	2650	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
350	nocode0022	Intranule avec ailettes 20G	\N	nocode0022	\N	\N	\N	135	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
351	nocode0048	Seringue 5 ml + aiguille	\N	nocode0048	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
352	nocode0038	Polyglactine tressé traité (Vicryl) 90/75cm déc.2 (3/0), unité	\N	nocode0038	\N	\N	\N	1800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
353	nocode0041	Polyglactine tressé traité (Vicryl) 90cm déc.5 (2)	\N	nocode0041	\N	\N	\N	700	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
354	p02ca03d01f08d01	Albendazole 400mg/10ml suspension buvable	\N	p02ca03d01f08d01	\N	\N	\N	225	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
355	j01fa01d01f08d01	Erythromycine 125mg/ml, 60ml sirop	\N	j01fa01d01f08d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
356	aram3	Artésunate + Amodiaquine - comprimé 25mg/67,5mg	\N	aram3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
357	arlu4	Artémether + Luméfantrine - comprimé 60/360mg	\N	arlu4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
358	vita4	Vitamine A - Capsule de 200 000 UI	\N	vita4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
359	dhappq4	Dihydroartemisinine - 40mg+ Pipéraquine 320mg	\N	dhappq4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
360	dhappq5	Dihydroartemisinine - 40mg+ Pipéraquine 320mg	\N	dhappq5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
361	dhappq6	Dihydroartemisinine - 40mg+ Pipéraquine 320mg	\N	dhappq6	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
362	dhappq7	Dihydroartemisinine - 40mg+ Pipéraquine 320mg	\N	dhappq7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
363	nocode0092	Solution de violet de gentiane 60ml	\N	nocode0092	\N	\N	\N	900	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
364	sulf2	Sulfate de zinc - comprimé de 20mg.	\N	sulf2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
365	albe2	Albendazole - comprimé 400mg	\N	albe2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
366	j01da09d01f0d02	Céfadroxil 250mg/5ml poudre pour suspension buvable	\N	j01da09d01f0d02	\N	\N	\N	950	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
367	n02be01d01f03d01	Paracétamol 500 mg cp, blister	\N	n02be01d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
368	nocode0120	TDR paludisme	\N	nocode0120	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
369	a11aa04d01f12d01	Solution polyvitaminée (PLYVITA-M) injectable	\N	a11aa04d01f12d01	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
370	nocode00201	Ceftriaxone 500mg poudre pour suspension injectable	\N	nocode00201	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
371	c07ab03d01f03d01	Atenolol 50mg comprimé, blister	\N	c07ab03d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
372	c08ca01d01f03d01	Amlodipine 5mg comprimé, blister	\N	c08ca01d01f03d01	\N	\N	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
373	nocode0119	Sulfadoxine, pyraméthamine (500+25)mg comprimé, blister	\N	nocode0119	\N	\N	\N	45	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
374	n05ba01d01f03d01	Diazépam 5mg comprimé, blister	\N	n05ba01d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
375	nocode0089	Kit SRO + Zinc	\N	nocode0089	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
376	amox6	Amoxicilline - suspension buvable 250mg/5ml	\N	amox6	\N	\N	\N	0.3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
377	vita1	Vitamine A - Capsule de 100 000 UI	\N	vita1	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
378	nocode0055	Sonde d'aspiration bronchique CH6	\N	nocode0055	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
379	n01af03d01f12d01	Thiopental 0,5g injectable	\N	n01af03d01f12d01	\N	\N	\N	870	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
380	nocode00206	Clamp ombilical	\N	nocode00206	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
381	j05ag01d01f08d01	Nevirapine (NVP) 50 mg/5ml Sol buv, Flacon de 100 ml	\N	j05ag01d01f08d01	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
382	a06ab02 d01f03d01	Bisacodyl 5mg comprimé, blister	\N	a06ab02 d01f03d01	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
383	g01aa01d01f03d01	Nystatine 100000UI comprimé gynécologique, blister	\N	g01aa01d01f03d01	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
384	n03aa02d01f12d02	Phenobarbital 200mg/2ml, 2ml injectable	\N	n03aa02d01f12d02	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
385	j01dd08  d01f03d01	Céfixime 200mg comprimé, blister	\N	j01dd08  d01f03d01	\N	\N	\N	130	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
386	p02ba01d01f03d02	Métronidazole 500mg comprimé, blister	\N	p02ba01d01f03d02	\N	\N	\N	95	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
387	j01dd04  d01f0d01	Ceftriaxone 250mg poudre pour préparation injectable	\N	j01dd04  d01f0d01	\N	\N	\N	325	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
388	r03cc02d01f03d01	Salbutamol 4mg comprimé, blister	\N	r03cc02d01f03d01	\N	\N	\N	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
389	nocode00203	Nifédipine 20mg retard comprimé, blister	\N	nocode00203	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
390	nocode00205	Carnet bleu	\N	nocode00205	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
391	nocode00207	Sparadrap perforé, 0.25m	\N	nocode00207	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
392	nocode0057	Sonde naso gastrique CH10	\N	nocode0057	\N	\N	\N	175	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
393	j01ca04d01f0d01	Amoxicilline 125mg/5ml, 60ml poudre pour suspension buvable	\N	j01ca04d01f0d01	\N	\N	\N	375	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:52	2023-07-28 10:53:52
394	n03af01d01f03d01	Carbamazépine 200mg comprimé, blister	\N	n03af01d01f03d01	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
395	riis8	Rifampicine + Isioniazide (RH) 75/50mg	\N	riis8	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
396	amox7	Amoxicilline- suspension buvable 125mg/5ml	\N	amox7	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
397	nocode0010	Collier de cycle	\N	nocode0010	\N	\N	\N	55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
398	arlu3	Artémether + Luméfantrine - comprimé 40/240mg	\N	arlu3	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
399	p01bf01 d01f03d02sub	Artemether + Lumefantrine (20+120)mg comprimé, blister de 12 subventionné	\N	p01bf01 d01f03d02sub	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
400	g03ac03d01f12d01	Médrocyprogesterone (Dépo-provera) 150mg/3ml injectable	\N	g03ac03d01f12d01	\N	\N	\N	138	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
401	nocode0056	Sonde d'aspiration bronchique CH8	\N	nocode0056	\N	\N	\N	225	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
402	d01ae12d01f07d01	Vaseline salicylée 2% 100g pommade	\N	d01ae12d01f07d01	\N	\N	\N	1400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
403	p01bf01 d01f03d04	Artemether + Lumefantrine (20+120)mg comprimé, blister de 24	\N	p01bf01 d01f03d04	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
404	j01ce02d01f03d01	Penicilline V 250mg comprimé, blister	\N	j01ce02d01f03d01	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
405	a11ga01d01f03d01	Acide ascorbique (vitamine C) aromatisé comprimé, blister	\N	a11ga01d01f03d01	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
406	v07avd01f03d01	Dichloroisocyanurate de sodium 1,7g comprimé, vrac	\N	v07avd01f03d01	\N	\N	\N	85	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
407	nocode0103	Gant d'examen latex taille M gratuit	\N	nocode0103	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
408	plab2	Plan B- SRO formule OMS - poudre pour solution buvable, sachet de 20,8g	\N	plab2	\N	\N	\N	20	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
409	nocode0093	Violet de gentiane 25g poudre pommade	\N	nocode0093	\N	\N	\N	1600	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
410	nocode00210	Vaccin contre l'hépatite B multi-dose unitaire injectable, une ampoule flacon de 10 doses adultes, o	\N	nocode00210	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
411	a07aa02d01f03d02	Nystatine 500000UI comprimé, blister	\N	a07aa02d01f03d02	\N	\N	\N	60	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
412	j07ah04d01f12d01	Vaccin anti-méningococcique ACWY-135 dose unitaire injectable	\N	j07ah04d01f12d01	\N	\N	\N	7500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
413	j01cr02  d01f0d01	Amoxicilline / acide clavulanique (100+12,5)mg/5ml poudre pour suspension buvable	\N	j01cr02  d01f0d01	\N	\N	\N	1800	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
414	a12aa02d01f12d01	Gluconate de calcium 10%, 10ml injectable	\N	a12aa02d01f12d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
415	nocode0045	Seringue 1ml + aiguille 29G	\N	nocode0045	\N	\N	\N	30	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
416	ampi3	Ampicilline - poudre pour injection	\N	ampi3	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
417	diaz1	Diazepam - ampoule 10mg/2ml	\N	diaz1	\N	\N	\N	0.5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
418	nocode0008	Bandelettes réactives (albumine, sucre)	\N	nocode0008	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
419	g01af04d01f06d01	Miconazole 400mg ovule gynécologique	\N	g01af04d01f06d01	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
420	nocode0069	Sonde urinaire avec ballonnet Homme CH 16	\N	nocode0069	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
421	d01ae12d01f07d02	Vaseline salicylée 3% 100mg pommade	\N	d01ae12d01f07d02	\N	\N	\N	1400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
422	nocode0074	Sonde vésicale 2 voies avec ballonnet Féminin CH14 à silicone (100%)	\N	nocode0074	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
423	n05ba01d01f12d01	Diazépam 5mg/ml, 2ml injectable	\N	n05ba01d01f12d01	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
424	a02ba02d01f03d01	Ranitidine 300mg comprimé, blister	\N	a02ba02d01f03d01	\N	\N	\N	14	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
425	plac1	Plan C - Ringer Lactate - solution pour perfusion intra veineuse, 500 ml	\N	plac1	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
426	d07ab19d01f12d01	Dexaméthasone 4mg/ml, 1ml injectible	\N	d07ab19d01f12d01	\N	\N	\N	170	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
427	nocode0100	Aiguille vacutainer	\N	nocode0100	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
428	a10ba02d01f03d01	Metformine 500mg comprimé, blister	\N	a10ba02d01f03d01	\N	\N	\N	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
429	ampi5	Ampicilline - poudre pour injection	\N	ampi5	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
430	arte2	Artésunate - poudre pour injection	\N	arte2	\N	\N	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
431	j01cf02d01f12d01	Cloxacilline 0,5g injectable	\N	j01cf02d01f12d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
432	j06aa02  d01f12d01	Sérum antitétanique 1500UI dose unitaire injectable	\N	j06aa02  d01f12d01	\N	\N	\N	2850	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
433	nocode0091	Sirop Douba	\N	nocode0091	\N	\N	\N	1200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
434	r05cb03d01f08d02	Carbocystéine 5%, 100ml sirop	\N	r05cb03d01f08d02	\N	\N	\N	650	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
435	nocode0077	Sonde vésicale 2 voies avec ballonnet masculin CH12 à silicone (100%)	\N	nocode0077	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
436	j01aa02d01f03d01	Doxycycline 100mg comprimé, blister	\N	j01aa02d01f03d01	\N	\N	\N	15	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
437	a02ab01d01f03d01	Hydroxyde d'aluminium 500mg comprimé, blister	\N	a02ab01d01f03d01	\N	\N	\N	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
438	nocode0049	Seringue 60ml pour gavage	\N	nocode0049	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
439	m01ab05d01f12d01	Diclofénac 25mg/ml, 3ml injectable	\N	m01ab05d01f12d01	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
440	m01ae01d01f03d02	Ibuprofène 400mg comprimé, blister	\N	m01ae01d01f03d02	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
441	aram4	Artésunate + Amodiaquine - comprimé 25mg/67,5mg	\N	aram4	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
442	cotr10	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr10	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
443	cotr2	Cotrimoxazole - suspension buvable 40/200mg pour 5ml	\N	cotr2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
444	p01bf01 d01f03d01sub	Artemether + Lumefantrine (20+120)mg comprimé, blister de 6 subventionné	\N	p01bf01 d01f03d01sub	\N	\N	\N	75	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
445	p01ab01d01f03d01	Métronidazole 250mg comprimé, blister	\N	p01ab01d01f03d01	\N	\N	\N	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
446	p02ba01d01f03d01	Praziquantel 600mg comprimé, blister	\N	p02ba01d01f03d01	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
447	arlu5	Artémether + Luméfantrine - comprimé 80/480mg	\N	arlu5	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
448	j01ca04d01f05d01	Amoxicilline 500mg gélule, blister	\N	j01ca04d01f05d01	\N	\N	\N	40	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
449	j01ca01d01f0d02	Ampicilline 1g poudre pour préparation injectable	\N	j01ca01d01f0d02	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
450	d06bb03d01f03d01	Aciclovir 200mg comprimé, blister	\N	d06bb03d01f03d01	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
451	nocode00209	Médroxyprogesterone (Sayana Press) 104mg/0,65ml injectable, une ampoule seringue prérempli	\N	nocode00209	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
452	nocode00208	Chlorure de sodium 10%, 10ml injectable	\N	nocode00208	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
453	j05ar06	Tenofovir 300/Emtricitabine 200/Efavirenz 600 (TDF/FTC/EFV 300/200/600) mg cp B/30	\N	j05ar06	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
454	nocode0105	Seringue 10 ml + aiguille gratuit	\N	nocode0105	\N	\N	\N	70	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
455	a03ba01d01f12d01	Atropine sulfate 0,5mg/ml, 1ml injectable	\N	a03ba01d01f12d01	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
456	a10ba02d01f03d02	Metformine 850mg comprimé, blister	\N	a10ba02d01f03d02	\N	\N	\N	10	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
457	j06aa06  d01f12d01	Sérum antivénimeux polyvalent Afrique de l'Ouest injectable	\N	j06aa06  d01f12d01	\N	\N	\N	2000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
458	nocode0095	Tenofovir 300/Lamivudine 300/Dolutegravir 50 (TDF/3TC 300/300/50) mg cp B/30	\N	nocode0095	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
459	b05xa30d01f12d01	Ringer lactate 500ml injectable	\N	b05xa30d01f12d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
460	p02ca01d01f08d01	Mebendazole 100mg/5ml, 30ml sirop	\N	p02ca01d01f08d01	\N	\N	\N	260	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
461	j01ce01d01f0d02	Benzylpénicilline 5MUI poudre pour préparation injectable	\N	j01ce01d01f0d02	\N	\N	\N	190	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
462	nocode0070	Sonde urinaire avec ballonnet Homme CH 18	\N	nocode0070	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
463	n02be01d01f08d01	Paracétamol 120mg/5ml, 100ml suspension buvable	\N	n02be01d01f08d01	\N	\N	\N	425	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
464	v04ca02d01f12d04	Soluté glucosé hypertonique 10% 500ml injectable	\N	v04ca02d01f12d04	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
465	j01fa01d01f08d02	Erythromycine 250mg/5ml, 60ml suspension buvable	\N	j01fa01d01f08d02	\N	\N	\N	650	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
466	r03ba01d01d01	Beclometazone 50microgramme/dose aérosol	\N	r03ba01d01d01	\N	\N	\N	2500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
467	j01ce01d01f0d01	Benzylpénicilline 1MUI poudre pour préparation injectable	\N	j01ce01d01f0d01	\N	\N	\N	125	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
468	p01bc01d01f12d01	Quinine résorcine 200mg/2ml, 2ml injectable	\N	p01bc01d01f12d01	\N	\N	\N	115	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
469	a03ax12d01f12d01	Phloroglucinol 40mg/4ml, injectable	\N	a03ax12d01f12d01	\N	\N	\N	450	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
470	nocode0110	Dichloroisocyanurate de sodium 1,7g comprimé (eau de javel en cp)	\N	nocode0110	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
471	nocode0102	Gant d'examen latex taille L gratuit	\N	nocode0102	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
472	nocode0118	Dispositif intra utérin (DIU) TCU 380 A	\N	nocode0118	\N	\N	\N	227	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
473	nocode0114	Sparadrap perforé 5m x 10 cm gratuit	\N	nocode0114	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
474	nocode0108	Tube capillaire+EDTA	\N	nocode0108	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
475	nocode0042	Préservatif féminin lubrifié	\N	nocode0042	\N	\N	\N	13	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
476	j02ac01d01f12d01	Fluconazole 2mg/ml, 100ml injectable	\N	j02ac01d01f12d01	\N	\N	\N	5000	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
477	j01ff02d01f05d01	Lincomycine 500mg gel. Blister	\N	j01ff02d01f05d01	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
478	nocode0106	Seringue 5 ml + aiguille gratuit	\N	nocode0106	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
479	arte1	Artésunate - poudre pour injection	\N	arte1	\N	\N	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
480	ampi1	Ampicilline - poudre pour injection	\N	ampi1	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
481	plac7	Plan C- Ringer Lactate - solution pour perfusion intra veineuse, 500 ml	\N	plac7	\N	\N	\N	100	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
482	nocode0059	Sonde naso gastrique CH16	\N	nocode0059	\N	\N	\N	175	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
483	j01ce08d01f0d01	Benzathine benzylpénicilline 1,2MUI poudre pour préparation injectable	\N	j01ce08d01f0d01	\N	\N	\N	225	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
484	g03ac08d01f01d01	Etonogestrel (Implanon NXT) 68mg	\N	g03ac08d01f01d01	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
485	ferf2	Fer + Acide folique - suspension buvable (100mg fumarate de fer + 0,4mg acide folique)/5ml	\N	ferf2	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
486	nocode0116	Condom féminin	\N	nocode0116	\N	\N	\N	25	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
487	nocode0054	Sonde d'aspiration bronchique CH16	\N	nocode0054	\N	\N	\N	500	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
488	nocode0084	Transfuseur avec aiguille usage unique	\N	nocode0084	\N	\N	\N	400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
489	nocode0078	Sonde vésicale 2 voies avec ballonnet masculin CH14 à silicone (100%)	\N	nocode0078	\N	\N	\N	2750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
490	n02ba01d01f0d01	Acétyl salicylate de lysine 900mg poudre pour préparation injectable	\N	n02ba01d01f0d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
491	nocode0039	Polyglactine tressé traité (Vicryl) 90cm déc.3 (2/0)	\N	nocode0039	\N	\N	\N	700	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
492	nocode0067	Sonde urinaire avec ballonnet Homme CH12	\N	nocode0067	\N	\N	\N	350	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
493	nocode0017	Gant chirurgical latex stérile N° 8	\N	nocode0017	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
494	c02ac01d01f12d01	Clonidine 0,15mg injectable	\N	c02ac01d01f12d01	\N	\N	\N	750	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
495	c01aa05d01f12d01	Digoxine 0,5mg/2ml injectable	\N	c01aa05d01f12d01	\N	\N	\N	1200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
496	cotr8	Cotrimoxazole - comprimé 480mg	\N	cotr8	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
497	nocode0024	Intranule avec aillettes 24G	\N	nocode0024	\N	\N	\N	150	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
498	p01bf01 d01f03d03	Artemether + Lumefantrine (20+120)mg comprimé, blister de 18	\N	p01bf01 d01f03d03	\N	\N	\N	200	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
499	a12cc02d01f12d01	Sulfate de magnésium 500mg/ml, 10ml injectable	\N	a12cc02d01f12d01	\N	\N	\N	300	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
500	d01ae12d01f07d03	Vaseline salicylée 5% 100mg pommade	\N	d01ae12d01f07d03	\N	\N	\N	1400	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
501	nocode0071	Sonde urinaire avec ballonnet Pédiatrique	\N	nocode0071	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
502	nocode0098	SD Bioline HIV 1/2	\N	nocode0098	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
503	nocode0111	Tube sec 4,5ml sous vide sans anticoagulant	\N	nocode0111	\N	\N	\N		\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
504	amox1	Amoxicilline - suspension buvable 125mg/5ml	\N	amox1	\N	\N	\N	0.6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
505	aram1	Artésunate + Amodiaquine - flacon de 60ml d'amodiaquine + sachet de granule d'artésunate	\N	aram1	\N	\N	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
506	d07aa02d01f07d01	Hydrocortisone 1% pommade dermique	\N	d07aa02d01f07d01	\N	\N	\N	550	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
507	nocode0050	Seringue à insuline 100UI + aiguille. 29G	\N	nocode0050	\N	\N	\N	50	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2023-07-28 10:53:53	2023-07-28 10:53:53
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.roles (id, nom_role, id_user_created, id_user_updated, id_user_deleted, is_delete, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: structures; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.structures (id, parent_id, nom_structure, description_structure, id_user_created, id_user_updated, id_user_deleted, is_delete, created_at, updated_at, id_typestructure) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: usereflux
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, id_user_created, id_user_updated, id_user_deleted, is_delete, created_at, updated_at, structure_id, statut) FROM stdin;
1	DAPELGO K. Irénée	idapelgo@gmail.com	\N	$2y$10$o8xIXbG/YUwhsCbrlxazu.lugueUxNhFl4ZiNZPDwikCCyTQ2Q0Sa	\N	0	0	0	f	\N	\N	0	f
\.


--
-- Name: actes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.actes_id_seq', 61, true);


--
-- Name: equipements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.equipements_id_seq', 85, true);


--
-- Name: exercices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.exercices_id_seq', 1, false);


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.products_id_seq', 507, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- Name: structures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.structures_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usereflux
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: actes actes_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.actes
    ADD CONSTRAINT actes_pkey PRIMARY KEY (id);


--
-- Name: equipements equipements_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.equipements
    ADD CONSTRAINT equipements_pkey PRIMARY KEY (id);


--
-- Name: exercices exercices_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.exercices
    ADD CONSTRAINT exercices_pkey PRIMARY KEY (id);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: structures structures_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.structures
    ADD CONSTRAINT structures_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

