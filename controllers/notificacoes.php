<?php
// Aqui você precisa adicionar a lógica para consultar as notificações pendentes no banco de dados ou em outra forma de armazenamento
// Certifique-se de adaptar o código abaixo para a estrutura do seu banco de dados e as informações necessárias

// Exemplo de resposta com notificações fictícias
$response = array(
  'notifications' => array(
    array(
      'message' => 'Seu requerimento X foi concluído.',
      'date' => '2023-06-12',
      'status' => 'Concluído'
    ),
    array(
      'message' => 'Seu requerimento Y foi rejeitado.',
      'date' => '2023-06-11',
      'status' => 'Rejeitado'
    )
  )
);

// Retornar a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
