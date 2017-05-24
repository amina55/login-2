CREATE TABLE public.users
(
    id serial NOT NULL,
    name character varying(200) NOT NULL,
    username character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(200) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT "unique-username" UNIQUE (username)
)