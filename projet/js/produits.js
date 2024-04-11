function toggleStock() {
    // get the stock
    var stock = document.getElementsByClassName("stock");

    // get the current value of the stock's display property
    var displaySetting = stock[0].style.display;

    // also get the stock button, so we can change what it says
    var stockButton = document.getElementById("stockButton");

    // now toggle the stock and the button text, depending on current state
    if (displaySetting == 'table-cell') {
        // stock is visible. hide it
        for (let i = 0; i < stock.length; i++) {
            stock[i].style.display = 'none';
        }
        
        // change button text
        stockButton.textContent = 'Afficher stock';
    }
    else {
        // stock is hidden. show it
        for (let i = 0; i < stock.length; i++) {
            stock[i].style.display = 'table-cell';
        }
        

        // change button text
        stockButton.textContent = 'Cacher stock';
    }
}

function remove(removeId)
{
    var removeButton = document.getElementById(removeId);
    var addButton = document.getElementById(removeId*10);
    var commande = document.getElementsByClassName("commande")[removeId-1];
    var stockValue = parseInt(document.getElementsByClassName("stock")[removeId].innerHTML);
    var nbCommande = parseInt(commande.value);

    commande.value = nbCommande - 1; // we remove one from the number of selected products

    if(nbCommande == stockValue) // make the add button available again
    {
        addButton.disabled = false;
    }
    else if (nbCommande == 1) // make the remove button unavailable
    {
        removeButton.disabled = true;
    }
}

function add(addId)
{
    var intRemove = addId / 10;
    var removeButton = document.getElementById(intRemove);
    var addButton = document.getElementById(addId);
    var commande = document.getElementsByClassName("commande")[intRemove-1];
    var stockValue = parseInt(document.getElementsByClassName("stock")[intRemove].innerHTML);
    var nbCommande = parseInt(commande.value);

    commande.value = nbCommande + 1; // we add one from the number of selected products
    
    if(nbCommande == stockValue-1) // make the add button unavailable
    {
        addButton.disabled = true;
    }
    else if (nbCommande == 0) // make the remove button available again
    {
        removeButton.disabled = false;
    }
}

function imgZoom(i)
{
    // Get the modal
    var modal = document.getElementById("myModal"+i);

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementsByClassName("myImg");
    var modalImg = document.getElementById("img0"+i);
    var captionText = document.getElementById("caption"+i);
    modal.style.display = "block";
    modalImg.src = img[i].src;
    captionText.innerHTML = img[i].alt;
}



// When the user clicks on <span> (x), close the modal
function hideImg(i) {
    // Get the modal
    var modal = document.getElementById("myModal"+i);
    modal.style.display = "none";
}





