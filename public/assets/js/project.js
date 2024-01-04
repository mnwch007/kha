$(document).ready(function () {
    $('#pie-me').pieChart({
        size: 330,
        barColor: '#157bb0',
        trackColor: '#cccccc',
        lineCap: 'butt',
        lineWidth: 40,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').html(Math.round(percent) + '%' + '<br />โดยรวม');
        }
    });
});