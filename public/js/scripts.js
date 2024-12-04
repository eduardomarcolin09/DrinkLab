// Função para abrir e fechar o dropdown de opções do usuário
function toggleDropdown() {
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('hidden'); 
}

// Fechar o dropdown se o usuário clicar fora dele - pesquisei
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('dropdown-menu');
    const dropdownButton = document.querySelector('button[onclick="toggleDropdown()"]');
        

    if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden'); // Fecha o dropdown
    }
});

// Função para abrir e fechar a modal
function toggleModal() {
    const modal = document.getElementById('auth-modal');
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}