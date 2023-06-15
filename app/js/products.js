function logged() {
  return localStorage.getItem("token");
}
function logout() {
  localStorage.removeItem("token");
  window.location.href = "http://localhost/chexter/login";
}

function generateHtmlProducts(data) {
  if (data) {
    // Obtener el contenedor HTML donde se mostrar�n los productos
    const containerProducts = document.getElementById("containerProducts");
    containerProducts.innerHTML='';
    // Iterar sobre el array de productos y generar el HTML din�micamente
    data.forEach(function (product) {
      // Crear elementos HTML
      const container = document.createElement("div");
      container.classList.add("col-md-4","mt-3");

      const card = document.createElement("div");
      card.classList.add("card");

      const cardBody = document.createElement("div");
      cardBody.classList.add("card-body");

      const title = document.createElement("h5");
      title.classList.add("card-title");
      title.textContent = `producto: ${product.name}`;

      const description = document.createElement("p");
      description.classList.add("card-text");
      description.textContent = product.description;

      const price = document.createElement("p");
      price.classList.add("card-text");
      price.textContent = "Precio: $" + product.price;

      const buttom = document.createElement("a");
      buttom.classList.add("btn","btn-primary");
      buttom.href="#";
      buttom.textContent = "Comprar";


      // Agregar elementos al DOM
      cardBody.appendChild(title);
      cardBody.appendChild(description);
      cardBody.appendChild(price);
      cardBody.appendChild(buttom);
      card.appendChild(cardBody);
      container.appendChild(card);
      containerProducts.appendChild(container);
    });
  }
}
// ---------------------------------------- //

const token = logged();

if (token == "" || token == null) {
  window.location.href = "http://localhost/chexter/login";
} else {
  fetch("http://localhost/chexter/product/getProducts", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      generateHtmlProducts(data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
