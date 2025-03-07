insert into
    `76_users` (
        user_gender,
        user_lastname,
        user_firstname,
        user_pseudo,
        user_birthdate,
        user_mail,
        user_password
    ) value (
        "homme",
        "JOURDAIN",
        "Ichem",
        "Mattong",
        "1995-09-27",
        "ich.dev.fr@gmail.com",
        "JeSuisIchem"
    )
SELECT
    *
FROM
    `76_users`
where
    user_mail = "tanjiro76610@outlook.fr"
    or user_pseudo = "mattongg";

select
    *
from
    `76_posts` as a
    inner join `76_pictures` as b on a.post_id = b.post_id