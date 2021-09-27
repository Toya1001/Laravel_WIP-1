@extends("layouts.admin")

@section("page_title")
    Laravel Wip-Admin Page
@endsection

@section('content')

<div class="justify-center p-8 border-green-400 border-2 h-full w-full">
        <h1 class="text-blue-600 text-2xl mb-6">Courses</h1>
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
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Student ID ID</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Course Name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Course Category</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Course ID</span>
                {{ $course->id }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Course Name</span>
                {{ $course->course_name }}
            </td>
          	<td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Course Category</span>
                <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">{{ $course->course_type }}</span>
          	</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a href="{{ url('/admin/course/update'.$course->id) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                <a href="{{ url('/admin/course/delete'.$course->id) }}" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    

@endsection
