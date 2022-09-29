$(document).ready(function(){

    $('#thumb').change(function(e){
        const thumb = URL.createObjectURL(e.target.files[0]);
        $('.show_image').html('<img src="'+ thumb +'" width="100px"></a>');
        $('.image_name').html('<span>'+ thumb +' </span>');
    });
    
});
function validate_form(){
    const category_id = $('input[name="category_id"]').val();
    const product_name = $('input[name="product_name"]').val();
    const thumb = $('input[name="thumb"]').val();
    
    if(category_id == "0"|| product_name == "" || thumb == ""){
        $('.error').html('<span>Thiếu thông tin</span>')
        return false;
    }
    else return true;
}
