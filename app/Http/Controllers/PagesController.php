<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client;

class PagesController extends Controller
{
    //
    
    public function index() {
        return view('welcome');
    }
    
    public function cnpq() {
        $licitacoes = $this->curlPadrao("http://www.cnpq.br/web/guest/licitacoes", '<div class="licitacoes">');
        
        $l1 = str_replace('<a href="/documents/', '<a href="http://www.cnpq.br/documents/', $licitacoes);
        $links = $this->pegaLinksCNPQ($l1);
        //print_r($links);
        for($i=1; $i < count($licitacoes); $i++){
            print(utf8_decode($l1[$i]));
        }
        
    }
    
    public function sebrae() {
        $licitacoes = $this->curlPadrao("http://www.portal.scf.sebrae.com.br/licitante/frmPesquisarAvancadoLicitacao.aspx", '<!-- RESULTADO BUSCA -->');
        
        for($i=1; $i < count($licitacoes); $i++){
            print(utf8_decode($licitacoes[$i]));
        }
    }
    
    public function sspdf(){
        $licitacoes = $this->curlPadrao("http://licitacoes.ssp.df.gov.br/index.php/licitacoes/cat_view/1-licitacoes/2-pregao-eletronico", '<div class="dm_row dm_light">');
        
        for($i=1; $i < count($licitacoes); $i++){
            print(($licitacoes[$i]));
        }
    }
    
    public function camara(){
        $licitacoes = $this->curlPadrao("http://www2.camara.leg.br/transparencia/licitacoes/editais/pregaoeletronico.html", '<tbody><tr><th>Número');
        for($i=1; $i < count($licitacoes); $i++){
            print(utf8_decode($licitacoes[$i]));
        }
    }
    
    function pegaLinksCNPQ($body){
        $links = array();
        $body = implode(",",$body);
        $i=0;            
        while(strpos($body, '<a href="http://www.cnpq.br/documents/')){
            $links[] = substr($body, strpos($body, '<a href="http://www.cnpq.br/documents/'), 150);
            $body = str_replace($links[$i], '000TEXTO-SUBSTITUIDO000',$body);
            $i++;
        }        
        return $links;
    }
    
    function curlPadrao($urlSolicitada, $explod){
        $url = $urlSolicitada;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        $conteudo = curl_exec($ch);
        curl_close($ch);
        
        if(!is_null($explod)){
            $licitacoes = explode($explod, $conteudo);
            return $licitacoes;
        }else{
            return $conteudo;
        }
        
    }
}
