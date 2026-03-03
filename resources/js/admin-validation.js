document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="articulos"]');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            const titulo = document.getElementById('titulo');
            if (!titulo.value.trim()) {
                showError(titulo, 'El título es obligatorio');
                isValid = false;
            } else {
                clearError(titulo);
            }
            
            const fecha = document.getElementById('fecha_publicacion');
            if (!fecha.value) {
                showError(fecha, 'La fecha es obligatoria');
                isValid = false;
            } else {
                clearError(fecha);
            }
            
            const estado = document.getElementById('estado');
            if (!estado.value) {
                showError(estado, 'Selecciona un estado');
                isValid = false;
            } else {
                clearError(estado);
            }
            
            const checkboxes = document.querySelectorAll('input[name="secciones[]"]:checked');
            if (checkboxes.length === 0) {
                const checkboxContainer = document.querySelector('.mb-4:has(input[name="secciones[]"])');
                showError(checkboxContainer, 'Selecciona al menos una sección');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    function showError(element, message) {
        element.classList.add('border-red-500');
        
        let errorDiv = element.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('text-red-500')) {
            errorDiv = document.createElement('p');
            errorDiv.className = 'text-red-500 text-xs italic mt-1';
            element.parentNode.insertBefore(errorDiv, element.nextSibling);
        }
        errorDiv.textContent = message;
    }
    
    function clearError(element) {
        element.classList.remove('border-red-500');
        const errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('text-red-500')) {
            errorDiv.remove();
        }
    }
});