$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
$('.post-audit').click(function(event){
    target = $(event.target)
    var post_id = target.attr('post-id')
    var status = target.attr('post-action-status')

    $.ajax({
        url:'/admin/posts/'+ post_id + '/status',
        method:'post',
        data:{'status':status},
        dataType:'json',
        success:function(data){
            if(data.error != 0)
            {
                alert(data.msg);
                return;
            }
            target.parent().parent().remove();
        }
    });
})
//删除专题
$('.resource-delete').click(function(event){
    if(confirm('您确定不要我了吗?')== false)
    {
        return;
    }
    var target = $(event.target);
    event.preventDefault();
    var url = $(target).attr('delete-url');
    $.ajax({
        url:url,
        method:'post',
        data:{'_method':'DELETE'},
        dataType:'json',
        success:function(data){
            if(data.error != 0)
            {
                alert(data.msg);
                return;
            }
            window.location.reload();
        }
    })
})