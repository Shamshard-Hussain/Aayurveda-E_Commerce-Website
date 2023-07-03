/*function search() {
  let filter = document.getElementById('find').value.toUpperCase();
    let item = document.querySelectorAll('.product-card');
    let l = document.getElementsByTagName('h3');
 
      for(var i = 0;i<=l.length;i++){
         let a=item[i].getElementsByTagName('h3')[0];
         let value=a.innerHTML || a.innerText || a.textContent;
       
             if(value.toUpperCase().indexOf(filter) > -1) {
             item[i].style.display="";
             }
       
             else{
             item[i].style.display="none";
             }
      }
 }*/
 document.getElementById('find').addEventListener('input', function() {
    search();
  });

  function search() {
    let filter = document.getElementById('find').value.toUpperCase();
    let productCards = document.querySelectorAll('.product-card');

    productCards.forEach(productCard => {
      let h3 = productCard.querySelector('h3');
      let h4 = productCard.querySelector('h4');
      let p = productCard.querySelector('p');
      let price = productCard.querySelector('.card-price'); // Add this line to get the price element
      let h3Value = h3.innerHTML || h3.innerText || h3.textContent;
      let h4Value = h4 ? h4.innerHTML || h4.innerText || h4.textContent : '';
      let pValue = p.innerHTML || p.innerText || p.textContent;
      let priceValue = price.innerHTML || price.innerText || price.textContent; // Add this line to get the price value
      let isMatch = (h3Value.toUpperCase().indexOf(filter) > -1) || 
                    (h4Value.toUpperCase().indexOf(filter) > -1) || 
                    (pValue.toUpperCase().indexOf(filter) > -1) ||
                    (priceValue.toUpperCase().indexOf(filter) > -1); // Add priceValue to the isMatch check
      if (isMatch) {
        productCard.style.display = "";
      } else {
        productCard.style.display = "none";
      }
    });
  }


