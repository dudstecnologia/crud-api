<?php

Route::prefix('auth')->group( function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::middleware('auth:api')->group( function () {

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::resources([
            '/professor'    => 'ProfessorController',
            '/curso'        => 'CursoController',
            '/aluno'        => 'AlunoController'
        ]);
    });
});
