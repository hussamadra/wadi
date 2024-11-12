// const btns = document.querySelectorAll('.btn');
// const storeServices = document.querySelectorAll('.store-service');
// const search = document.getElementById(search);

// for (i = 0; i < btns.length; i++) {

//     btns[i].addEventListener('click', (e) => {
//         e.preventDefault()
        
//         const filter = e.target.dataset.filter;
//         console.log(filter);
        
//         storeServices.forEach((service)=> {
            
            
        
//                 if (service.classList.contains(filter)){
//                     service.style.display = 'block'
//                 } else {
//                     service.style.display = 'none'
//                 }
//             });
//         });
//     }


// SEARCH FILTER
// const search = document.getElementById("search");
// const serviceName = document.querySelectorAll(".service-details h2");

// A BETTER WAY TO FILTER THROUGH THE serviceS
// search.addEventListener("keyup", filterservices);


// function filterservices(e) {
//     const text = e.target.value.toLowerCase();
//     console.log(serviceName[0]);
//     serviceName.forEach(function(service) {
//         const item = service.firstChild.textContent;
//         if (item.toLowerCase().indexOf(text) != -1) {
//             service.parentElement.parentElement.style.display = "block"
//         } else {
//             service.parentElement.parentElement.style.display = "none"
//         }
//     })
// }

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("store-service");
    
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }
  
  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }
  
  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }

// function filterservices(c) {
//   var x, i;
//   x = document.getElementsByClassName("store-service ");
  
//   // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
//   for (i = 0; i < x.length; i++) {
//     w3RemoveClass(x[i], "show");
//     if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
//   }
// }

// Show filtered elements
// function w3AddClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     if (arr1.indexOf(arr2[i]) == -1) {
//       element.className += " " + arr2[i];
//     }
//   }
// }

// Hide elements that are not selected
// function w3RemoveClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     while (arr1.indexOf(arr2[i]) > -1) {
//       arr1.splice(arr1.indexOf(arr2[i]), 1);
//     }
//   }
//   element.className = arr1.join(" ");
// }
