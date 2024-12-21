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
                    @if (in_array($data->tandaBuktiPenerimaan->status, ['Menunggu', 'Ajukan Ulang']))
                        <button type="button" class="btn btn-primary" disabled>
                            Lihat Dokumen
                        </button>
                    @elseif ($data->tandaBuktiPenerimaan->status === 'Diteruskan')
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
                            Lihat Dokumen
                        </button>
                    @elseif (in_array(optional($data->tandaBuktiPenerimaan->tandaKeputusan)->status, ['Diterima', 'Ditolak']))
                        <a href="{{ route('keppermohonan.pdf', $data->no_permohonan_informasi) }}" class="text-white">
                            <button type="button" class="btn btn-primary">
                                Lihat Dokumen
                            </button>
                        </a>
                    @endif

                    @if (in_array(optional($data->tandaBuktiPenerimaan->tandaKeputusan)->status, ['Diterima', 'Ditolak']))
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="{{ route('keberataninformasi.create', ['keputusan_informasi_id' => $data->tandaBuktiPenerimaan->tandaKeputusan->id]) }}"
                                class="btn btn-danger">
                                Ajukan Keberatan
                            </a>

                            @if ($data->tandaBuktiPenerimaan->tandaKeputusan->buktiPenerimaan === null)
                                <form action="{{ route('keputusan.terima', $data->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="action" value="terima" class="btn btn-success">
                                        Terima Keputusan
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('bukterimakep.pdf', $data->no_permohonan_informasi) }}"
                                    class="btn btn-success">Lihat Dokumen
                                    Penerimaan</a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
