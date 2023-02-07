<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>
    <div class="py-12 container">
        <div class="row">
            <div class="col-md-8">
                @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                      Table Categories
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">id_user</th>
                                <th scope="col">name</th>
                                {{-- <th scope="col">Created_ad</th> --}}
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index}}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->name_category }}</td>
                                        {{-- <td>{{ Carbon\Carbon::parse($category->creted_at)->diffForHumans() }}</td> --}}
                                        <td>
                                            <form action="{{ url('category/delete/'.$category->id) }}" method="POST" >
                                                @csrf
                                                <button onclick="return confirm('Delete Category')" class="btn bg-danger">Delete</button>
                                                <a href="{{ url('category/show/'.$category->id) }}" class="btn bg-info">Edit</a>
                                            </form>
                                        </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{$categories->links()}}
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                      Categories
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.category')}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">name category</label>
                              <input type="text" class="form-control" name="name_category" id="exampleInputPassword1">
                                @error('name_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn bg-primary text-white">Add category</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
