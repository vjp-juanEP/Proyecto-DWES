<?php 
return ['database'=>
            [
                'name'=>'proyecto',
                'username'=>'userProyecto',
                'password'=>'1234',
                'connection'=>'mysql:host=localhost',
                'options'=>[
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT=>true
                ]
            ]

];
?>