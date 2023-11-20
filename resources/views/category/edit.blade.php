<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Edit Category
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control"
                                   id="category_name" placeholder="Enter category name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="category_status">Category Status</label>
                            <select name="status" class="form-control" id="status">
                                <option selected disabled class="form-control" value="#">
                                    @if($category->status == 0)
                                        Non Active
                                    @else
                                        Active
                                    @endif
                                </option>
                                <option class="form-control" value="1">Active</option>
                                <option class="form-control" value="0">Non Active</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Create +">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
