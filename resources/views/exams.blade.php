<x-layout>
    <x-slot name="title">
        Exams
    </x-slot>

    <div class='row mt-2'>
        <div class='col-6'>
            <table class='table display table-dark'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{$exam->id}}</td>
                        <td>{{$exam->name}}</td>
                        <td>{{$exam->semester}}</td>
                        <td>
                            <form action="/exams/{{$exam->id}}/delete" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger form-control">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h1>Create new exam</h1>
            <form action="/exams" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Exam name</label>
                <input type="text" name="name" class="form-control" required>
                <label>Exam semester</label>
                <input type="number" name="semester" class="form-control" required min="1" max="8">
                <button class="btn btn-primary form-control mt-2" type="submit">Save</button>
            </form>
        </div>
    </div>
</x-layout>