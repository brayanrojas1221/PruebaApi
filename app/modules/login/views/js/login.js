
// Login de usuario por username y password
function login(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    const credencial  = JSON.stringify({
        username: username,
        password: password
    });

    fetch("sadsadsa", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: credencial
    })
    .then(response => response.json())
    .then(data => {

        // aqui va el codigo de redireccion
    })
    .catch(error => {
      console.error('Error:', error);
    });
};
