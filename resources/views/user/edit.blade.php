<div>
    <form action="{{url('users',['user'=> $user])}}" method="POST">
     @csrf
     @method('PUT')
     <input type="text" name='name' value={{$user->name}}>
     {{-- the email should not change because it is unique  i wil not consider the case of check and validation for the email --}}
     <input type="text" name='email' readonly  value='{{$user->email}}'> 
     <input type="password" name='password' >
     <select name="roles[]" id="roles" class='form-control' multiple  >
        @foreach ($roles as $role)
        <option value={{$role->name}}
            
            {{in_array($role->name,$userroles) ? 'selected': '' }}
            >{{$role->name}}</option>
        @endforeach

      </select>
     <input type='submit' value='update user'>
    </form>
 </div>
 