<a href="{{route('permission.create')}}">add permission</a>
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
      @foreach ($permissions  as $permission )
      <tr>
        <td>{{$permission->id}}</td>
        <td>{{$permission->name}}</td>
        <td>
            {{-- {{route('permission.edit',['permission'=>$permission->id])}} --}}
           <a href="{{url('permission/'.$permission->id.'/edit')}}" class="btn btn-success"> edit</a>
            <form method="POST" action="{{route('permission.destroy',['permission'=>$permission])}}" >
            @csrf
            @method('DELETE')
            <input type='submit' class='btn btn-danger' value='delet'>
            </form>

        </td>
      </tr> 
      @endforeach
 
    </tbody>
  </table>