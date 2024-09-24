@extends('components.layout')
@include('components.navbar')
@section('content')
    <div class="container">
        <h1>Create New Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <h3>Category Questions</h3>
            <div id="questions-section">
            </div>

            <button type="button" id="add-question" class="btn btn-secondary">Add Question</button>

            <br><br>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>

    <script>
        document.getElementById('add-question').addEventListener('click', function () {
            const questionSection = document.getElementById('questions-section');
            const newQuestion = document.createElement('div');
            newQuestion.innerHTML = `
            <div class="form-group">
                <label>Question Label</label>
                <input type="text" name="questions[][label]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>type</label>
                <select name="questions[][type]" class="form-control" required>
                    <option value="text">text</option>
                    <option value="select">select</option>
                    <option value="date">date</option>
                </select>
            </div>
            <div class="form-group">
                <label>enter the options if you choosed select</label>
                <input type="text" name="questions[][options][]" class="form-control" placeholder="enter values with , between them">
            </div>
            <hr>`;
            questionSection.appendChild(newQuestion);
        });
    </script>
@endsection
