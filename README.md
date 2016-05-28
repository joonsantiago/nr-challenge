# nr-challenge

Esse projeto é o desafio proposto pelos Negócios Reais.
É um projeto em Laravel com extração de dados.
Para executar o projeto salve essas rotas no arquivo routes.php (app/Http)


Route::get('/','PagesController@index');
Route::get('/cnpq', 'PagesController@cnpq');
Route::get('/sebrae', 'PagesController@sebrae');
Route::get('/ssp-df', 'PagesController@sspdf');
Route::get('/camara', 'PagesController@camara');
