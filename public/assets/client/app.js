var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");

var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};

var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }

  citis.onchange = function () {
    district.length = 1;  // Reset quận
    ward.length = 1;      // Reset phường
    if(this.value != "") {
      const result = data.filter(n => n.Id === this.value);
      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
    displaySelection(); // Gọi hàm để hiển thị tên thành phố đã chọn
  };

  district.onchange = function () {
    ward.length = 1;  // Reset phường
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
    displaySelection(); // Gọi hàm để hiển thị tên quận đã chọn
  };

  wards.onchange = function () {
    displaySelection(); // Gọi hàm để hiển thị tên phường đã chọn
  };
}

// Hàm để lấy và hiển thị tên đã chọn
function displaySelection() {
  // Lấy tên thành phố (chữ) đã chọn
  var cityName = citis.options[citis.selectedIndex].text; 
  // Lấy tên quận (chữ) đã chọn
  var districtName = districts.options[districts.selectedIndex].text; 
  // Lấy tên phường (chữ) đã chọn
  var wardName = wards.options[wards.selectedIndex].text; 

  // In ra các giá trị
  console.log("City: " + cityName);  // Tên thành phố
  console.log("District: " + districtName);  // Tên quận
  console.log("Ward: " + wardName);  // Tên phường
  
  // Gán các giá trị này vào các trường ẩn của form để gửi lên server nếu cần
  document.getElementById('cityName').value = cityName;
  document.getElementById('districtName').value = districtName;
  document.getElementById('wardName').value = wardName;
}

    document.addEventListener('DOMContentLoaded', () => {
        const mbBankRadio = document.getElementById('visa');
        const qrCodeImage = document.querySelector('#qr');
        qrCodeImage.style.display = 'none';
        document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
            radio.addEventListener('change', () => {
                if (mbBankRadio.checked) {
                    qrCodeImage.style.display = 'block';
                } else {
                    qrCodeImage.style.display = 'none'; 
                }
            });
        });
    });
   