const btns = document.querySelectorAll('.btn');
const storeServices = document.querySelectorAll('.store-service');
// const search = document.getElementById(search);

for (i = 0; i < btns.length; i++) {

    btns[i].addEventListener('click', (e) => {
        e.preventDefault()
        
        const filter = e.target.dataset.filter;
        console.log(filter);
        
        storeServices.forEach((service)=> {
            if (filter === 'all'){
                service.style.display = 'block'
            } else {
                if (service.classList.contains(filter)){
                    service.style.display = 'block'
                } else {
                    service.style.display = 'none'
                }
            }
        });
    });
};

// SEARCH FILTER
const search = document.getElementById("search");
const serviceName = document.querySelectorAll(".service-details h2");

// A BETTER WAY TO FILTER THROUGH THE serviceS
search.addEventListener("keyup", filterservices);


function filterservices(e) {
    const text = e.target.value.toLowerCase();
    console.log(serviceName[0]);
    serviceName.forEach(function(service) {
        const item = service.firstChild.textContent;
        if (item.toLowerCase().indexOf(text) != -1) {
            service.parentElement.parentElement.style.display = "block"
        } else {
            service.parentElement.parentElement.style.display = "none"
        }
    })
}