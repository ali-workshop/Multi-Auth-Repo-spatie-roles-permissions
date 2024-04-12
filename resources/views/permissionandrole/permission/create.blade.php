<div>
   {{-- {{route('permission.create')}} --}}
   <form action="{{url('permission')}}" method="POST">
    @csrf
    <input type="text" name='name'>
    <input type='submit' value='add permission'>
   </form>
</div>
