<div>
    <form action="{{url('role',['role'=> $role])}}" method="POST">
     @csrf
     @method('PUT')
     <input type="text" name="name" value='{{$role->name}}'>

     <input type='submit' value='update role'>
    </form>
 </div>
 