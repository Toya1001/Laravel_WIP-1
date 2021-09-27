@extends("layouts.admin")


@section("page_title")



@endsection

@section('content')
<div class="form">
    <div class="title">Add Courses</div>
    <div class="input-container ic1">
        <input  class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Course Id</label>
      </div>
    <div class="input-container ic1">
      <input id="firstname" class="input" type="text" placeholder=" " />
      <div class="cut"></div>
      <label for="firstname" class="placeholder">Course Name</label>
    </div>
    <div class="input-container ic2">
        <div class="dropdown">
            <button class="dropbtn">Course Types</button>
            <div class="dropdown-content">
              <a href="">Mondern Languages</a>
              <a href="">Sciences</a>
              <a href="">Arts</a>
              <a href="">Socisl Studies/History</a>

            </div>
          </div>
    </div>

    <button type="text" class="submit">Submit</button>
  </div>


        <center style="margin-top: 140px;">
        <form action="addtype" method="POST"
            style="width: 50%;background: whitesmoke;padding: 10px;border-radius: 20px;box-shadow: 0px 0px 4px 0px #0e46b5;">
            <h1 style="font-size: 26px;">Add Course Type Below</h1>
            <input type="text" placeholder="Course Name"
                style="width: 62%;padding: 10px;background: #1c64f25e;color: #333030;"><br><br>
            <textarea type="text" placeholder="Course Description" name="" id="" cols="30" rows="10"
                style="height: 154px;padding: 10px;background: #a5c0f4;width: 62%;color: black;"></textarea><br>
            <button type="submit" style="padding: 10px;width: 100px;background: black;color: whitesmoke;">Submit</button>
        </form>
    </center>

@endsection
