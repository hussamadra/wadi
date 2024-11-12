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
const serviceName = document.querySelectorAll(".service-details h4");

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

//close
document.getElementById('button-pop').addEventListener('click',function(){
    document.querySelector('.bg-model').style.display = 'flex';
});
document.querySelector('.close').addEventListener('click',
function(){
    document.querySelector('.bg-model').style.display = 'none';

})
// select dropdown
// function getddl(){
//     document.getElementById('lbness').innerHTML=(formid.ddlist[formid.ddlist.selectedIndex].value)
// }
function getddl(){
    document.getElementById('lbness').innerHTML=(formid.ddlist[formid.ddlist.selectedIndex].value)
}
// confirm number
var number = document.getElementById("number")
   confirm_password = document.getElementById("confirm_number");

function validateNumber(){
  if(number.value != confirm_number.value) {
    confirm_number.setCustomValidity("Number Don't Match");
  } else {
    confirm_number.setCustomValidity('');
  }
}

number.onchange = validateNumber;
confirm_number.onkeyup = validateNumber;

// 1
document.getElementById('button-pop1').addEventListener('click',function(){
    document.querySelector('.bg-model1').style.display = 'flex';
});
document.querySelector('.close1').addEventListener('click',
function(){
    document.querySelector('.bg-model1').style.display = 'none';

})

function getddl1(){
    document.getElementById('lbness1').innerHTML=(formid1.ddlist1[formid1.ddlist1.selectedIndex].value)
}
// 2
document.getElementById('button-pop2').addEventListener('click',function(){
    document.querySelector('.bg-model2').style.display = 'flex';
});
document.querySelector('.close2').addEventListener('click',
function(){
    document.querySelector('.bg-model2').style.display = 'none';
    

})
function getddl2(){
    document.getElementById('lbness2').innerHTML=(formid2.ddlist2[formid2.ddlist2.selectedIndex].value)
}
// 3

document.getElementById('button-pop3').addEventListener('click',function(){
    document.querySelector('.bg-model3').style.display = 'flex';
});
document.querySelector('.close3').addEventListener('click',
function(){
    document.querySelector('.bg-model3').style.display = 'none';

})
function getddl3(){
    document.getElementById('lbness3').innerHTML=(formid3.ddlist3[formid3.ddlist3.selectedIndex].value)
}