<a href="{{route('role.create')}}">add role</a><br><br>
@if (Session::has('status'))
    {{session('status')}}
@endif
<table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($roles  as $role )
      <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>
            {{-- {{route('role.edit',['role'=>$role->id])}} --}}
           <a href="{{url('role/'.$role->id.'/edit')}}" class="btn btn-success"> edit</a>
           <a href="{{url('role/'.$role->id.'/add/permission')}}" class="btn btn-success"> Add Permission</a>
            <form method="POST" action="{{route('role.destroy',['role'=>$role])}}" >
            @csrf
            @method('DELETE')
            <input type='submit' class='btn btn-danger' value='delet'>
            </form>

        </td>
      </tr> 
      @endforeach
 
    </tbody>
  </table>