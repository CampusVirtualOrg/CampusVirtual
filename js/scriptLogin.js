// função para atualizar a imagem de acordo com a largura da tela
function updateLogo() {
  const screenWidth = window.innerWidth;

  if (screenWidth < 768) {
    document.getElementById("logoNoJS").src = "../img/logoPortal.png";
  } else {
    document.getElementById("logoNoJS").src = "../img/logoPortalWhite.png";
  }
}
function handleFormSubmit(event) {
  // event.preventDefault();
}
// atualiza a imagem na primeira carga da página
updateLogo();

// adiciona o evento de redimensionamento para atualizar a imagem
window.addEventListener("DOMContentLoaded", function () {
  const loginLink = document.querySelector(
    'link[href="../css/geral/login.css"]'
  );
  const mode = getCookie("mode");

  if (mode === "dark") {
    loginLink.href = "../css/darkMode/login.css";
  }
});

function getCookie(name) {
  const cookieValue = document.cookie.match(
    "(^|;)\\s*" + name + "\\s*=\\s*([^;]+)"
  );
  return cookieValue ? cookieValue.pop() : "";
}
