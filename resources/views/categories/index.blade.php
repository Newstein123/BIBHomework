@extends ('layouts/master');

@section('title', 'Category Home Page')

@section('content')
<style> 
    td,td {
        padding: 10px;
        width: 50%;
    }
</style>
@include('common.alert');
<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
     
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" value ={{request('search')}}>
          <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
            <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
          </svg></button>
        </form>
      </div>
    </nav>

   

<table class="table table-striped">
    <thead>
        <tr>
            <th> Id </th>
            <th> Category name </th>
            <th> Date </th>
            <th> Action </th>
        </tr>
       
    </thead>
    
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td> {{$category->id}} </td>
           
            <td> {{$category->name}}</td>
            <td> {{$category->created_at->diffForHumans()}}</td>
            @auth
            <td  class="d-flex"> 
              <div> </i>  <a href="{{route('categories.edit', ['id' => $category->id]);}}" class="btn btn-success me-2"><i class="bi bi-pencil-square me-2"></i> Edit </a></div>
                <form action="{{route('categories.destroy', ['id' => $category->id ]);}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure to delete')"> <i class="bi bi-trash"></i> Delete </button>
                </form>
            </td>
            @endauth
        </tr>
        
        @empty
        <td class="text-danger" colspan="100%"> There is no categories </td>
        @endforelse
    </tbody>

</table>


 


{{$categories->links()}}

@endsection