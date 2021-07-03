<x-layout>
    <div class='row mt-3'>
        <div class='col-7'>
            <table class='table display table-dark'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Index</th>
                        <th>No. passed exams</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->index}}</td>
                        <td>{{$student->exams->count()}}</td>
                        <td>
                            <a href="/students/{{$student->id}}/edit">
                                <button class="btn form-control btn-secondary">Details</button>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class='col-5'>
            <h1>Create new student</h1>
            <form action="/students" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>First name</label>
                <input type="text" name="first_name" class="form-control" required>
                <label>Last name</label>
                <input type="text" name="last_name" class="form-control" required>
                <label>Index year</label>
                <input type="number" name="index_year" class="form-control" required min="1969" max="2020">
                <label>Index number</label>
                <input type="number" name="index_number" class="form-control" required min="1" max="1000">
                <button class="btn btn-primary form-control mt-2">Save</button>
            </form>
        </div>
    </div>

</x-layout>