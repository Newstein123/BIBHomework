@extends ('layouts/master');

@section('title', 'Category Home Page')

@section('content')
<style> 
    td,td {
        padding: 10px;
        width: 50%;
    }
    .flex  {
        display: flex;
    }
    .flex a {
        margin-right: 20px;
        padding: 10px !important;
    }
</style>
<table>
    <thead>
        <tr>
            <th> Id </th>
            <th> Category name </th>
            <th> Action </th>
        </tr>
       
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
           
            <td> {{$category->id}} </td>
            <td> {{$category->name}}</td>
            <td  class="flex"> 
                <a href="/categories/{{$category->id}}/edit" class="btn btn-success"> Edit </a>
                <form action="/categories/{{$category->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>



@endsection