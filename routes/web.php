<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
// Rotas Reservas
Route::resource('reservas', 'ReservaController');

// Rotas Permanentes
Route::resource('permanentes', 'PermanenteController');

//Rotas Opcionais
Route::resource('opcionais', 'OpcionalController');

//Rotas Clientes
Route::resource('clientes', 'ClienteController');

//Rotas Convidados
Route::resource('convidados', 'ConvidadoController');

Route::get('clientes/{id}', 'Clientes@controller@Deletar');

//Rotas Convites
Route::resource('convites', 'ConviteController');

//Rotas Horarios
Route::resource('horarios', 'HorarioController');

//Rotas Reservas_Opcionais
Route::resource('reservas_opcionais', 'Reserva_OpcionalController');

//Rotas Quadras
Route::resource('quadras', 'QuadraController');

Route::get('/getPDFClientes', 'PDFController@getPDFClientes');
Route::get('/getPDFFinanceiro', 'PDFController@getPDFFinanceiro');
Route::get('/getPDFQuadras', 'PDFController@getPDFQuadras');
Route::get('/getPDFReservas', 'PDFController@getPDFReservas');

Route::get('detalhes-reserva/{id}', 'HomeController@detalhesReservas')->name('detalhes.reserva');

Route::get('detalhes-permanente/{id}', 'HomeController@detalhesPermanentes')->name('detalhes.permanente');

Route::get('reservar-horario/{id}', 'HomeController@reservar')->name('reservar.horario');

Route::get('disponibilidade', 'HomeController@pesquisa');

Route::post('horarios-filtro', 'HomeController@filtro')->name('horarios.filtro');

Route::resource('relatorios', 'PDFController');
Route::resource('locais', 'LocalController');

Route::get('graficos-gerenciais', 'GraficoController@Graficos')
    ->name('graficos.graficos');

Route::post('relatorioFinanceiro', 'PDFController@getPDFFinanceiro')
    ->name('relatorio.financeiro');

Route::get('relatorios-financeiro', 'PDFController@relatorioFinanceiro')->name('relatorios.financeiro');

Route::post('relatorioReserva', 'PDFController@getPDFReserva')
    ->name('relatorio.reserva');

Route::get('relatorios-reserva', 'PDFController@relatorioReserva')->name('relatorios.reserva');

Route::post('relatorioPermanente', 'PDFController@getPDFPermanente')
    ->name('relatorio.permanente');

Route::get('relatorios-permanente', 'PDFController@relatorioPermanente')->name('relatorios.permanente');

Route::post('relatoriOpcional', 'PDFController@getPDFOpcional')
    ->name('relatorio.opcional');

Route::get('relatorios-opcional', 'PDFController@relatorioOpcional')->name('relatorios.opcional');

Route::post('graficosfiltro', 'GraficoController@filtro')
    ->name('graficos.filtro');

Route::get('reservafinalizar/{id}', 'ReservaController@confirmar')
    ->name('reservas.confirmar');

Route::get('reservacancelar/{id}', 'ReservaController@cancelar')
    ->name('reservas.cancelar');

Route::get('permanentecancelar/{id}', 'PermanenteController@cancelar')
    ->name('permanentes.cancelar');
