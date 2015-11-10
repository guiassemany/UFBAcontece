<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'painel'], function () {

    Route::group(['middleware' => 'auth'], function()
    {
      //Rotas comuns para usuários e admins

      //Controller do Backend
      Route::get('/', 'BackendController@index');

      //Usuário - Controle de Publicação de eventos
      Route::get('/meusEventos', 'BackendController@eventosCriado');
      Route::get('/meusEventos/cadastrar', 'BackendController@cadastrarEvento');
      Route::post('/meusEventos/cadastrar', 'BackendController@storeEventoUsuario');
      //Route::get('/meusEventos/editar/{eventoId}', 'BackendController@editarEvento');
      //Route::post('/meusEventos/editar/{eventoId}', 'BackendController@updateEventoUsuario');
      Route::get('/meusEventos/excluir/{eventoId}', 'BackendController@excluirEvento');
      Route::get('/eventosPresente', 'BackendController@eventosPresente');


      //Rota para chamada AJAX - Pegar todos os eventos
      Route::get('/eventosCalendario', 'BackendController@eventosCalendario');

      //Detalhe do Evento
      Route::get('/evento/{eventoId}', 'BackendController@detalharEvento');

      //Publicações em um evento
      Route::post('/evento/{eventoId}/criarPublicacao', 'Backend\EventosPublicacoesController@store');
      Route::get('/evento/{eventoId}/excluirPublicacao', 'Backend\EventosPublicacoesController@destroy');

      //Curtir Publicações em um evento
      Route::get('/evento/atual/curtirPublicacao/{publicacaoId}', 'Backend\EventosPublicacoesCurtidasController@store');
      Route::get('/evento/atual/excluirCurtida/{publicacaoId}', 'Backend\EventosPublicacoesCurtidasController@destroy');

      //Agenda do evento
      Route::post('/evento/{eventoId}/adicionarAgenda', 'Backend\EventosAgendasController@store');
      Route::get('/evento/atual/excluirAgenda/{agendaId}', 'Backend\EventosAgendasController@destroy');
        //Rota para chamada AJAX - Pegar atividades do evento
        Route::get('/evento/{eventoId}/AtividadesAgenda', 'Backend\EventosAgendasController@listarAtividadesAgenda');

      //API Gráfico Participantes x Cursos
      Route::get('/evento/{eventoId}/pxc', 'BackendController@participantesByCurso');

      //Perfil
      Route::post('/perfil/editar', 'Backend\UserController@update');

      //Comentários
      Route::post('/comentario/{eventoId}/novo', 'Backend\ComentariosController@store');
      Route::get('/comentario/exlcuir/{id}', 'Backend\ComentariosController@destroy');

      //Comentários
      Route::get('/participante/{eventoId}/confirmar', 'Backend\ParticipantesController@store');
      Route::get('/participante/{eventoId}/cancelar', 'Backend\ParticipantesController@destroy');

      //Faz o Logout
      Route::get('auth/logout', 'Backend\Auth\AuthController@getLogout');

      });

    //Se for um admin, pode entrar nestas rotas
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
      //Eventos
      Route::get('/eventos', 'Backend\EventosController@index');
      Route::get('/eventos/criar', 'Backend\EventosController@create');
      Route::post('/eventos/criar', 'Backend\EventosController@store');
      Route::get('/eventos/editar/{id}', 'Backend\EventosController@edit');
      Route::post('/eventos/editar/{id}', 'Backend\EventosController@update');
      Route::get('/eventos/excluir/{id}', 'Backend\EventosController@destroy');

      //Departamentos
      Route::get('/departamentos', 'Backend\DepartamentosController@index');
      Route::post('/departamentos/criar', 'Backend\DepartamentosController@store');
      Route::get('/departamentos/editar/{id}', 'Backend\DepartamentosController@edit');
      Route::get('/departamentos/excluir/{id}', 'Backend\DepartamentosController@destroy');
      Route::post('/departamentos/editar/{id}', 'Backend\DepartamentosController@update');

      //Categorias
      Route::get('/categorias', 'Backend\CategoriasController@index');
      Route::post('/categorias/criar', 'Backend\CategoriasController@store');
      Route::get('/categorias/editar/{id}', 'Backend\CategoriasController@edit');
      Route::get('/categorias/excluir/{id}', 'Backend\CategoriasController@destroy');
      Route::post('/categorias/editar/{id}', 'Backend\CategoriasController@update');

    });


    //Rotas que só podem ser visitadas caso o usuário não esteja logado.
    Route::group(['middleware' => 'guest'], function()
    {
      Route::get('auth/login', 'Backend\Auth\AuthController@getLogin');
      Route::post('auth/login', 'Backend\Auth\AuthController@postLogin');

      // Rotas de Cadastro
      Route::get('auth/cadastrar', 'Backend\Auth\AuthController@getRegister');
      Route::post('auth/cadastrar', 'Backend\Auth\AuthController@postRegister');
    });


});
