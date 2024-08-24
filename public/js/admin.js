
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('format').addEventListener('input', function (e) {
        var value = e.target.value;

        // Loại bỏ mọi ký tự không phải số
        value = value.replace(/\D/g, '');

        // Định dạng lại số với dấu phân cách hàng nghìn
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        e.target.value = value;
    })
})
