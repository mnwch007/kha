(function ($) {
    $(document).ready(function () {

        $(document).on('change', 'select.change_syear', function (e) {
            var year = $(this).val(),
                    lang = $("base").attr("lang");
            var url = (lang == 'en') ? $("base").attr("data-url-en") + '?year=' + year : $("base").attr("data-url-th") + '?ปี=' + year;
            window.location.href = url;
        });
    });
})(jQuery);