@extends('layouts.app')
@section('title', 'Data Calon')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-users" aria-hidden="true"></i> Data Calon</h1>

    <div class="w-100 d-flex justify-content-lg-end justify-content-center mb-3">
        <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#addRatingModal"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
    </div>

    @if($status = Session::get('status'))
        @if($message = Session::get('message'))
            <div class="alert alert-{{ $status }} alert-dismissible fade show mb-3" role="alert">
                {{ $message }}
            </div>
        @endif
    @endif

    <div class="card mb-5">
        <div class="card-header text-primary">
            <i class="fa fa-table" aria-hidden="true"></i>
            Tabel Penilaian
        </div>
        <div class="card-body table-responsive table-bordered">
            <table class="table table-sm table-striped table-hover" id="rating-table">
                <thead class="bg-primary text-white">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($studentData as $student)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $student->name }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- add student modal --}}
    <div class="modal fade" id="addRatingModal" tabindex="-1" role="dialog" aria-labelledby="addRatingModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Calon Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('rating.add')}}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-12 mb-2">
                            <label class="form-label">Nama <sup class="text-danger">*</sup></label>
                            <select name="student_id" class="form-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                @foreach ($studentData as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($criteriaData as $criteria)
                            <div class="form-group mb-3">
                                <label for="sub_criteria_id" class="form-label">{{ $criteria->name }} ({{$criteria->code}})<sup class="text-warning">*</sup></label>
                                <select name="sub_criteria_id[]" id="sub_criteria_id" class="form-control" required>
                                    <option value="">--- pilih sub kriteria ---</option>
                                    @foreach($criteria->subCriteria as $subCriteria)
                                        <option value="{{ $subCriteria->id }}">{{ $subCriteria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary w-100">Tambah Data {penilaian}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit student modal --}}

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#rating-table').DataTable();
        })
    </script>
@endsection
