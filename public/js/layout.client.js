
document.addEventListener("DOMContentLoaded", function () {
    const truButton = document.getElementById('tru')
    const congButton = document.getElementById('cong')
    const soluongInput = document.getElementById('soluong')


    soluongInput.value = soluongInput.value || 1;
    truButton.addEventListener('click', function () {
        let currentValue = parseInt(soluongInput.value)
        if (currentValue > 1){
            soluongInput.value = currentValue - 1
        }
    });

    congButton.addEventListener('click', function () {
        let currentValue = parseInt(soluongInput.value)
            soluongInput.value = currentValue + 1
    })
})


