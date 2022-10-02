$("#shoppingCount").text(sessionStorage.getItem("count"));

$('.btnShoppingcart').click(function (event) {
  var count = 0;
  count = sessionStorage.getItem("count");
  count++;
  setCount(count);
  var product;
  var price;

  var cardBody = event.target.parentElement.parentElement.parentElement.parentElement;
  var childElementsCardBody = cardBody.childNodes;

  childElementsCardBody.forEach(child => {
    try {
      if (child.className.includes("productName")) {
        product = child.textContent;
        console.log(child.textContent);
      }
    } catch (exc) {
      //console.log(exc);
    }

  });


  var lowerCardBody = event.target.parentElement.parentElement.parentElement;
  var childElementsLowerCardBody = lowerCardBody.childNodes;

  childElementsLowerCardBody.forEach(child => {
    try {
      if (child.className.includes("price")) {
        price = child.textContent.split('$')[1];
        console.log(price);
      }
    } catch (exc) {
      //console.log(exc);
    }
  });

  if(sessionStorage.getItem('products') == null){
    sessionStorage.setItem("products", "");
  }
  sessionStorage.setItem("products", sessionStorage.getItem('products') + product + "@" + price + "%");


});

function setCount(count) {
  sessionStorage.setItem("count", count);
  $("#shoppingCount").text(sessionStorage.getItem("count"));
}