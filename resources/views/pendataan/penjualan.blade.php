@extends('layouts.template')

@section('title', 'Data Pengguna')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Laporan Penjualan</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Laporan Penjualan</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Customer</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($penjualan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge rounded-pill bg-warning">{{ $item->kode }}</span></td>
                                <td>{{ $item->customer->nama_customer }}</td>
                                <td>{{ $item->tanggal }}</td>
                                @if ($item->jenis == 0)
                                <td>Rp {{ number_format("$item->jumlah",0,",",".") }}</td>
                                @else
                                <td>$ {{ number_format("$item->jumlah",2,",",".") }}</td>
                                @endif
                                @if ($item->status == 'Belum Lunas')
                                <td><a href="/status/{{ $item->id }}"><span class="badge bg-label-danger">{{ $item->status }}</span></a></td>
                                @else
                                <td><span class="badge bg-label-primary">{{ $item->status }}</span></td>
                                @endif
                                <td>{{ $item->keterangan }}</td>
                                @if ($item->jenis == 0)
                                <td><span class="badge bg-label-success">Lokal</span> </td>
                                @else
                                <td><span class="badge bg-label-info">Inter</span> </td>
                                @endif
                                <td>
                                    @if ($item->status == 'Lunas')
                                    <a class="btn rounded-pill btn-icon btn-outline-info" href="/status/{{ $item->id }}" ><i class='bx bx-transfer' ></i></a>
                                    @endif
                                        <a class="btn rounded-pill btn-icon btn-outline-danger" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#delData{{ $item->id }}"><i
                                                class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                            {{-- MODAL DELETE --}}
                        <div class="modal fade" id="delData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Hapus Data Customer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus Data Penjualan {{ $item->kode }} ?
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- MODAL CLOSE --}}
                        </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
