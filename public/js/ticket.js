document.addEventListener('DOMContentLoaded', function () {
    const ticketType = document.getElementById('ticketType');
    const singleLineSelect = document.getElementById('singleLineSelect');
    const interLineSelect = document.getElementById('interLineSelect');

    // Ẩn tất cả khi bắt đầu
    singleLineSelect.disabled = false;
    interLineSelect.disabled = true;

    ticketType.addEventListener('change', function () {
        if (ticketType.value === 'Single_Line') {
            singleLineSelect.disabled = false;
            interLineSelect.disabled = true; // Ẩn Liên tuyến
        } else if (ticketType.value === 'inter_line') {
            singleLineSelect.disabled = true; // Ẩn Đơn tuyến
            interLineSelect.disabled = false;
        } else {
            singleLineSelect.disabled = true;
            interLineSelect.disabled = true; // Ẩn cả 2 khi chọn Toàn tuyến
        }
    });
});
