// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

//Loading items in shoppingcart
$(document).ready(function () {
  
  var productList = document.getElementById("productList")

  var allProducts = sessionStorage.getItem("products");
  var products = allProducts.split('%');


  for (var i = 0; i < products.length; i++) {
    console.log(products[i] + "\n");
    var productName = products[i].split('@')[0];
    var productPrice = products[i].split('@')[1];

    var li = document.createElement('li');
    li.className = "list-group-item d-flex justify-content-between lh-sm";

    var div = document.createElement('div');
    
    var h6 = document.createElement('h6');
    h6.textContent = productName;
    h6.className = "my-0";

    var small = document.createElement('small');
    small.className = "text-muted";
    small.textContent = "Quantity";

    var span = document.createElement('span');
    span.textContent = "$" + productPrice;
    span.className = "text-muted";

    li.appendChild(div);
    div.appendChild(h6);
    div.appendChild(small);
    li.appendChild(span);

    productList.appendChild(li);
  }



  /* 
  <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Product name</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                        </li>
  */
})



