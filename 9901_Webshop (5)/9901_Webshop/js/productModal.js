function changeModal(id) {

    var element = document.getElementById(id);
    if (true) {
        $('#productModal').modal('show');
        console.log("ID: " + id)

        var childElements = element.childNodes;

        var modalTitle = document.getElementById("productModalTitle");
        var modalImg = document.getElementById("productModalImg");
        var modalDes = document.getElementById("productModalDes");
        var modalPrice = document.getElementById("productModalPrice");

        childElements.forEach(e1 => {
            if (e1.nodeName == "DIV") {

                e1.childNodes.forEach(e2 => {
                    if (e2.nodeName == "DIV") {
                        e2.childNodes.forEach(e3 => {
                            if (e3.nodeName == "P") {
                                if (e3.className.includes("productName")) {
                                    modalTitle.innerHTML = e3.textContent;

                                } else if (e3.className.includes("productDes")) {
                                    modalDes.innerHTML = e3.textContent;
                                }
                            }
                            if (e3.nodeName == "DIV") {
                                e3.childNodes.forEach(e4 => {
                                    console.log("E4: ");
                                    console.log(e4);
                                    try {
                                        if (e4.className.includes("price")) {
                                            modalPrice.innerHTML = e4.textContent;
                                            console.log("PRICE EL FORTNINITE");
                                            console.log(e4.textContent)
                                        }
                                    } catch (ex) {
                                        console.log(e4.className)
                                        console.log("Exception GIGANTIVO FORTUNUTOS" + ex);
                                    }
                                });
                            }
                        });
                    } else if (e2.nodeName == "IMG") {
                        modalImg.src = e2.src;
                    }
                });
            }

        });
    }else{
        console.log("fekifopef");
    }

}
