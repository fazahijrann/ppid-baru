 <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profil Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Auth::check())
                        <!-- Tampilkan informasi pemohon jika masuk -->
                        <p><strong>Nama :</strong> {{ Auth::user()->nama }}</p>
                        <p><strong>No. Pendaftaran :</strong> {{ Auth::user()->no_pendaftaran }}</p>
                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    @else
                        <!-- Pesan jika tidak ada pengguna yang masuk -->
                        <p>Tidak ada pengguna yang masuk.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>