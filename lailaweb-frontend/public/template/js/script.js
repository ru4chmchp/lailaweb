import * as mdb from 'mdb-ui-kit';

document.addEventListener('DOMContentLoaded', () => {
    // Khởi tạo Carousel
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach((carousel) => {
        new mdb.Carousel(carousel);
    });
});
