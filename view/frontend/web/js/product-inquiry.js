require(['jquery'], function ($) {
    $(document).ready(function () {
        const form = document.getElementById("inquiry-form");
        const loader = document.querySelector(".inq-loader");
        const msg = document.getElementById("form-success-msg");
        $('#inquiry-form').submit(function (e) {
            e.preventDefault();
            loader.style.display = "block";
            
            /* Ajax request */
            $.ajax({
                url: '/CustProdInq/Index/CustProdInq',
                type: 'POST',
                data: $('#inquiry-form').serialize(),
                success: function (response) {
                    form.style.display = "none";
                    msg.style.display = "block";
                    loader.style.display = "block";
                },
                error: function () {
                    form.style.display = "block";
                    msg.style.display = "none";
                    alert('An error occurred.');
                }
            });
        });
    });
});
