$(document).ready(function() {
    $("#option-all").click(function(){
        $(".shop-card").remove();
        $(".body-content").load("./queryfunctions/queryall.php");
    })
})

$(document).ready(function() {
    $("#option-foods").click(function(){
        $(".shop-card").remove();
        $(".body-content").load("./queryfunctions/querymakanan.php");
    })
})

$(document).ready(function() {
    $("#option-drinks").click(function(){
        $(".shop-card").remove();
        $(".body-content").load("./queryfunctions/queryminuman.php");
    })
})

$(document).ready(function() {
    $("#option-snacks").click(function(){
        $(".shop-card").remove();
        $(".body-content").load("./queryfunctions/querysnacks.php");
    })
})
