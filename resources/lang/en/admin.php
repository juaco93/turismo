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

    'departamento' => [
        'title' => 'Departamentos',

        'actions' => [
            'index' => 'Departamentos',
            'create' => 'New Departamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            
        ],
    ],

    'localidade' => [
        'title' => 'Localidades',

        'actions' => [
            'index' => 'Localidades',
            'create' => 'New Localidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'departamento_id' => 'Departamento',
            'descripcion' => 'Descripcion',
            
        ],
    ],

    'localidade' => [
        'title' => 'Localidades',

        'actions' => [
            'index' => 'Localidades',
            'create' => 'New Localidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'departamento' => [
        'title' => 'Departamentos',

        'actions' => [
            'index' => 'Departamentos',
            'create' => 'New Departamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'localidade' => [
        'title' => 'Localidades',

        'actions' => [
            'index' => 'Localidades',
            'create' => 'New Localidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'departamento_id' => 'Departamento',
            'descripcion' => 'Descripcion',
            
        ],
    ],

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
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'gastronomia' => [
        'title' => 'Gastronomias',

        'actions' => [
            'index' => 'Gastronomias',
            'create' => 'New Gastronomia',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'direccion' => 'Direccion',
            'email' => 'Email',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'provincia' => 'Provincia',
            'telefono' => 'Telefono',
            'tipo' => 'Tipo',
            'web' => 'Web',
            
        ],
    ],

    'provincia' => [
        'title' => 'Provincias',

        'actions' => [
            'index' => 'Provincias',
            'create' => 'New Provincia',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'localidade' => [
        'title' => 'Localidades',

        'actions' => [
            'index' => 'Localidades',
            'create' => 'New Localidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'departamento_id' => 'Departamento',
            'nombre' => 'Nombre',
            
        ],
    ],

    'departamento' => [
        'title' => 'Departamentos',

        'actions' => [
            'index' => 'Departamentos',
            'create' => 'New Departamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'provincia_id' => 'Provincia',
            
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

    'alojamiento' => [
        'title' => 'Alojamiento',

        'actions' => [
            'index' => 'Alojamiento',
            'create' => 'New Alojamiento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
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

    'alojamiento' => [
        'title' => 'Alojamiento',

        'actions' => [
            'index' => 'Alojamiento',
            'create' => 'New Alojamiento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
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

    'gastronomia' => [
        'title' => 'Gastronomias',

        'actions' => [
            'index' => 'Gastronomias',
            'create' => 'New Gastronomia',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'direccion' => 'Direccion',
            'email' => 'Email',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'tipo' => 'Tipo',
            'web' => 'Web',
            
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
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'email' => 'Email',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'tipo' => 'Tipo',
            'web' => 'Web',
            
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
            'direccion' => 'Direccion',
            'email' => 'Email',
            'localidad_id' => 'Localidad',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'tipo' => 'Tipo',
            'web' => 'Web',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];