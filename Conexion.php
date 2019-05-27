<?php

    class Conexion
    {
        static public function conectar()
        {
            // metodo de conexion: direccion bbdd, nombre bbdd, user, pass
            $link = new PDO("mysql:host=localhost;dbname=inforisk_bbdd", "root", "casa1matriz");

            $link -> exec("set names utf8");
            return $link;
        }
    }
