<div>
   {{-- {{route('role.create')}}  --}}
   <form action="{{url('role')}}" method="POST">
    @csrf
    <input type="text" name='name'>
   <input type='submit' value='add role '>
   </form>
</div>
