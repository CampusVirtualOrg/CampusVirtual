// Função para verificar notificações
function verificarNotificacoes() {
  // Fazer uma solicitação AJAX para obter as notificações pendentes
  // Você pode usar a biblioteca jQuery para facilitar a chamada AJAX
  $.ajax({
    url: "../controllers/notificacoes.php",
    method: "GET",
    success: function (response) {
      // Verificar se há notificações na resposta
      if (response.notifications.length > 0) {
        // Atualizar o ícone de notificação para indicar que há novas notificações
        $(".notification-icon").addClass("has-notifications");

        // Exibir as notificações na interface do usuário
        response.notifications.forEach(function (notification) {
          // Aqui você pode manipular o DOM para exibir as notificações
          // por exemplo, adicionar um item em uma lista de notificações
        });
      }
    },
  });
}

// Chamar a função verificarNotificacoes inicialmente
verificarNotificacoes();

// Verificar notificações a cada 10 segundos
setInterval(verificarNotificacoes, 10000);
