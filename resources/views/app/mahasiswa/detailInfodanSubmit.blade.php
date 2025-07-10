@extends('layouts.app')

@section('content')

<?php
$deadlineTimestamp = time() + (24 * 60 * 60); //jam-menit-detik
$deadline = date("Y-m-d H:i:s", $deadlineTimestamp);
$currentDate = date("Y-m-d H:i:s");
?>

<div class="container mt-4" style="border-bottom: 6vh solid black;">
    <h1 class="text-center mb-4 text-white fw-semibold" style="font-size: 36px">Detail Lomba Dan Submition</h1>
    <div class="row justify-content-center">
        <div class="col-md-12 rounded-2" style="background-color: #FAF9F6">
            <div class="col-md-12" style="padding: 20px 70px">

                <h2 class="mb-3">Lomba Lorem Ipsum</h2>
                <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, perspiciatis
                    quaerat earum cupiditate beatae harum obcaecati ducimus vitae pariatur officiis. Impedit, a! Modi
                    magni iusto blanditiis aliquid, quo excepturi et?</p>
                    <?= $currentDate ?>
                    <br></br>

                <form action="{{ route('submission.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered border-primary">

                        <tr>
                            <th style="width: 20%;">Name</th>
                            <td style="width: 80%;">joko tawar</td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td>Jowar</td>
                        </tr>

                        <tr>
                            <th>Deadline</th>
                            <td class="table-danger"><?= $deadline ?></td>
                        </tr>

                        <tr>
                            <th>Panduan</th>
                            <td>
                                <a href="#" class="text-decoration-none text-primary">
                                    <img src="{{ asset('assets/img/picture_as_pdf.svg') }}" alt="PDF Icon">
                                    Guidebook - Panduan Lorem 2077
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th>Upload File</th>
                            <td>
                                <input type="file" name="lampiran" class="form-control-file">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </td>
                        </tr>

                    </table>
                </form>

                <h2 class="mt-5">Uploaded Files</h2>
                <ul class="list-group">
                    @foreach($submissions as $submission)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ Storage::url($submission->lampiran) }}" target="_blank">{{ $submission->lampiran }}</a>
                            <div class="btn-group">
                                <button class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('submission.edit', $submission->id) }}'">Edit</button>
                                <form action="{{ route('submission.destroy', $submission->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this file?');">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
