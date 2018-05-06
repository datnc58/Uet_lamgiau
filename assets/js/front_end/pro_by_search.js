function cate_pro(id){
    $('#cate_pro').attr('value', id);
}
function price_pro(id, obj){
    $("#price_pro").attr('value', id)
    var v = obj.data("value");
    switch(v){
        case 0:
        {
            $('#v_0').addClass("active");
            $('#v_1').removeClass("active");
            $('#v_2').removeClass("active");
            $('#search_concept_price').removeClass("active");
            break;
        }
        case 1:
        {
            $('#v_1').addClass("active");
            $('#v_0').removeClass("active");
            $('#v_2').removeClass("active");
            $('#search_concept_price').removeClass("active");
            break;
        }
        case 2:
        {
            $('#v_2').addClass("active");
            $('#v_0').removeClass("active");
            $('#v_1').removeClass("active");
            $('#search_concept_price').removeClass("active");
            break;
        }
        default :
        {
            $('#search_concept_price').addClass("active");
            $('#v_2').removeClass("active");
            $('#v_0').removeClass("active");
            $('#v_1').removeClass("active");
            break;
        }
    }
    //$('#v_'+id).addClass("background-color", "yellow");
}
function attribute(id){
    $("#attribute").attr('value', id);

}
function check_search(chon, ojb){
    //console.log(chon);
    var md = ojb.data('value');
    var cate = $("#cate_pro").val();
    var price = $("#price_pro").val();
    var attr = $("#attribute").val();
    var user_id = $('#user_id').val();
    if ($('#pro_new').is(":checked"))
    {
        var pro_new =1;
    }else{
        var pro_new =0;
    }
    if ($('#amortization').is(":checked"))
    {
        var amortization =1;
    }else{
        var amortization =0;
    }
    switch(chon){
        case 'a':
        {

            window.location='?sort='+md+'&cat_pro='+cate+'&price_pro='+price+'&attr='+attr+'&pro_new='+pro_new+'&amortization='+amortization+'&id='+user_id;
            break;
        }
        case 'desc':
        {
            window.location='?sort='+md+'&cat_pro='+cate+'&price_pro='+price+'&attr='+attr+'&pro_new='+pro_new+'&amortization='+amortization+'&id='+user_id;

            break;
        }
        case 'asc':
        {
            window.location='?sort='+md+'&cat_pro='+cate+'&price_pro='+price+'&attr='+attr+'&pro_new='+pro_new+'&amortization='+amortization+'&id='+user_id;
            break;
        }
        default :
            window.location();
    }
}