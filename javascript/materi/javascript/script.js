(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        var state = document.getElementById("s-state");

        document
            .getElementById("cart-hplus")
            .addEventListener("submit", estimateTotal);

        var btnEstimate = document.getElementById("btn-estimate");

        btnEstimate.disabled = true;

        state.addEventListener("change", function () {
            if (state.value === "") {
                btnEstimate.disabled = true;
            }
            else {
                btnEstimate.disabled = false;
            }
        });

        function estimateTotal(event) {
            event.preventDefault();
            alert("testing");
        }
    });
})();