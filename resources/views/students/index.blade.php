@extends('layouts.app')

@section('title', 'Danh sách sinh viên và các môn học đã đăng ký')

@section('content')
    <div class="container my-4">
        <h2 class="text-center fw-bold text-primary mb-4">🎓 Danh sách sinh viên và các môn học đã đăng ký</h2>

        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 5%">STT</th>
                            <th style="width: 25%">Họ tên</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 45%">Môn học</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $s)
                            <tr>
                                <td class="text-center fw-semibold">{{ $loop->iteration }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td>
                                    @if ($s->courses->isEmpty())
                                        <span class="text-muted fst-italic">Chưa đăng ký môn học</span>
                                    @else
                                        @foreach ($s->courses as $c)
                                            <span class="badge bg-info text-dark me-1 mb-1">{{ $c->title }}</span>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Không có sinh viên nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
