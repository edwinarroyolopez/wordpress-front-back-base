-- mysql version => 5.7.23-23 => SELECT VERSION();
-- event table
-- drop table sergiofa_comp.event
create table sergiofa_comp.event (
    event_id int unsigned auto_increment
        primary key,
    hostname text null,
    email text null,
    phone text null,
    event_name text null,
    event_description text null,
    event_city text null,
    event_place text null,
    event_date text null,
    event_hour text null,
    created_at    timestamp  default current_timestamp() not null
);

-- select 
SELECT * FROM sergiofa_comp.event