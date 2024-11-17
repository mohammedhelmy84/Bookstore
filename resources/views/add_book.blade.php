<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>{{ config('app.name') }}</title>
    <style>
        #formFile {
            background-color: bisque;
        }

        #formFile::-webkit-file-upload-button {
            visibility: hidden;
        }

        #formFile::before {
            content: 'اختر كتاب';
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
            </div>
        @endif

        @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('warning') }}</strong>
        </div>
    @endif
        <div class="row my-1">
            <h2 class="text-center my-2">أضف كتاب<i class="las la-book" style="color:brown; font-size:32px;"></i></h2>
            <div class="d-flex flex-row justify-content-end">
                <a href="{{ route('home_page') }}" class="las la-share">الرئيسية</a>
            </div>
        </div>
        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 text-center">
                <label for="exampleFormControlInput1" class="form-label">عنوان الكتاب</label>
                <input type="text" name="title" dir="rtl" class="form-control" id="exampleFormControlInput1"
                    placeholder="عنوان الكتاب">
            </div>
            <div class="mb-3 text-center">
                <label for="exampleFormControlTextarea1" class="form-label">نبذة عن الكتاب</label>
                <textarea dir="rtl" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3 text-center">
                <label for="formFile" class="form-label">اختر الكتاب</label>
                <input dir="rtl" name="file" class="form-control" placeholder="اختر الكتاب" type="file"
                    id="formFile">
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-success" style="width:100px;">حفظ</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
