@extends('components.layout')
@include('components.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('products.store') }}" method="POST" class="form-control">
                @csrf
                <input type="text" name="name" placeholder="Product Name" class="form-control my-3">
                <textarea name="description" placeholder="Product Description" class="form-control my-3"></textarea>
                <input type="number" name="price" placeholder="Product Price" class="form-control my-3">

                <select id="category" name="category_id" class="form-control my-3">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div id="dynamic-questions"></div>

                <button type="submit" class="form-control btn btn-success">add product</button>
            </form>
        </div>
    </div>
@endsection


    @section('scripts')
        <script>
            document.getElementById('category').addEventListener('change', function() {
                const categoryId = this.value;
                fetch(`/categories/${categoryId}/questions`)
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        data.questions.forEach(question => {
                            html += `<label>${question.label}</label>`;
                            if (question.type === 'text') {
                                html += `<input type="text" name="questions[${question.id}]" class="form-control my-2">`;
                            }
                            else if (question.type === 'data') {
                                html += `<textarea name="questions[${question.id}]" class="form-control my-2"></textarea>`;
                            }
                            else if (question.type === 'select') {
                                html += `<select name="questions[${question.id}]" class="form-control my-2">`;
                                question.options.forEach(option => {
                                    html += `<option value="${option}">${option}</option>`;
                                });
                                html += `</select>`;
                            }
                        });
                        document.getElementById('dynamic-questions').innerHTML = html;
                    });
            });
        </script>
    @endsection
