<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

    let boton=document.getElementById("dismiss");
    // Crear un objeto FormData a partir del formulario
    let formData = {
        'correo': document.querySelector('input[name=correo]').value,
        'contrasena': document.querySelector('input[name=contrasena]').value,
        'checkSesion': document.querySelector('input[name=checkSesion]').checked
    };

    console.log(JSON.stringify(formData));
   

    // Enviar el objeto JSON con Fetch
    fetch('http://localhost/TacosPipePHP/api/usuariosController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'ACTION': 'Login'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        location.reload();
        return response.json();
    })
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });
});

</script>


</body>
</html>