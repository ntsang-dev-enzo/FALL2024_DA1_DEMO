// document.addEventListener('DOMContentLoaded', function () {
//     const slider = document.querySelector('.slider');
//     const images = document.querySelectorAll('.slider img');
//     let currentIndex = 0;
//     const totalImages = images.length;

//     function moveSlider() {
//         currentIndex++;
//         if (currentIndex === totalImages) {
//             currentIndex = 0;
//         }
//         slider.style.transform = `translateX(-${currentIndex * 100}%)`;
//     }

//     let interval = setInterval(moveSlider, 3000);

//     document.getElementById('next').addEventListener('click', function () {
//         clearInterval(interval);
//         moveSlider();
//         interval = setInterval(moveSlider, 3000);
//     });

//     document.getElementById('prev').addEventListener('click', function () {
//         clearInterval(interval);
//         currentIndex--;
//         if (currentIndex < 0) {
//             currentIndex = totalImages - 1;
//         }
//         slider.style.transform = `translateX(-${currentIndex * 100}%)`;
//         interval = setInterval(moveSlider, 3000);
//     });
// });
// JavaScript để hỗ trợ hover trên các menu dropdowndocument.addEventListener('DOMContentLoaded', function () {
    // Chọn tất cả các menu con cấp 2

document.addEventListener('DOMContentLoaded', function() {
    var myCarousel = document.querySelector('#header-carousel');
    
    // Khởi tạo các options cho carousel
    var options = {
        interval: 5000, // Thời gian chuyển slide tự động (ms)
        wrap: true,      // Lặp lại slide khi đạt cuối cùng
        touch: true      // Cho phép chạm để chuyển slide
    };

    // Khởi tạo carousel từ đối tượng Bootstrap
    var carousel = new bootstrap.Carousel(myCarousel, options);

    // Xử lý sự kiện khi click vào nút prev và next
    document.querySelector('.carousel-control-prev').addEventListener('click', function() {
        carousel.prev();
    });
    document.querySelector('.carousel-control-next').addEventListener('click', function() {
        carousel.next();
    });

    // Hàm tự động chuyển slide
    var autoSlide = setInterval(function() {
        carousel.next(); // Tự động chuyển đến slide tiếp theo
    }, options.interval);
});


function calculateProductTotal(quantity, price) {
    return quantity * price;
}

// hàm tính tổng
function calculateTotal() {
    var total = 0;
    var sp1Qty = document.getElementById('qty1').value;
    var sp1Price = document.getElementById('qty1').getAttribute('data-price');
    var sp1Total = calculateProductTotal(parseInt(sp1Qty), parseInt(sp1Price));
    total += sp1Total;

    var sp2Qty = document.getElementById('qty2').value;
    var sp2Price = document.getElementById('qty2').getAttribute('data-price');
    var sp2Total = calculateProductTotal(parseInt(sp2Qty), parseInt(sp2Price));
    total += sp2Total;

    // tong tien
    document.getElementById('tongall').innerHTML = 'Tổng tiền: ' + chuyentien(total) + 'VNĐ';
}

// chuyển tiền vn
function chuyentien(amount) {
    return amount.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}
function decreaseQuantity(inputId) {
    var inputElement = document.getElementById(inputId);
    if (inputElement.value > 1) {
        inputElement.value--;
        calculateTotal();
    }
    if (inputId == 'qty1') {
        var pro = document.getElementById('qty1');
        var price = pro.getAttribute('data-price');
        var amount = price * inputElement.value;
        document.getElementById('tong1').innerText = amount;
    } else {
        var pro = document.getElementById('qty2');
        var price = pro.getAttribute('data-price');
        var amount = price * inputElement.value;
        document.getElementById('tong2').innerText = amount;
    }
}

function increaseQuantity(inputId) {
    var inputElement = document.getElementById(inputId);
    inputElement.value++;
    calculateTotal();
    if (inputId == 'qty1') {
        var pro = document.getElementById('qty1');
        var price = pro.getAttribute('data-price');
        var amount = price * inputElement.value;
        document.getElementById('tong1').innerText = amount;
    } else {


        var pro = document.getElementById('qty2');

        var price = pro.getAttribute('data-price');

        var amount = price * inputElement.value;
        document.getElementById('tong2').innerText = amount;
    }
}
document.getElementById("btn-xemthem").addEventListener("click", function () {
    var element = document.getElementById("xemthem");
    if (element) {
        element.classList.add("hien");
        element.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

        this.style.display = 'none';
    }
});
document.getElementById("btn-thugon").addEventListener("click", function () {
    var element = document.getElementById("xemthem");

    if (element) {
        element.classList.remove("hien");

        window.scrollTo(0, 500);
        document.getElementById("btn-xemthem").style.display = 'block';
    }
});

