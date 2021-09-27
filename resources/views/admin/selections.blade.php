@extends("layouts.admin")


@section("page_title")

Students

@endsection

@section("content")

<h1 class="text-6xl text-blue-400 text-center">Students</h1>

<div class="flex justify-center items-center w-full mt-32">
    <div class="">
    @if (session()->has('approved_status'))
                <div class=" bg-green-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('approved_status')}}
                </div>
            @endif
            @if (session()->has('rejected_status'))
                <div class=" bg-red-500 p-4 rounded-lg text-white text-center mb-6">
                    {{session('rejected_status')}}
                </div>
            @endif
            <form method="post">@csrf
        <table class="table text-gray-400 border-separate space-y-6 text-sm z-in">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <td text-3xl font-extrabold text-center text-blue-600 mb-6>Course ID</td>
                    <td class="p-3 text-left">Student Name</td>
                    <td class="p-3 text-left">Course Name</td>
                    <td class="p-3 text-left">Applied Date</td>
                    <td class="p-3 text-left">Status</td>
                    <td class="p-3 text-left">Action</td>
                </tr>
            </thead>
            <tbody class="bg-blue-200 lg:text-black">
                @foreach($student as $info) 
                     <td class="p-3">{{$info['courses']['id']}}</td>
                     <td class="p-3">{{$info['users']['name']}}</td>
                    <td class="p-3 uppercase">{{$info['courses']['course_name']}}</td>
                    <td class="p-3">{{$info['enroll_dt']}}</td>
                     @if($info['is_approved']==1) 
                        <td class="p-3">Approved</td>
                     @elseif($info['is_approved']==2)
                        <td class="p-3">Rejected</td>
                    @else
                        <td class="p-3">Pending</td>
                    @endif 
                   <td> <button
                        formaction="/admincourse/{{$info['id']}}"
                        name="_method"
                        value="PUT"
                        >Approve</button>
                        <button
                        formaction="/admincourse/{{$info['id']}}"
                        name="_method"
                        value="DELETE"
                        >Deny</button></td>
                </tr>
                @endforeach
            </tr>
            </tbody>
        </table>
    </form>
    </div>
</div>
{!! session('success') !!}




@endsection