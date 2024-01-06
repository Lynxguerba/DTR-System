const conts = document.querySelector('.conts'),
        overlay = document.querySelector('.overlay'),
        showModalBtn = document.querySelector('.show-modal'),
        closeBtn = document.querySelector('.close-btn');

        showModalBtn.addEventListener("click", () => conts.classList.add('active'));

        overlay.addEventListener("click", () => conts.classList.add('active'));

        closeBtn.addEventListener("click", () => 
        conts.classList.remove('active'));