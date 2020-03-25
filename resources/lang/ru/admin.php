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

    'wood-specie' => [
        'title' => 'Породы древесины',

        'actions' => [
            'index' => 'Породы древесины',
            'create' => 'Добавить Породу древесины',
            'edit' => 'Редактировать :name',
        ],

        'columns' => [
            'id' => 'ID',
            'calculation_period' => 'Расчётный период одного класса дерева',
            'title' => 'Наименование породы древесины',
            'timber_harvesting_age' => 'Возраст рубки',
            'main_harvesting_age' => 'Возраст главной рубки',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
