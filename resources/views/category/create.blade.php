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
                    <h1>New Category</h1>
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                   id="category_name" placeholder="Enter category name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="category_status">Category Status</label>
                            <select name="status" class="form-control" id="status">
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
