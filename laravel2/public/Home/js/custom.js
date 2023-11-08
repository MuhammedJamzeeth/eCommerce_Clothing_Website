

// Get the input elements, total span elements, and price elements
var numberInputs = document.querySelectorAll('.numberInput');
var totalSpans = document.querySelectorAll('.total');
var priceElements = document.querySelectorAll('.price');
var grandTotalElement = document.getElementById('grantTotal');



// Add event listener to input elements for input event
numberInputs.forEach(function(numberInput, index) {
    totalSpans[index].textContent = "Rs." + parseFloat(numberInput.value)*parseFloat(priceElements[index].textContent);

    numberInput.addEventListener('input', function() {
        // Parse the input value as a number
        var inputValue = parseFloat(numberInput.value);
        var priceValue = parseFloat(priceElements[index].textContent);

        // If the input is a valid number, update the total for the corresponding row
        if (!isNaN(inputValue) && !isNaN(priceValue)) {
            // Update the total by multiplying the input value with the price
            var newTotal = priceValue * inputValue;

            // Update the total span with the new total for the corresponding row
            totalSpans[index].textContent = "Rs." + newTotal;
        } else {
            // If the input or price is not a valid number, set total to 0 for the corresponding row
            totalSpans[index].textContent = "Rs.0";
        }
        var grandTotal = 0;
        totalSpans.forEach(function(totalSpan, index) {

            var total = parseFloat(totalSpan.textContent.replace('Rs.',''));
            if (!isNaN(total)) {
                grandTotal += total;
            }
            grandTotalElement.textContent = 'Rs.' + grandTotal;

        });
        var setTotal = document.getElementById('headTot');
        var grandTotalElement2 = document.getElementById('grantTotal').textContent;

        setTotal.textContent = grandTotalElement2;
    });
    var grandTotal = 0;
    totalSpans.forEach(function(totalSpan, index) {

        var total = parseFloat(totalSpan.textContent.replace('Rs.',''));
        if (!isNaN(total)) {
            grandTotal += total;
        }
        grandTotalElement.textContent = 'Rs.' + grandTotal;
    });
});

var setTotal = document.getElementById('headTot');
var grandTotalElement2 = document.getElementById('grantTotal').textContent;

setTotal.textContent = grandTotalElement2;



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

    var numQtyInput = document.getElementById("numQty");
    var errorMessage = document.getElementById("error-message");
    var productSize=document.querySelectorAll('.productSizeInput');
    var productQuantity=document.querySelectorAll('.productQuantityInput');


    if(userIn.value === '1'){
        document.getElementById('myForm').submit();
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
function updatePrice(){
    var grandTotalElement = document.getElementById('grantTotal');
    var setTotal = document.getElementById('headTot');

    setTotal.textContent = '4';
}

function validateForm2(){
    var userIn = document.getElementById('userIn');
    var errorMessage = document.getElementById("error-message");
    var numberInput = document.getElementById('numQty');

    if(userIn.value == '1'){
        document.getElementById('myForm2').submit();
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


