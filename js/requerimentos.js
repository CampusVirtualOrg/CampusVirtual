// function mostrarDados() {
//   const name = document.getElementById("name").value;
//   const matricula = document.getElementById("matricula").value;
//   const email = document.getElementById("email").value;
//   const cpf = document.getElementById("cpf").value;
//   const requerimentos = document.getElementById("requerimentos").value;
//   const observation = document.getElementById("observation").value;

//   const mensagem =
//     "Confirme os dados inseridos:\n\n" +
//     "Nome: " +
//     name +
//     "\n" +
//     "Matrícula: " +
//     matricula +
//     "\n" +
//     "Email Institucional: " +
//     email +
//     "\n" +
//     "CPF: " +
//     cpf +
//     "\n" +
//     "Tipo de Requerimento: " +
//     requerimentos +
//     "\n" +
//     "Observações: " +
//     observation;

//   if (confirm(mensagem)) {
//     // Se o usuário confirmar, envie o formulário
//     document.forms[0].submit();

//     // Limpar os campos do formulário
//     document.getElementById("name").value = "";
//     document.getElementById("matricula").value = "";
//     document.getElementById("email").value = "";
//     document.getElementById("cpf").value = "";
//     document.getElementById("requerimentos").value = "Escolher";
//     document.getElementById("observation").value = "";
//   }
// }

// document.getElementById("myForm").addEventListener("submit", function (event) {
//   event.preventDefault(); // Evita o envio padrão do formulário
//   if (confirm("Confirme os dados inseridos e envie o formulário?")) {
//     this.reset(); // Limpa os campos do formulário
//   }
// });
