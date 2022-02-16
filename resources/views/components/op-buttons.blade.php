
<div class="row">
    <div class="col-5"><a href="{{url($section.'/'.$model.'/edit')}}"><button class="btn btn-primary w-100 ml-2">Edit</button></a></div>
    <div class="col-6">
        <form action="{{$section.'/'.$model}}" method="POST" class="w-100">
            @method('delete')
            @csrf
            <button class="btn btn-danger w-100 mr-2" type="submit">Delete</button>
        </form>

    </div>
</div>
