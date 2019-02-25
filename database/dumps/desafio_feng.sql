--
-- PostgreSQL database dump
--

-- Dumped from database version 11.2 (Debian 11.2-1.pgdg90+1)
-- Dumped by pg_dump version 11.2 (Debian 11.2-1.pgdg90+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: orders; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.orders (
    id integer NOT NULL,
    data json,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.orders OWNER TO root;

--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orders_id_seq OWNER TO root;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.orders (id, data, created_at, updated_at) FROM stdin;
1	{"id":1,"value":1214,"date":"2018-03-23 12:11:37","items":[{"name":"Licensed Soft Pizza","description":"non-voluptas-est","quantity":10,"value":105},{"name":"Tasty Metal Sausages","description":"nostrum-ut-aut","quantity":2,"value":82}],"client":{"id":"e3af29d3-215a-48d9-959b-72a6980a3a57","name":"Keegan43","email":"Kaitlin_Dach63@example.net","phone":"(49)4474-8788"}}	2019-02-24 20:57:26.28	2019-02-24 20:57:26.28
2	{"id":2,"value":996,"date":"2018-04-20 04:18:42","items":[{"name":"Generic Fresh Salad","description":"quod-sint-expedita","quantity":6,"value":166}],"client":{"id":"ca1b38e7-189f-4740-bb97-3ef32979cd1f","name":"Karley33","email":"Jazmin.Funk22@example.com","phone":"(78)7150-8588"}}	2019-02-24 20:57:26.273	2019-02-24 20:57:26.273
3	{"id":4,"value":15424,"date":"2018-10-08 10:42:15","items":[{"name":"Intelligent Wooden Cheese","description":"recusandae-architecto-et","quantity":1,"value":28},{"name":"Fantastic Wooden Chair","description":"vero-minima-qui","quantity":1,"value":405},{"name":"Sleek Plastic Pizza","description":"magni-hic-at","quantity":7,"value":445},{"name":"Generic Concrete Table","description":"perspiciatis-nemo-impedit","quantity":5,"value":248},{"name":"Awesome Fresh Ball","description":"eveniet-odit-tempore","quantity":5,"value":726},{"name":"Licensed Frozen Sausages","description":"ipsum-illum-impedit","quantity":3,"value":911},{"name":"Licensed Concrete Pizza","description":"ut-aut-debitis","quantity":5,"value":64},{"name":"Incredible Fresh Fish","description":"tempora-sit-magnam","quantity":5,"value":277},{"name":"Licensed Wooden Pizza","description":"quia-ab-mollitia","quantity":4,"value":642}],"client":{"id":"6eb9a815-5d65-40c7-84d8-d5b4d867de9b","name":"Dawn.Marks","email":"Myrtice.Towne65@example.org","phone":"(94)4821-2266"}}	2019-02-24 20:57:26.282	2019-02-24 20:57:26.282
4	{"id":3,"value":35334,"date":"2018-03-20 09:07:07","items":[{"name":"Practical Granite Sausages","description":"rerum-voluptatum-velit","quantity":6,"value":116},{"name":"Practical Metal Ball","description":"aspernatur-et-maiores","quantity":6,"value":705},{"name":"Small Metal Sausages","description":"laborum-et-incidunt","quantity":10,"value":299},{"name":"Ergonomic Cotton Bacon","description":"consequatur-natus-necessitatibus","quantity":8,"value":471},{"name":"Handcrafted Wooden Chicken","description":"corrupti-maxime-repellendus","quantity":8,"value":620},{"name":"Gorgeous Frozen Fish","description":"molestias-tempore-eaque","quantity":2,"value":687},{"name":"Generic Cotton Gloves","description":"quae-iure-occaecati","quantity":5,"value":535},{"name":"Handmade Soft Car","description":"deserunt-temporibus-non","quantity":8,"value":974},{"name":"Incredible Rubber Shirt","description":"aut-eum-labore","quantity":9,"value":761}],"client":{"id":"19b735d6-5231-4414-bc10-0624a814aea7","name":"Sabrina.Beahan3","email":"Mortimer.Gislason1@example.org","phone":"(79)0723-9213"}}	2019-02-24 20:57:26.281	2019-02-24 20:57:26.281
5	{"id":5,"value":17939,"date":"2018-08-15 09:02:36","items":[{"name":"Generic Wooden Computer","description":"explicabo-omnis-voluptate","quantity":3,"value":38},{"name":"Handmade Concrete Fish","description":"earum-ad-necessitatibus","quantity":5,"value":902},{"name":"Licensed Cotton Tuna","description":"aut-eaque-nisi","quantity":7,"value":648},{"name":"Handmade Frozen Mouse","description":"velit-blanditiis-fugiat","quantity":1,"value":429},{"name":"Fantastic Plastic Fish","description":"magnam-voluptatum-harum","quantity":10,"value":835}],"client":{"id":"08c5bf58-55e6-40ee-ba74-91de16b8dd23","name":"Evert_Pfeffer6","email":"Cale21@example.net","phone":"(56)0062-9357"}}	2019-02-24 20:57:26.282	2019-02-24 20:57:26.282
\.


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.orders_id_seq', 5, true);


--
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

