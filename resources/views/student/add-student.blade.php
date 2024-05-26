@extends('layouts.app')
@section('title', 'Tambah Siswa')
@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Siswa</h1>
        </div>

        <div class="card card-body">
            <form action="{{ route('student.add') }}" method="POST" id="form">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-12 mb-2">
                        <label class="form-label">NISN <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control desimal-input" name="code"required>
                    </div>
                    <div class="col-lg-12 col-12 mb-2">
                        <label class="form-label">Nama <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control desimal-input" name="name"required>
                    </div>
                    <div class="col-lg-12 col-12 mb-2">
                        <label class="form-label">Jenis Kelamin <sup class="text-danger">*</sup></label>
                        <select name="gender" class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-lg-12 col-12 mb-2">
                        <label class="form-label">Kelas <sup class="text-danger">*</sup></label>
                        <select name="grade_id" class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach ($gradeData as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 col-12 mb-2">
                        <label class="form-label">Angkatan <sup class="text-danger">*</sup></label>
                        <select name="year_id" class="form-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach ($yearData as $year)
                                <option value="{{ $year->id }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="student-submit">
                    <button type="submit" name="student-submit" class="btn btn-primary mt-2 mx-2 w-100">Tambah</button>
                    <button type="reset" class="btn btn-danger my-2 mx-2 w-100">Clear</button>
                </div>
            </form>
        </div>
    </div>

@endsection
