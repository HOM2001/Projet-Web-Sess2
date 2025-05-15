<?php
/*
 * Database setting
 */
const SERVER = ""; // school

const DATABASE_TYPE = "SQL";

const DATEBASE_NAME = "press_2024_v03";

const AUTH_METHOD = "API"; // CSV or API

switch (SERVER) {
    case "home":
        define("DATABASE_PORT", 3307);
        define("DATABASE_USERNAME", "root");
        define("DATEBASE_PASSWORD", "");
        break;
    case "school" :
        define("DATABASE_PORT", 3308);
        define("DATABASE_USERNAME", "root");
        define("DATABASE_PASSWORD", "");
        break;


}