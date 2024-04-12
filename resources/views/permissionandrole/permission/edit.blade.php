<div>
    <form action="{{url('permission',['permission'=>$permission])}}" method="POST">
     @csrf
     @method('PUT')
     <input type="text" name="name" value='{{$permission->name}}'>
     <input type='submit' value='update permission'>
    </form>
 </div>
 