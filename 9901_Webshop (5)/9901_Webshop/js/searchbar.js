
$(document).ready(function () {
    $('#searchItems').hide();
});



function search() {

    $('#searchItems').show();
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    ul = document.getElementById("searchItems");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            console.log(filter)
        } else {
            li[i].style.display = "none";
        }

        if (filter == "") {
            li[i].style.display = "none";
        }
    }
}



function activeE() {
    const element = document.activeElement.id;
    if (element == 'searchBar') {
        //$('#searchItems').show();
    } else {
        $('#searchItems').hide();
    }
}

