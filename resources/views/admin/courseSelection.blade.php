@extends('layouts.app')

<link rel="stylesheet" href="sweetalert2.min.css">


@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section id="shit" class="flex flex-col break-words bg-white sm:border-1 sm:rounded md:shadow-md lg:shadow-lg mx-auto pb-5    ">

            <center><header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-md w-1/3 text-3xl">
                Course Selection
            

            <form id="regForm" action="{{-- route('course_add') --}}" method="POST">
                @csrf
                
                <center class="text-sm"><h1>Use the form below to select a course</h1><br>
                 
            <select class="w-full py-3 px-5 my-2 border-none" name="course_id">
                {{-- @foreach ($courses as $course) --}}
                    <option value="{{-- $course->id --}}">{{-- $course->course_name --}}</option>
                {{-- @endforeach --}}
            </select>

        </center>

              <button type="submit" class="small btn btn-info px-2 py-1 my-1 rounded text-white text-xl" style="background-color: #1E447B;">Submit</button>
 
                    
                
                </form>
            </header></center><br>
        </section>
    </div>
</main>
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>

@if(session()->has('course'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Course Added Successfully!!'
})
</script>
@endif