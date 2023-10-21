<x-mail::message>
# <h1>{{ $research->title }}</h1>

student name is {{ $research->student_name }}

<x-mail::button :url="'http://127.0.0.1:8000/download-pdf/' . urlencode($research->id)">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
