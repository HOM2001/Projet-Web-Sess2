function slider () {
    const slider = document.getElementById('reading-time');
    const sliderValue = document.getElementById('slider-value')
    slider.addEventListener('input', function () {
        sliderValue.textContent = this.value + 'minutes';
    });
}
document.addEventListener('DOMContentLoaded', slider);

