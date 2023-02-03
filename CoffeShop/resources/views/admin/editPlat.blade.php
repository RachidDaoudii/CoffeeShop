<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Plats
        </h2>
    </x-slot>
    <div class="py-12 container">
        <div class="row d-flex justify-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      Update Plats
                    </div>
                    <div class="card-body">
                        <form action="{{ url('plats/'.$show->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">img plat</label>
                            <input type="file" class="form-control" name="img_plat" id="exampleInputPassword1">
                                @error('img_plat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <img src="{{asset($show->img)}}" width="150px" alt="">
                                <input type="hidden" name="old_img" value="{{$show->img}}">
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">name plat</label>
                            <input type="text" class="form-control" name="name_plat" value="{{ $show->name }}" id="exampleInputPassword1">
                                @error('name_plat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">description</label>
                            <textarea class="form-control" name="description" id="exampleInputPassword1" >
                                {{ $show->description }}
                            </textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">price</label>
                            <input type="number" class="form-control" name="price" value="{{ $show->price }}" id="exampleInputPassword1">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn bg-primary text-white">update Plat</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
