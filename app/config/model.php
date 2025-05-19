<?php

/*
 * Database type : SQL or JSON
 */
const DATABASE_TYPE = "SQL";

/*
* AUTH_METHOD : CSV or API
 *
*/
const AUTH_METHOD = "CSV"; //


switch (DATABASE_TYPE) {
    case "SQL":
        define("DATABASE_NAME", "press_2024_v03");
        break;
        case "JSON":
            define("DATABASE_NAME", "../assets/database/article.json");
            break;
}