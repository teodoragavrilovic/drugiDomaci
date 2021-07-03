<x-layout>
    <x-slot name="title">
        Student
    </x-slot>
    <div class='row mt-2'>
        <div class='col-4'>
            <form action="/students/{{$student->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>First name</label>
                <input type="text" name="first_name" class="form-control" value={{$student->first_name}} required>
                <label>Last name</label>
                <input type="text" name="last_name" class="form-control" value={{$student->last_name}} required>
                <label>Index year</label>
                <input type="number" name="index_year" class="form-control" value={{explode('/',$student->index)[1]}}
                required min="1969" max="2020">
                <label>Index number</label>
                <input type="number" name="index_number" class="form-control" value={{explode('/',$student->index)[0]}}
                required min="1" max="1000">
                <button class="btn btn-primary form-control mt-2">Update</button>
                <button class="btn btn-danger form-control mt-2" name='delete'>Delete</button>
            </form>
        </div>
        <div class='col-8'>
            <h1>Passed exams</h1>
            <table class='table display table-dark'>
                <thead>
                    <tr>
                        <th>Exam name</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{$exam->exam->name}}</td>
                        <td>{{ $exam->grade }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-layout>