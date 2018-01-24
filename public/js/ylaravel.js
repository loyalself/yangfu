$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var editor = new wangEditor('content');
if(editor.config)
{
    editor.config.uploadImgUrl = '/posts/img/upload';
    editor.config.uploadHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
    editor.create();
};

$(".like-button").click(function(event){
    var target = $(event.target);
    var current_like = target.attr('like-value');
    var user_id = target.attr('like-user');
    if(current_like == 1)
    {
        //就显示取消关注   and   如何在ajax中传递token呢
        $.ajax({
            url:'/user/'+ user_id + '/unfan',
            method:'POST',
            dataType:'json',
            success:function(data){         //这里的data是后台返回来的数据
                if(data.error != 0)
                {
                    alert.msg;
                    return;
                }
                target.attr('like-value',0)     //如果取消关注成功,就将like-value的值变为0
                target.text('关注')             //并显示关注
            }
        })
    }else
    {
        $.ajax({
            url:'/user/'+ user_id + '/fan',
            method:'POST',
            dataType:'json',
            success:function(data){         //这里的data是后台返回来的数据
                if(data.error != 0)
                {
                    alert.msg;
                    return;
                }
                target.attr('like-value',1)
                target.text('取消关注')
            }
        })
    }
})