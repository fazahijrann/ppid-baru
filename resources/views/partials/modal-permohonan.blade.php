<!-- Modal -->
@foreach ($permohonan_informasi as $data)
    <div class="modal fade" id="dokumen-permohonan-modal-{{ $data->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dokumen Pemohon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    {{-- Formulir Permohonan Informasi  --}}
                    <h2 class="fs-5">
                        Formulir Permohonan Informasi
                    </h2>
                    <a href="{{ route('permohonan.pdf', $data->no_permohonan_informasi) }}">
                        <button type="button" class="btn btn-primary">
                            Lihat Dokumen
                        </button>
                    </a>

                    <hr>
                    {{-- Bukti Penerimaan --}}
                    <h2 class="fs-5">
                        Bukti Penerimaan Permohonan Informasi
                    </h2>
                    @if ($data->tandaBuktiPenerimaan->status === 'Menunggu')
                        <button type="button" class="btn btn-primary" disabled>
                            Lihat Dokumen
                        </button>
                    @else
                        <a href="{{ route('bukti.pdf', $data->no_permohonan_informasi) }}">
                            <button type="button" class="btn btn-primary">
                                Lihat Dokumen
                            </button>
                        </a>
                    @endif

                    <hr>
                    {{-- Keputusan Informasi --}}
                    <h2 class="fs-5">Keputusan Permohonan Informasi</h2>
                    @if (optional($data->tandaBuktiPenerimaan->tandaKeputusan)->status === null ||
                            optional($data->tandaBuktiPenerimaan->tandaKeputusan)->status === 'Diproses')
                        <button type="button" class="btn btn-primary" disabled>
                            Keputusan Informasi
                        </button>
                    @elseif (in_array(optional($data->tandaBuktiPenerimaan->tandaKeputusan)->status, ['Diterima', 'Ditolak']))
                        <a href="{{ route('keppermohonan.pdf', $data->no_permohonan_informasi) }}" class="text-white">
                            <button type="button" class="btn btn-primary">
                                Lihat Dokumen
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
