function getUrl() {
    let data = {};
    // переберём все элементы input, формы
    $('form').find ('input').each(function() {
        // добавим новое свойство к объекту $data
        data[this.name] = $(this).val();
    });
    $.ajax({
        type:'POST',
        url:'/geturl',
        data:  data,
        success:function(data) {
            $("#msg").html(data.msg);
            $("#url_id").html(data.url.id);
            $("#url_name").html(data.url.name);
        }
    });
}
