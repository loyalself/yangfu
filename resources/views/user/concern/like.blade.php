{{--如果目标用户id不等于当前用户的id才显示关注--}}
@if($target_user->id != \Auth::id())
<div>
    {{--  like-value=1表示当前用户关注了id为6的用户,若为0表示没有关注;like-user表示关注者的id  --}}
    {{--如果当前用户关注了目标用户--}}
    @if(\Auth::user()->hasStar($target_user->id))
        <button class="btn btn-default like-button" like-value="1" like-user="{{$target_user->id}}"  type="button">取消关注</button>
    @else
      <button class="btn btn-default like-button" like-value="0" like-user="{{$target_user->id}}"  type="button">关注</button>
    @endif
</div>
@endif