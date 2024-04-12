<div>


    {{-- {{route('permission.create')}} --}}

@if (!empty($message))
    {{$message}}
@endif

    <form action="{{url('users')}}" method="POST">
     @csrf
     <input type="text" name='name'>
     <input type="text" name='email'>
     <input type="password" name='password'>
     <select name="roles[]" id="roles" class='form-control' multiple>
        @foreach ($roles as $role)
        <option value={{$role->name}}>{{$role->name}}</option>
        @endforeach

      </select>
     
       <input type='submit' value='add user'>
    </form>
 </div>
 