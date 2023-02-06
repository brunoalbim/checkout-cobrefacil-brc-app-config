<?php

/*
  ARQUIVO DE CONFIGURAÇÃO
*/



error_reporting(0); ini_set("display_errors", 0);
// error_reporting(-1); ini_set("display_errors", "1"); ini_set("log_errors", 1); ini_set("error_log", "/tmp/php-error.log");


//Variaveis de configuração
$buscar_credenciais_cf = buscar_credenciais_cf(
  "teste" // "teste" ou "producao" // (EDITAR)
);

// Criar a mensalidade via grade de planos ou de serviços
$plano_ou_servico = 'servico'; // plano ou servico

// Coloque apenas numeros. Ex: Colocando 5, será 5% de juros. // (EDITAR)
$habilitarCartao = true;
$jurosCartao = 0;



// Credenciais Cobre Facil
function buscar_credenciais_cf($a = "") {
  if ($a === "teste") {
    $credenciais = [

      // TESTE
      "ambiente" => "teste", // Não editar
      "url" => "https://api.sandbox.cobrefacil.com.br", // Não editar
      "app_id" => "XXXX", // (EDITAR)
      "secret" => "XXXX", // (EDITAR)
      "emailsuporte" => "contato@email.com.br", // (EDITAR)
      "regua_de_notificacao_id" => "52XD4W3GE1DZ97JM1R0K", // (EDITAR) Acesse: https://app.sandbox.cobrefacil.com.br/notification-rules/ para obter o ID da "Régua de Cobrança" na URL.

    ];
  } else {
    $credenciais = [

      // PRODUÇÃO
      "ambiente" => "producao", // Não editar
      "url" => "https://api.cobrefacil.com.br", // Não editar
      "app_id" => "XXXX", // (EDITAR)
      "secret" => "XXXX", // (EDITAR)
      "emailsuporte" => "contato@email.com.br", // (EDITAR)
      "regua_de_notificacao_id" => "52XD4W3GE1DZ97JM1R0K", // (EDITAR) Acesse: https://app.cobrefacil.com.br/notification-rules/ para obter o ID da "Régua de Cobrança" na URL.

    ];
  }
  return $credenciais;
}



// Retorna a URL do site
function base_url($value = "") {

  if ($_SERVER['SERVER_NAME'] === "localhost") {
    $url = "http://localhost/public/boleto-cobrefacil/"; // Endereço para teste local. // (EDITAR)
  } else {
    $url = "https://faturamento.brcxp.com.br/";  // Endereço para ambiente online. // (EDITAR)
  }

  return $url.$value;
}



// Retorna o titulo do site
function titulo_site($value = "") {
  $value = $value ? " - ".$value : "";
  return "Pagamento Online Simplificado. Ambiente 100% Seguro.".$value; // (EDITAR)
}



// Retorna o logo do site
function logo_site() { // (EDITAR) ?>
  <p> <img src="<?= base_url('assets/img/seguro.svg') ?>" style="width: 100px" alt=""> </p>
<?php }
