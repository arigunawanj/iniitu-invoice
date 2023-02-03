@extends('layouts.template')

@section('title', 'Detail Faktur')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Detail Faktur Inter</h4>
            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Detail Faktur Inter</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Faktur</th>
                        <th>Nama Customer</th>
                        <th>Nama Barang</th>
                        <th>Diskon</th>
                        <th>Subtotal</th>
                        <th>Kuantitas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dinvoice as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-label-warning">{{ $item->invoice_code }}</span></td>
                            <td>{{ $item->customer->nama_customer }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td> 
                                @if ($item->discount <= 10)
                                    <span class="badge bg-label-info">{{ $item->discount }} %</span> 
                                @elseif ($item->discount <= 20)
                                    <span class="badge bg-label-success">{{ $item->discount }} %</span> 
                                @elseif ($item->discount <= 30)
                                    <span class="badge bg-label-warning">{{ $item->discount }} %</span> 
                                @elseif ($item->discount <= 40)
                                    <span class="badge bg-label-danger">{{ $item->discount }} %</span> 
                                @elseif ($item->discount <= 49)
                                    <span class="badge bg-label-secondary">{{ $item->discount }} %</span> 
                                @else 
                                    <span class="badge bg-label-dark">{{ $item->discount }} %</span> 
                                @endif
                            </td>
                            <td>$ {{ number_format("$item->subtotal",2,",",".") }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>
                                <a class="btn rounded-pill btn-icon btn-outline-danger" href="" data-bs-toggle="modal"
                                    data-bs-target="#delData{{ $item->id }}"><i class="bx bx-trash"></i></a>
                            
                            </td>
                        </tr>

                        {{-- MODAL DELETE --}}
                        <div class="modal fade" id="delData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Hapus Data Detail Faktur Inter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('invoicedetail.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus Kode Faktur <span class="badge bg-label-danger">{{ $item->invoice_code }}</span> ?</p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
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
    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Detail Faktur Inter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('invoicedetail.store') }}" method="POST">
                @csrf
                    <div class="modal-body">
                        <div class="row">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                        Faktur</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text">
                                                <i class='bx bx-barcode'></i>
                                            </span>
                                            <input type="text" id="basic-icon-default-company" class="form-control"
                                                placeholder="Masukkan Kode Faktur..." name="invoice_code"
                                                aria-describedby="basic-icon-default-company2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                        Customer</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <select name="customer_id" class="form-select">
                                                <option selected value="">Pilih Customer..</option>
                                                @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_customer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                        Barang</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bxs-package'></i>
                                            </span>
                                            <select name="barang_id" class="form-select" id="nama_barang" onchange="harga(value)">
                                                <option selected value="">Pilih Barang..</option>
                                                @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Harga Barang</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <i class='bx bx-purchase-tag'></i>
                                            </span>
                                            <input type="text" id="harga_barang" class="form-control"
                                                placeholder="Harga Barang..."  onkeyup="harga(value)"
                                                aria-describedby="basic-icon-default-email2" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">QTY</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text">
                                                <i class='bx bx-box'></i>
                                            </span>
                                            <input type="text" id="qty" onkeyup="hasil()"
                                                class="form-control phone-mask" placeholder="Masukkan Kuantitas..."
                                                name="qty" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Total</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text">
                                                <i class='bx bx-coin'></i>
                                            </span>
                                            <input type="text" id="total"
                                                class="form-control phone-mask" placeholder="Total Harga..."
                                                aria-describedby="basic-icon-default-phone2" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Diskon</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text">
                                                <i class='bx bxs-discount'></i>
                                            </span>
                                            <input type="text" id="diskon" onkeyup="hasil()"
                                                class="form-control phone-mask" placeholder="Masukkan Diskon..."
                                                name="discount" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Subtotal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text">
                                                <i class='bx bx-money'></i>
                                            </span>
                                            <input type="text" id="subtotal" onkeyup="hasil()"
                                                class="form-control phone-mask" placeholder="Subtotal..."
                                                aria-describedby="basic-icon-default-phone2" />
                                                <input type="hidden" name="subtotal" id="sub">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    {{-- MODAL CLOSE --}}
</div>


<script>
    function harga(id){
        $.ajax({
            type: "get",
            url: `/getbarang/${id}`,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $(`#harga_barang`).children().remove()
                response.map((value) => { 
                    $('#harga_barang').val(value.harga_dollar)
                 
                });
            }
        });
    }
    </script>
    
    <script>
        function hasil() {
            let qty = $('#qty').val()
            let harga = $('#harga_barang').val()
            let diskon = $('#diskon').val()
    
            let total = harga * qty
    
            $('#total').val(total);
    
            let sementara = parseInt(total) * (parseInt(diskon) / 100);
            let subtotal = parseFloat(parseInt(total) - sementara)
    
            if (!isNaN(subtotal)) {
                $('#subtotal').val(subtotal);
                $('#sub').val(subtotal);
            }
        }
    </script>
    
@endsection