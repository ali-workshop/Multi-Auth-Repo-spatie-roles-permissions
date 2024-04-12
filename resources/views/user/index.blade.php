<a href="{{route('users.create')}}">add user</a>
@if (Session::has('message'))
    {{session('message')}}
@endif
<table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Emial </th>
        <th>Action</th>
        <th>Roles</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($users  as $user )
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        
        <td>
            {{-- {{route('permission.edit',['permission'=>$permission->id])}} --}}
           <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-success"> edit</a>
            <form method="POST" action="{{route('users.destroy',['user'=>$user])}}" >
            @csrf
            @method('DELETE')
            <input type='submit' class='btn btn-danger' value='delet'>
            </form>

        </td>

        <td>
            {{-- $user->roles --}}
          @if (!empty($user->getRoleNames()))
            
        @foreach ($user->getRoleNames() as $rolename)
          <label class="badge-dark mx-1" >{{$rolename}}</label>
        @endforeach  
          @endif
        </td> 
      </tr> 
      @endforeach
 
    </tbody>
  </table>