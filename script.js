let btnAdd = document.querySelectorAll(".btn");
let priceAdd = document.querySelectorAll(".theprice");
let nameAdd = document.querySelectorAll(".thename");
let tiket = document.querySelector(".tiket");
let result = []

let num = 0;
let countnumber = document.querySelector(".count");
let countfooter = document.querySelector(".count-footer");


// this function is about add className for inputs
function addClassName() {
    btnAdd.forEach((button, index) => {
        button.classList.add(`buttonAdd${index + 1}`)
    })
    priceAdd.forEach((price, index) => {
        price.classList.add(`pricesAdd${index + 1}`)
    })
    nameAdd.forEach((name, index) => {
        name.classList.add(`namesAdd${index + 1}`)
    })
} addClassName();



//this function about displying data from product-cart to ticket case  
btnAdd.forEach((button, index) => {
    button.addEventListener("click", () => {
        let title = `.namesAdd${index + 1}`;
        let price = `.pricesAdd${index + 1}`;

        let titleadded = document.querySelector(title)
        let priceadded = document.querySelector(price);

        let contiener = document.createElement("div")
        let h3title = document.createElement("h4")
        let priceP = document.createElement("p")

        //button delet
        let btnDelete = document.createElement("p");
        btnDelete.innerHTML = '<i class="fa-solid fa-trash"></i>'
        btnDelete.addEventListener("click", function () {
            contiener.remove()
            num--
            countnumber.textContent = num;
            
            let total = parseFloat(countfooter.textContent)
            let product_total = parseFloat(priceadded.textContent)
            let result = total - product_total
            countfooter.textContent = result + "MAD"
        })
        contiener.setAttribute("class", "btnDelete")
        contiener.setAttribute("class", "contiener")

        h3title.textContent = titleadded.textContent
        priceP.textContent = parseFloat(priceadded.textContent)


        result.push(parseFloat(priceadded.textContent))
        let sum = result.reduce((accelatour, rounder) => (accelatour + rounder))
        // console.log(sum);
        countfooter.textContent = sum +"MAD"
        console.log(sum);


        contiener.appendChild(h3title)
        contiener.appendChild(priceP)
        contiener.appendChild(btnDelete)
        tiket.appendChild(contiener)

        //ifonclick the numbers conte
        num++
        countnumber.textContent = num;




    })
});

