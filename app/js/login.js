
// Login de usuario por username y password
const formLogin = document.getElementById('formLogin');
formLogin.addEventListener('submit', function login(e) {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    var formdata = new FormData();
    formdata.append("username", username);
    formdata.append("password", password);

    fetch("http://localhost/chexter/login", {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            localStorage.removeItem("token");
            localStorage.setItem("token", data.success || "");
            window.location.href="http://localhost/chexter/product";
        };
        
    })
    .catch(error => {
      console.error('Error:', error);
    });
});


