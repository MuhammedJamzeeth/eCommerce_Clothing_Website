// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});



/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

function validateForm1(){
    var userIn = document.getElementById('userIn');
    var errorMessage = document.getElementById("error-message");



    if(userIn.value === '1'){
        document.getElementById('addCart').submit();
    }else {
        errorMessage.textContent = "Please login before add to cart";
        // errorMessage.classList.add("show2");
        errorMessage.style.opacity = '1';
        errorMessage.style.height = '60px';
        errorMessage.style.transform = 'translateX(0)';

        setTimeout(function() {
            // errorMessage.classList.remove("show2","transition");
            errorMessage.style.opacity = '0';
            errorMessage.style.height = '0px';
            errorMessage.style.transform = 'translateX(-100%)';
        }, 3000);

    }

}
function validateForm2(){
    var userIn = document.getElementById('userIn');
    var errorMessage = document.getElementById("error-message");

    if(userIn.value == '1'){
        document.getElementById('addCart').submit();
    }else {
        errorMessage.textContent = "Please login before buy";
        // errorMessage.classList.add("show2");
        errorMessage.style.opacity = '1';
        errorMessage.style.height = '60px';
        errorMessage.style.transform = 'translateX(0)';

        setTimeout(function() {
            // errorMessage.classList.remove("show2","transition");
            errorMessage.style.opacity = '0';
            errorMessage.style.height = '0px';
            errorMessage.style.transform = 'translateX(-100%)';
        }, 3000);

    }

}

