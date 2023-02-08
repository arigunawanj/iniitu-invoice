@extends('layouts.template')

@section('title', 'Data Faktur Inter')
@section('content')
<div class="content-wrapper">
     <!-- Content -->
     <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendataan /</span> Data Faktur Inter</h4>
            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Data Faktur</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Faktur</th>
                        <th>Tanggal Faktur</th>
                        <th>Nama Customer</th>
                        <th>Keterangan</th>
                        <th>Total</th>
                        <th>Admin Charge</th>
                        <th>Total Final</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($invoice as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-label-warning">{{ $item->invoice_code }}</span></td>
                            <td>{{ $item->invoice_date }}</td>
                            <td>{{ $item->customer->nama_customer }}</td>
                            <td>{{ $item->description }}</td>
                            <td>$ {{ $item->total }}</td>
                            <td>$ {{ $item->charge }}</td>
                            <td>$ {{ $item->total_finale }}</td>
                            <td>
                                <a class="btn rounded-pill btn-icon btn-outline-info" href="/printinv/{{ $item->invoice_code }}"><i class="bx bx-printer"></i></a>
                                <a class="btn rounded-pill btn-icon btn-outline-danger" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#delData{{ $item->id }}"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>       
                        
                        {{-- MODAL DELETE --}}
                        <div class="modal fade" id="delData{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Hapus Data Faktur Inter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('invoice.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <div>
                                                Apa anda yakin ingin menghapus?
                                            </div>
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
    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Faktur Inter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('invoice.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kode
                                    Faktur</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-barcode"></i></span>
                                        <select name="invoice_code" onchange="nama(value)" id="" class="form-select">
                                            <option selected value="">Pilih Kode Faktur...</option>
                                            @foreach ($dinv as $item)
                                                <option value="{{ $item->invoice_code }}">{{ $item->invoice_code }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                        <input type="text" class="form-control" id="nama_cust" onkeyup="nama(value)"
                                            placeholder="Ditujukan Kepada..." disabled
                                            aria-describedby="basic-icon-default-fullname2" />
                                        <input type="hidden" name="customer_id" id="cust_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Faktur</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                                        <input type="date" id="basic-icon-default-email" class="form-control"
                                            placeholder="Masukkan Tanggal..." name="invoice_date"
                                            aria-describedby="basic-icon-default-email2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Total</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                                        <input type="text" id="total_harga" name="total" onkeyup="nama(value)"
                                            class="form-control phone-mask" placeholder="Total Harga..."
                                            aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Admin Charge</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i class='bx bx-money' ></i></span>
                                        <input type="text" id="charge" class="form-control phone-mask" placeholder="Masukkan Charge..." onkeyup="isi()" />
                                        <input type="hidden" name="charge" id="chargesum">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Total Final</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i class='bx bx-credit-card-front' ></i></span>
                                        <input type="text" id="total_pp" disabled
                                            class="form-control phone-mask" placeholder="Total Final..."
                                            />
                                        <input type="hidden" name="total_finale" id="total_fix">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Keterangan</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-notepad"></i></span>
                                        <input type="text" name="description" class="form-control phone-mask" placeholder="Tuliskan Keterangan..."/>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL CLOSE --}}
    <script>
        function isi() {
            let admin = $('#charge').val()
            let total_harga = $('#total_harga').val()
    
            let hasilCharge = parseFloat(total_harga * (parseFloat(admin) / 100))
            $('#chargesum').val(hasilCharge)
    
            let total_final = parseFloat(parseFloat(total_harga) + hasilCharge)
            $('#total_pp').val(total_final)
            $('#total_fix').val(total_final)
        }
    </script>
    <script>
        function nama(id) {
            $.ajax({
                type: "get",
                url: `/invname/${id}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $(`#nama_cust`).children().remove()
                    response.map((value) => {
                        $(`#cust_id`).val(value.customer_id)
                        $(`#nama_cust`).val(value.nama_customer)
                    });
                }
            });
    
            $.ajax({
                type: "get",
                url: `/invname/${id}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let hasil = 0;
                    response.map((value) => {
                        let total = value.subtotal
                        if (total != null && total != "") {
                            hasil += parseInt(total);
                        }
                        $(`#total_harga`).val(hasil)
                    });
                }
            });
        }
    </script>
   
</div>
@endsection