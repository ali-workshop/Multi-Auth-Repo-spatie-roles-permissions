<div>
    <form action="{{route('role.givepermission',['roleid'=>$role])}}" method="POST">
     @csrf
     @method('PUT')
        @if (Session::has('status'))
            {{session('status')}}
        @endif
        @foreach ($permissions as $permission)
        <label> 
            {{-- #use the array foramt [] below because i wwant multiable permession to ceck not only one and weak reason also :-> because i have several permission have the same name as group of permission  --}}
            {{-- wiht out it the code will not add any permissions --}}
            <input type="checkbox" name="permission[]" value='{{$permission->name}}' {{ $rolePermissions->contains($permission->id) ? 'checked' : '' }}>
        
            {{$permission->name}}<label>
            @endforeach
        
    
     <input type='submit' value='update role'>
    </form>
 </div>
 