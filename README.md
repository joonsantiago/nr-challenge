# nr-challenge

Esse projeto é o desafio proposto pelos Negócios Reais.<br/>
É um projeto em Laravel com extração de dados<br/>
Para executar o projeto salve essas rotas no arquivo <b>routes.php</b> (app/Http)<br/>

<br/>
Route::get('/','PagesController@index');<br/>
Route::get('/cnpq', 'PagesController@cnpq');<br/>
Route::get('/sebrae', 'PagesController@sebrae');<br/>
Route::get('/ssp-df', 'PagesController@sspdf');<br/>
Route::get('/camara', 'PagesController@camara');<br/>
