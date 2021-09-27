@extends("layouts.admin")

@section("page_title")
    Laravel Wip-Admin Page
@endsection


@section('content')

<div class="justify-center p-8 border-green-400 border-2 h-full w-full">
        <h1 class="text-blue-600 text-2xl mb-6">Course Type</h1>

          <div class="">
             <a class="text-blue-600 text-l mb-6 flow-root" href="{{ route('AddCourseType') }}">Add Course Type</a>
           </div>
    <div class="flex justify-between card_container mb-6">
<!-- component -->

 @if (session()->has('update_status'))
            <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                {{session('update_status')}}
            </div>
            @endif

        
<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Course Type ID</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Course Type Name</th>
           
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $types)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">                
                {{ $types->id }}                
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b block lg:table-cell relative lg:static">
                {{$types->course_type}}</td>
          	
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">              
                <a href="{{ url('/admin/type/update'.$types->id) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                <a href="{{ url('/admin/type/delete'.$types->id) }}" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    

@endsection
