$(document).ready(function() {
    $("#button-add").click(function() {

        let amount = parseInt($("#input-amount").val());

        $("#input-amount").val(amount + 1);

    })
})

$(document).ready(function() {
    $("#button-minus").click(function() {

        let amount = parseInt($("#input-amount").val());
        
        if(amount > 1) $("#input-amount").val(amount - 1);

    })
})