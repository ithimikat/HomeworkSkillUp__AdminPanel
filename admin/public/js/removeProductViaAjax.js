window.onload = function () {

    let buttonsDeleteProduct = document.querySelectorAll('.btnDeleteProduct');

    for (button of buttonsDeleteProduct){

        //обработчик на кнопку удалить в блоке с товаром
        button.onclick = function () {

            let product = this.parentNode;
            let idProduct = this.value;
            let url = `/admin/src/deleteProduct.php?id=${idProduct}`;

            let xhr = new XMLHttpRequest();

            xhr.open('GET', url);

            xhr.onreadystatechange = function () {

                if(xhr.readyState === 4 && xhr.status === 200){

                    let res = xhr.responseText;
                    if(res) product.remove();
                }
            };

            xhr.send();
        };
    }
};