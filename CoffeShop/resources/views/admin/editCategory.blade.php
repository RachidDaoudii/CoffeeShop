<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Categories
        </h2>
    </x-slot>
    <div class="py-12 container">
        <div class="row d-flex justify-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      Update Categories
                    </div>
                    <div class="card-body">
                        <form action="{{ url('category/update/'.$show->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">name category</label>
                              <input type="text" class="form-control" name="name_category"
                               id="exampleInputPassword1" value="{{ $show->name_category }}">
                                @error('name_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn bg-primary text-white">update category</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
