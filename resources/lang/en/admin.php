<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'alojamiento' => [
        'title' => 'Alojamientos',

        'actions' => [
            'index' => 'Alojamientos',
            'create' => 'New Alojamiento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'departamento' => 'Departamento',
            'provincia' => 'Provincia',
            'telefono' => 'Telefono',
            'web' => 'Web',
            'email' => 'Email',
            'tipo' => 'Tipo',
            
        ],
    ],

    'gastronomium' => [
        'title' => 'Gastronomia',

        'actions' => [
            'index' => 'Gastronomia',
            'create' => 'New Gastronomium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'gatronomium' => [
        'title' => 'Gatronomia',

        'actions' => [
            'index' => 'Gatronomia',
            'create' => 'New Gatronomium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'departamento' => 'Departamento',
            'provincia' => 'Provincia',
            'telefono' => 'Telefono',
            'web' => 'Web',
            'email' => 'Email',
            'tipo' => 'Tipo',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];