<?php

return [
    'auth_global' => [
        'email' => 'Your e-mail',
        'password' => 'Password',
        'password_confirm' => 'Password confirmation',
    ],

    'login' => [
        'title' => 'Login',
        'sign_in_text' => 'Sign In to your account',
        'button' => 'Login',
        'forgot_password' => 'Forgot password?',
    ],

    'password_reset' => [
        'title' => 'Reset Password',
        'note' => 'Reset forgotten password',
        'button' => 'Reset password',
    ],

    'forgot_password' => [
        'title' => 'Reset Password',
        'note' => 'Send password reset e-mail',
        'button' => 'Send Password Reset Link',
    ],

    'activation_form' => [
        'title' => 'Activate account',
        'note' => 'Send activation link to e-mail',
        'button' => 'Send Activation Link',
    ],

    'activations' => [
        'sent' => 'We have sent you an activation link!',
        'activated' => 'Your account was activated!',
        'invalid_request' => 'The request failed.',
        'disabled' => 'Activation is disabled.',
    ],

    'passwords' => [
        'reset' => 'Your password has been reset!',
        'sent' => 'We have sent you a password reset link!',
        'invalid_password' => 'Password must be at least six characters long and match the confirmation.',
        'invalid_token' => 'The password reset token is invalid.',
        'invalid_user' => "We can't find a user with this e-mail address.",
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
        'title' => 'Wood Specie',

        'actions' => [
            'index' => 'Wood Specie',
            'create' => 'New Wood Specie',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'calculation_period' => 'Calculation period',
            'timber_harvesting_age' => 'Timber harvesting age',
            'main_harvesting_age' => 'Main harvesting age',
            'max_timber_class' => 'Max timber class',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
