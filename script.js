const cart = document.querySelector('.cart-record');
const productDelete = document.querySelector('.ri-arrow-right-line');
const cartIcon = document.querySelector('.ri-shopping-bag-4-line');
const addCart = document.querySelectorAll('.add-cart');

cartIcon.addEventListener('click', ()=> {
    cart.classList.add('active'); 
});

productDelete.addEventListener('click', ()=> {
    cart.classList.remove('active'); 
});

addCart.forEach(button => {
    button.addEventListener('click', Event => {
        const productBox = Event.target.closest(".product-card");
        addToCart(productBox);
    })
})

const cartContent = document.querySelector('.post')
const addToCart = productBox => {
    const prodImgScr = productBox.querySelector("img").src;
    const prodTitle = productBox.querySelector(".product-title").textContent;
    const prodPrice = productBox.querySelector(".price").textContent;

    const cartItems = cartContent.querySelectorAll(".product-title");
    for (let item of cartItems){
        if (item.textContent === prodTitle) {
            console.log("This already exist!");
            return;
        }
    }

    const cartBox = document.createElement('div');
    cartBox.classList.add("cart-bax");
    cartBox.innerHTML = `
    <img src="${prodImgScr}" alt="Product 1">
                <div class="product-block">
                    <h3 class="product-title">${prodTitle}</h3>
                    <span class="price">${prodPrice}</span>
                    <div class="product-quantity">
                        <button class="decrease"  id="decrement">-</button>
                        <span class="number" id="count">1</span>
                        <button class="increase"id="increment">+</button>
                    </div>
                    <div class="product-delete">
                        <i class="ri-delete-bin-5-line "></i>
                    </div>
                </div>
    `;

    cartContent.appendChild(cartBox);

    cartBox.querySelector(".ri-delete-bin-5-line").addEventListener("click", () => {
        cartBox.remove();
    });

    const increase = document.querySelector(".increase");
    const decrease = document.querySelector(".decrease");

    let count = 1;
    function updateCount() {
        let countAll = document.querySelectorAll(".number");
        for (let i of countAll) {
            i.innerHTML = count;
        }
    
    }

    increase.addEventListener("click", () => {
        count++;
        updateCount();
    })

    decrease.addEventListener("click", () => {
        if(count === 1) {
            console.log("Can't go below Zero!")
        } else {
            count--;
        }
        updateCount();
    })

    updateCount();
}