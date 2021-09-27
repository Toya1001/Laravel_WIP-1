@extends("layouts.admin")

@section("page_title")
    Laravel Wip-Admin Page
@endsection

@section('content')

    <div class="justify-center p-8 border-green-400 border-2 h-full w-full">
        <h1 class="text-blue-600 text-2xl mb-6">DASHBOARD</h1>
    <div class="flex justify-between card_container mb-6">
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total students</h2>
            <p>{{ $students }}</p>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Acceptance</h2>
             <p>{{ $approved }}</p>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Courses</h2>
            <p>{{ $course }}</p>
        </div>
        <div class="card bg-blue-300 p-4 h-28 w-40">
            <h2>Total Categories</h2>
            <p>{{ $category }}</p>
        </div>

    </div>
        <div class="big_card bg-white h-7/12">
            <h1>Most Recent Course Selection</h1>
            @foreach($recent as $info)
                <p>{{$info->course_name}}</p>
            @endforeach
        </div>
    </div>

@endsection
