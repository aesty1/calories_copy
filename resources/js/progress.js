let target_text = document.querySelector('.page_center_title');
let current_text = document.querySelector('.current_text');
let weight_bar_text_first = document.querySelector('.weight_bar_text_first');
let weight_bar_text_last = document.querySelector('.weight_bar_text_last');
let bar = document.querySelector('.progress__fill_bar');
// Обновление графика
let weight = '';
let purpose_weight = '';
function edit_bar(weight, purpose_weight) {
    
}
fetch('http://calories/api/user') 
    .then((res) =>{
        return res.json()
    })
    .then((body) => {
        target_text.innerHTML = "Target weight: " + body.weight + " kg";
        current_text.innerHTML = "Current weight: " + body.weight + " kg";
        weight_bar_text_first.innerHTML = body.weight + " kg";
        weight_bar_text_last.innerHTML = body.purpose_weight + " kg";
        weight = body.weight.value;
        purpose_weight = body.purpose_weight.value;
    })
let canvas = document.querySelector('#target_date').getContext('2d');
let pace_value = 0.7;
window.targetDates = { dates: "20 of december 2020" };
let date = window.targetDates.dates;
window.canvasObj = new Chart(canvas, {
    type: 'line',
    data: {
        labels: ['Today', date[`${pace_value}`]],
        datasets: [{
            label: 'Tempo',
            data: [weight, purpose_weight],
            backgroundColor: [
                'white'
            ],
            borderColor: [
                '#41CD8C'
            ],
            color: [
                '#0E0E11'
            ],
            borderWidth: 2
        }]
    },
    options: {},
})
