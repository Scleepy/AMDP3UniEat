$(document).ready(function() {
    $("#button-add-rate").click(function() {

        let amount = parseInt($("#input-amount").val());

        if(amount < 5) $("#input-amount").val(amount + 1);

    })
})

$(document).ready(function() {
    $("#button-minus-rate").click(function() {

        let amount = parseInt($("#input-amount").val());
        
        if(amount > 1) $("#input-amount").val(amount - 1);

    })
})