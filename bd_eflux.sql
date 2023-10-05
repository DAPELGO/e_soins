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
-- Name: consultations; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.consultations (
    id bigint NOT NULL,
    consultation_type character varying(255),
    cout_mise_en_observation double precision,
    cout_total_equipement double precision,
    cout_total_act double precision,
    csps character varying(255),
    district character varying(255),
    drs character varying(255),
    liste_eq character varying(255),
    nom_agent character varying(255),
    nom_patient character varying(255),
    num_ordonnance character varying(255),
    qualification character varying(255),
    screen_act_type character varying(255),
    total_act_cost double precision,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.consultations OWNER TO usereflux;

--
-- Name: consultations_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.consultations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consultations_id_seq OWNER TO usereflux;

--
-- Name: consultations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.consultations_id_seq OWNED BY public.consultations.id;


--
-- Name: creance_dettes; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.creance_dettes (
    id bigint NOT NULL,
    exercice_id bigint DEFAULT '0'::bigint NOT NULL,
    structure_id bigint DEFAULT '0'::bigint NOT NULL,
    date_reception_facture date,
    num_facture character varying(255),
    id_type_creancedette bigint DEFAULT '0'::bigint NOT NULL,
    nom_creancier_debiteur character varying(255),
    libelle_creance_dette character varying(255),
    montant_creance_dette double precision DEFAULT '0'::double precision NOT NULL,
    id_type_creance bigint DEFAULT '0'::bigint NOT NULL,
    id_type_dette bigint DEFAULT '0'::bigint NOT NULL,
    date_echeance date,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    type_creancedette character varying(12) DEFAULT NULL::character varying
);


ALTER TABLE public.creance_dettes OWNER TO usereflux;

--
-- Name: creance_dettes_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.creance_dettes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.creance_dettes_id_seq OWNER TO usereflux;

--
-- Name: creance_dettes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.creance_dettes_id_seq OWNED BY public.creance_dettes.id;


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
-- Name: livres; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.livres (
    id bigint NOT NULL,
    exercice_id bigint DEFAULT '0'::bigint NOT NULL,
    livre_id bigint DEFAULT '0'::bigint NOT NULL,
    date_evenement date,
    num_enregistrement character varying(255),
    ref_piece_justificative character varying(255),
    id_type_operation bigint DEFAULT '0'::bigint NOT NULL,
    id_libelle bigint DEFAULT '0'::bigint NOT NULL,
    designation text,
    id_type_evacuation bigint DEFAULT '0'::bigint NOT NULL,
    nom_prenom_patient character varying(255),
    age_patient date,
    id_structure_evacuation character varying(255),
    action_livre character varying(255),
    montant_livre double precision,
    is_actif boolean,
    description_livre text,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_categorie integer DEFAULT 0,
    id_de_vers integer DEFAULT 0,
    type_structure character varying(6) DEFAULT NULL::character varying
);


ALTER TABLE public.livres OWNER TO usereflux;

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
-- Name: eview_depense_mensuelle; Type: VIEW; Schema: public; Owner: usereflux
--

CREATE VIEW public.eview_depense_mensuelle AS
 SELECT u.structure_id,
    sum(l.montant_livre) AS montant_depense_mensuelle,
    EXTRACT(month FROM l.created_at) AS mois
   FROM public.livres l,
    public.users u
  WHERE ((l.id_user_created = u.id) AND (l.id_type_operation = 6))
  GROUP BY u.structure_id, (EXTRACT(month FROM l.created_at));


ALTER TABLE public.eview_depense_mensuelle OWNER TO usereflux;

--
-- Name: eview_montant_creance; Type: VIEW; Schema: public; Owner: usereflux
--

CREATE VIEW public.eview_montant_creance AS
 SELECT creance_dettes.structure_id,
    sum(creance_dettes.montant_creance_dette) AS montant_creance
   FROM public.creance_dettes
  WHERE (creance_dettes.id_type_creancedette = 37)
  GROUP BY creance_dettes.structure_id;


ALTER TABLE public.eview_montant_creance OWNER TO usereflux;

--
-- Name: valeurs; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.valeurs (
    id bigint NOT NULL,
    id_parametre bigint DEFAULT '0'::bigint NOT NULL,
    libelle character varying(255),
    description_valeur text,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    id_parent integer DEFAULT 0
);


ALTER TABLE public.valeurs OWNER TO usereflux;

--
-- Name: eview_param_libelle_operation; Type: VIEW; Schema: public; Owner: usereflux
--

CREATE VIEW public.eview_param_libelle_operation AS
 SELECT valeurs.id,
    valeurs.id_parametre,
    valeurs.libelle,
    valeurs.description_valeur,
    valeurs.id_user_created,
    valeurs.id_user_updated,
    valeurs.id_user_deleted,
    valeurs.is_delete,
    valeurs.created_at,
    valeurs.updated_at,
    valeurs.id_parent
   FROM public.valeurs
  WHERE (valeurs.id_parametre = 7);


ALTER TABLE public.eview_param_libelle_operation OWNER TO usereflux;

--
-- Name: eview_param_type_operation; Type: VIEW; Schema: public; Owner: usereflux
--

CREATE VIEW public.eview_param_type_operation AS
 SELECT valeurs.id,
    valeurs.id_parametre,
    valeurs.libelle,
    valeurs.description_valeur,
    valeurs.id_user_created,
    valeurs.id_user_updated,
    valeurs.id_user_deleted,
    valeurs.is_delete,
    valeurs.created_at,
    valeurs.updated_at,
    valeurs.id_parent
   FROM public.valeurs
  WHERE (valeurs.id_parametre = 4);


ALTER TABLE public.eview_param_type_operation OWNER TO usereflux;

--
-- Name: eview_recette_mensuelle; Type: VIEW; Schema: public; Owner: usereflux
--

CREATE VIEW public.eview_recette_mensuelle AS
 SELECT u.structure_id,
    sum(l.montant_livre) AS montant_recette_mensuelle,
    EXTRACT(month FROM l.created_at) AS mois
   FROM public.livres l,
    public.users u
  WHERE ((l.id_user_created = u.id) AND (l.id_libelle = 19))
  GROUP BY u.structure_id, (EXTRACT(month FROM l.created_at));


ALTER TABLE public.eview_recette_mensuelle OWNER TO usereflux;

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
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO usereflux;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO usereflux;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: livres_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.livres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.livres_id_seq OWNER TO usereflux;

--
-- Name: livres_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.livres_id_seq OWNED BY public.livres.id;


--
-- Name: medprescrits; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.medprescrits (
    id bigint NOT NULL,
    ordonnnce_id integer,
    drugs_dispensation character varying(255),
    orgunit_id character varying(255),
    orgunit_name character varying(255),
    date_dispensation timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.medprescrits OWNER TO usereflux;

--
-- Name: medprescrits_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.medprescrits_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medprescrits_id_seq OWNER TO usereflux;

--
-- Name: medprescrits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.medprescrits_id_seq OWNED BY public.medprescrits.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO usereflux;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO usereflux;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: paiements; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.paiements (
    id bigint NOT NULL,
    creance_dette_id bigint DEFAULT '0'::bigint NOT NULL,
    somme_versee double precision DEFAULT '0'::double precision NOT NULL,
    somme_restante double precision DEFAULT '0'::double precision NOT NULL,
    date_paiement date,
    etat_paiement character varying(255),
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    montant_verse double precision DEFAULT 0
);


ALTER TABLE public.paiements OWNER TO usereflux;

--
-- Name: paiements_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.paiements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paiements_id_seq OWNER TO usereflux;

--
-- Name: paiements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.paiements_id_seq OWNED BY public.paiements.id;


--
-- Name: parametres; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.parametres (
    id bigint NOT NULL,
    parent_id bigint DEFAULT '0'::bigint NOT NULL,
    libelle character varying(255),
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.parametres OWNER TO usereflux;

--
-- Name: parametres_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.parametres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parametres_id_seq OWNER TO usereflux;

--
-- Name: parametres_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.parametres_id_seq OWNED BY public.parametres.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO usereflux;

--
-- Name: permission_role; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.permission_role (
    role_id integer,
    permission_id integer
);


ALTER TABLE public.permission_role OWNER TO usereflux;

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
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO usereflux;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO usereflux;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: role_user; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.role_user (
    role_id integer,
    user_id integer
);


ALTER TABLE public.role_user OWNER TO usereflux;

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
-- Name: soldes; Type: TABLE; Schema: public; Owner: usereflux
--

CREATE TABLE public.soldes (
    id bigint NOT NULL,
    structure_id bigint DEFAULT '0'::bigint NOT NULL,
    livre_id bigint DEFAULT '0'::bigint NOT NULL,
    solde_caisse double precision DEFAULT '0'::double precision NOT NULL,
    solde_banque double precision DEFAULT '0'::double precision NOT NULL,
    id_user_created bigint DEFAULT '0'::bigint NOT NULL,
    id_user_updated bigint DEFAULT '0'::bigint NOT NULL,
    id_user_deleted bigint DEFAULT '0'::bigint NOT NULL,
    is_delete boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.soldes OWNER TO usereflux;

--
-- Name: soldes_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.soldes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.soldes_id_seq OWNER TO usereflux;

--
-- Name: soldes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.soldes_id_seq OWNED BY public.soldes.id;


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
-- Name: valeurs_id_seq; Type: SEQUENCE; Schema: public; Owner: usereflux
--

CREATE SEQUENCE public.valeurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.valeurs_id_seq OWNER TO usereflux;

--
-- Name: valeurs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usereflux
--

ALTER SEQUENCE public.valeurs_id_seq OWNED BY public.valeurs.id;


--
-- Name: actes id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.actes ALTER COLUMN id SET DEFAULT nextval('public.actes_id_seq'::regclass);


--
-- Name: consultations id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.consultations ALTER COLUMN id SET DEFAULT nextval('public.consultations_id_seq'::regclass);


--
-- Name: creance_dettes id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.creance_dettes ALTER COLUMN id SET DEFAULT nextval('public.creance_dettes_id_seq'::regclass);


--
-- Name: equipements id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.equipements ALTER COLUMN id SET DEFAULT nextval('public.equipements_id_seq'::regclass);


--
-- Name: exercices id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.exercices ALTER COLUMN id SET DEFAULT nextval('public.exercices_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: livres id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.livres ALTER COLUMN id SET DEFAULT nextval('public.livres_id_seq'::regclass);


--
-- Name: medprescrits id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.medprescrits ALTER COLUMN id SET DEFAULT nextval('public.medprescrits_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: paiements id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.paiements ALTER COLUMN id SET DEFAULT nextval('public.paiements_id_seq'::regclass);


--
-- Name: parametres id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.parametres ALTER COLUMN id SET DEFAULT nextval('public.parametres_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: soldes id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.soldes ALTER COLUMN id SET DEFAULT nextval('public.soldes_id_seq'::regclass);


--
-- Name: structures id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.structures ALTER COLUMN id SET DEFAULT nextval('public.structures_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: valeurs id; Type: DEFAULT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.valeurs ALTER COLUMN id SET DEFAULT nextval('public.valeurs_id_seq'::regclass);


--
-- Name: actes actes_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.actes
    ADD CONSTRAINT actes_pkey PRIMARY KEY (id);


--
-- Name: consultations consultations_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT consultations_pkey PRIMARY KEY (id);


--
-- Name: creance_dettes creance_dettes_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.creance_dettes
    ADD CONSTRAINT creance_dettes_pkey PRIMARY KEY (id);


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
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: livres livres_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.livres
    ADD CONSTRAINT livres_pkey PRIMARY KEY (id);


--
-- Name: medprescrits medprescrits_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.medprescrits
    ADD CONSTRAINT medprescrits_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: paiements paiements_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.paiements
    ADD CONSTRAINT paiements_pkey PRIMARY KEY (id);


--
-- Name: parametres parametres_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.parametres
    ADD CONSTRAINT parametres_pkey PRIMARY KEY (id);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: soldes soldes_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.soldes
    ADD CONSTRAINT soldes_pkey PRIMARY KEY (id);


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
-- Name: valeurs valeurs_pkey; Type: CONSTRAINT; Schema: public; Owner: usereflux
--

ALTER TABLE ONLY public.valeurs
    ADD CONSTRAINT valeurs_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: usereflux
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: usereflux
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- PostgreSQL database dump complete
--

