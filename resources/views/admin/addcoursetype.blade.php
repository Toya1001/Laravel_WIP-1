@extends("layouts.admin")

@section("page_title")
    Laravel Wip-Admin Page
@endsection

@section('content')



        <center style="margin-top: 140px;">

            @if (session()->has('update_status'))
            <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                {{session('update_status')}}
            </div>
            @endif
        <form action="{{ route('AddCourseType') }}" method="POST"
            style="width: 50%;background: whitesmoke;padding: 10px;border-radius: 20px;box-shadow: 0px 0px 4px 0px #0e46b5;">
            @csrf
            <h1 style="font-size: 26px;">Add Course Type Below</h1>
            <input type="text" name="coursetype_id" placeholder="Course Type ID"
                style="width: 62%;padding: 10px;background: #1c64f25e;color: #333030;"><br><br>
            <input type="text" name="coursetype" placeholder="Course Type Name"
                style="width: 62%;padding: 10px;background: #1c64f25e;color: #333030;"><br><br>
            <textarea type="text" placeholder="Course Description" name="desc" id="" cols="30" rows="10"
                style="height: 154px;padding: 10px;background: #a5c0f4;width: 62%;color: black;"></textarea><br>
            <button type="submit" style="padding: 10px;width: 100px;background: black;color: whitesmoke;">Submit</button>
        </form>
    </center>

@endsection

