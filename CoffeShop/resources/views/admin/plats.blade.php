<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .. {{ Auth::user()->name }}
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
                <div class="card ">
                    <div class="card-header">
                      Table plats
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">img</th>
                                <th scope="col">name</th>
                                <th scope="col">description</th>
                                <th scope="col">price</th>
                                <th scope="col">id_category</th>
                                <th scope="col">action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($plats as $plat)
                              <tr>
                                <th scope="row">{{ $plats->firstItem()+$loop->index}}</th>
                                <td>{{ $plat->name}}</td>
                                <td><img src="{{ asset($plat->img) }}" alt="" width="50px"></td>
                                <td>{{ $plat->description}}</td>
                                <td>{{ $plat->price}}</td>
                                <td>{{ $plat->name_category}}</td>
                                <td>
                                    <form action="{{ route('plats.destroy',$plat->id )}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn bg-danger" type="submit" onclick="return confirm('Delete Plats')">Delete</button>
                                        <a href="{{ url('plats/'.$plat->id) }}" 
                                            class="btn bg-info">Edit</a>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $plats->links() }}
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  Plats
                </div>
                <div class="card-body">
                  <form action="{{ route('plats.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">img plat</label>
                      <input type="file" class="form-control" name="img_plat" id="exampleInputPassword1">
                        @error('img_plat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">name plat</label>
                      <input type="text" class="form-control" name="name_plat" id="exampleInputPassword1">
                        @error('name_plat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category</label>
                      <select class="form-select" name="category">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                        @endforeach
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">description</label>
                      <textarea class="form-control" name="description" id="exampleInputPassword1" cols="5" rows="5">
                      </textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">price</label>
                      <input type="number" class="form-control" name="price" id="exampleInputPassword1">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <button type="submit" class="btn bg-primary text-white">Add Plat</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        
    </div>
  
</x-app-layout>
